<?php   
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: PUT');
    header('Access-Control_Allow_Headers: Content-Type, Access-Control-Allow-Headers, Authorization, x-Request-with');

    include('db.php');
    error_reporting(0);
    $inputData = json_decode(file_get_contents("php://input"));

    if($inputData->account_number){
        $sql2 = "SELECT * FROM accounts WHERE account_number=".$inputData->account_number;
        $run2 = mysqli_query($conn, $sql2);
        $accounts = mysqli_fetch_assoc($run2);

        $account_number = $accounts['account_number'];
        $account_name = $accounts['account_name'];
        $account_balance = $accounts['account_balance'];
        $account_type = $accounts['account_type'];

        if($inputData->account_number != ''){
            $account_number = $inputData->account_number;

        }
        if($inputData->account_name != ''){
            $account_name = $inputData->account_name;

        }
        if($inputData->account_balance != ''){
            $account_balance = $inputData->account_balance;

        }
        if($inputData->account_type != ''){
            $account_type = $inputData->account_type;

        }
        
            $sql = "UPDATE accounts SET ";
            $sql.= "account_number = $account_number, ";
            $sql.= "account_name = '$account_name', ";
            $sql.= "account_balance = $account_balance, ";
            $sql.= "account_type = '$account_type' WHERE account_number=".$inputData->account_number;
            $run = mysqli_query($conn, $sql);
            if($run){
                echo json_encode(['status'=>'sucess','message'=>'account updated']);
              
            }else{
                echo json_encode(['status'=>'Fail','message'=>'account not updated']);
            }
        


    }else{
        echo json_encode(['status'=>'Fail','message'=>'Account Does not Exist']);
    }
    





?>