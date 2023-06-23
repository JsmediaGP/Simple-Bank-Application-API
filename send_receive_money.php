<?php   
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control_Allow_Headers: Content-Type, Access-Control-Allow-Headers, Authorization, x-Request-with');

    include('db.php');
    error_reporting(0);
    $inputData = json_decode(file_get_contents("php://input"));

    if ((empty($inputData->sender_account_number)) || (empty($inputData->receiver_account_number)) || (empty($inputData->amount))) {
       
        echo json_encode(['error' => 'All fields are required']);
        exit();
    }
    
    // removing whitespace
    $senderAccountNumber = mysqli_real_escape_string($conn, $inputData->sender_account_number);
    $receiverAccountNumber = mysqli_real_escape_string($conn, $inputData->receiver_account_number);
    $amount = (float) $inputData->amount;
    $senderName = $inputData->sender_account_name;
    $receiverName = $inputData->receiver_account_name;
    
    // Get the sender's current balance
    $senderBalanceSql = "SELECT  account_balance, account_name FROM accounts WHERE account_number = '$senderAccountNumber'";
    $senderBalanceResult = mysqli_query($conn, $senderBalanceSql);
    
    if ($senderBalanceResult && mysqli_num_rows($senderBalanceResult) > 0) {
        $senderData = mysqli_fetch_assoc($senderBalanceResult);
        $senderBalance = $senderData['account_balance'];
        $senderName = $senderData['account_name'];
        
        // Check if the sender has sufficient balance
        if($senderBalance < $amount){
            echo json_encode(['message' => 'Insufficient Fund']);
        }else{
            // Start a database transaction
            mysqli_begin_transaction($conn);
            
            // Update sender's balance
            $newSenderBalance = $senderBalance - $amount;
            $updateSenderSql = "UPDATE accounts SET account_balance = $newSenderBalance WHERE account_number = '$senderAccountNumber'";
            
                if (mysqli_query($conn, $updateSenderSql)) {
                    // Get the receiver's recent balance
                    $receiverBalanceSql = "SELECT account_balance, account_name FROM accounts WHERE account_number = '$receiverAccountNumber'";
                    $receiverBalanceResult = mysqli_query($conn, $receiverBalanceSql);
                    
                    if ($receiverBalanceResult && mysqli_num_rows($receiverBalanceResult) > 0) {
                        $receiverData = mysqli_fetch_assoc($receiverBalanceResult);
                        $receiverBalance = $receiverData['account_balance'];
                        $receiverName = $receiverData['account_name'];
                        
                        // Update receiver's balance
                        $newReceiverBalance = $receiverBalance + $amount;
                        $updateReceiverSql = "UPDATE accounts SET account_balance = $newReceiverBalance WHERE account_number = '$receiverAccountNumber'";
                        
                        if (mysqli_query($conn, $updateReceiverSql)) {
                            // Insert the transaction into the database
                            $transactionSql = "INSERT INTO transactions (senders_acc_num, senders_acc_name, receivers_acc_num, receivers_acc_name, amount) VALUES ('$senderAccountNumber','$senderName', '$receiverAccountNumber','$receiverName', $amount)";
                            
                            if (mysqli_query($conn, $transactionSql)) {
                                // Commit the transaction
                                mysqli_commit($conn);
                            echo json_encode(['message' => 'Money transferred successfully']);
                            } else {
                                // Rollback the transaction
                                mysqli_rollback($conn);
                                echo json_encode(['error' => 'Failed to save the transaction']);
                            } 
                        }else{
                                // Rollback the transaction
                                mysqli_rollback($conn);
                                
                                echo json_encode(['error' => 'Account does not exist']);
                            }
                }
            }
        }
    }
?>
