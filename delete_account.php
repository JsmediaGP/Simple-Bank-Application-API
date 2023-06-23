<?php   
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: DELETE');
    header('Access-Control_Allow_Headers: Content-Type, Access-Control-Allow-Headers, Authorization, x-Request-with');

    include('db.php');
    error_reporting(0);
    $inputData = json_decode(file_get_contents("php://input"));

    if($inputData->account_number){

        $sql = "DELETE FROM accounts WHERE account_number =" .$inputData->account_number;
        $run = mysqli_query($conn, $sql);

        if($run){
            echo json_encode(['status'=>'Success','message'=>'Account Deleted']);
        }else{
            echo json_encode(['status'=>'Fail','message'=>'Account Unable to Delete']);
        }
    }else{
        echo json_encode(['status'=>'Fail','message'=>'Account Does not Exist']);
    }






?>