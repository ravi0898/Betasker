<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  

    // set product property values
    // $mobile      = mysqli_escape_string($con,$_POST['mobile']);
    // $mob_otp     = $_POST['mob_otp'];
  
    $email_otp  = mysqli_escape_string($con,$_POST['email_otp']);
    $sql        = "SELECT * FROM account WHERE reg_otp_email='$email_otp'";
    $result     = mysqli_query($con,$sql);
    $row        = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $account_id = $row['account_id'];
    $count      = mysqli_num_rows($result);
      
    // make sure data is not empty
    if($count == '1'){

    $update = "UPDATE `account` SET verify_status = '1' WHERE account_id='$account_id'";
    $sql_update = mysqli_query($con, $update);
    
    $response = array(

                "status" => "success",

                "response" => "Successfully Register!"

                 );
     
    }
    else{
         
         
     $response = array(

        "status" => "error",

        "response" => "OTP is Does not Match!"

         );
        
    }
  
  }


else{
  
     $response = array(

        "status" => "error",

        "response" => "Access Denied Method Not Allowed!"

         );
        
   
  }

//Json decode

echo json_encode($response);


?>

