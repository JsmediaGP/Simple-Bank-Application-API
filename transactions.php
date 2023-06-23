<?php   
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: GET');
    header('Access-Control_Allow_Headers: Content-Type, Access-Control-Allow-Headers, Authorization, x-Request-with');

    include('db.php');
    error_reporting(0);
    $inputData = json_decode(file_get_contents("php://input"));

    $sql = "SELECT * FROM transactions WHERE senders_acc_num = $inputData->account_number || receivers_acc_num = $inputData->account_number";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $transactions = [];
        
        // Fetch each transaction data
        while ($row = mysqli_fetch_assoc($result)) {
            $transaction = [
                'transaction_id' => $row['id'],
                'sender_account_number' => $row['senders_acc_num'],
                'receiver_account_number' => $row['receivers_acc_num'],
                'amount' => $row['amount'],
                'transaction_date' => $row['created_at']
            ];
            
            $transactions[] = $transaction;
        }
        echo json_encode($transactions);
    } else {
        
        echo json_encode(['error' => 'No transactions found']);
    }




?>