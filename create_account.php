<?php   
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Method: POST');
    header('Access-Control_Allow_Headers: Content-Type, Access-Control-Allow-Headers, Authorization, x-Request-with');

    include('db.php');
    error_reporting(0);
    $inputData = json_decode(file_get_contents("php://input"));
    
    if(empty($inputData->account_number) || (empty($inputData->account_name) || empty($inputData->account_balance) || empty($inputData->account_type))){
        echo json_encode(['status'=>'Error','message'=>'all fields are required']);
    }else{
        
   //checking if data already exist in the db
    $query = "SELECT COUNT(*) as count FROM accounts WHERE account_number = '$inputData->account_number'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $count = $row['count'];

        if ($count > 0) {
            // Account number already exists

            $response = array('status' => 'Error!!!', 'message' => 'Account already exists');
            echo json_encode($response);


        }else{

                $sql = "INSERT INTO accounts (account_number, account_name, account_balance, account_type)";
                $sql.= "VALUES('$inputData->account_number', '$inputData->account_name', '$inputData->account_balance', '$inputData->account_type')";
                $run = mysqli_query($conn, $sql);
                if($run){
                    echo json_encode(['status'=>'sucess','message'=>'account created']);

                }else{
                    echo json_encode(['status'=>'Fail','message'=>'account not created']);
                }
            }
    }       




?>