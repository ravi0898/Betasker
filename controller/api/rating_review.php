<?php

header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: POST");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST')

{
// set product property values

date_default_timezone_set("Asia/Kolkata");

    $date       = date('Y-m-d');
    $time       = date('H:i:s');

    $rate       = mysqli_escape_string($con,$_POST['rate']);

    $review     = mysqli_escape_string($con,$_POST['review']);

    $task_id    = mysqli_escape_string($con,$_POST['task_id']);
    
    $get_task = mysqli_query($con,"SELECT * FROM task_award WHERE task_id='$task_id'");

    $getdata = mysqli_fetch_array($get_task);

    $creator   = $getdata['task_creator'];
    $receiver  = $getdata['task_receiver'];

    //check already

    $sql3   = mysqli_query($con,"SELECT * FROM review WHERE task_id='$task_id'");

    $count2 = mysqli_num_rows($sql3);

    // make sure data is not empty

  

  if($rate < 0){


        $response = array(



        "status" => "error",



        "response" => "Select Rating!"



         );



    } else if(empty($review)){

       $response = array(

        "status" => "error",

        "response" => "Write Something!"

         );

    }else if($count2 > 0){

    
      $response = array(

        "status" => "error",

        "response" => "Alreday Done Review!"

         );



    }



    else{



         $sql = mysqli_query($con,"INSERT INTO review(date,time,creator,receiver,rate,review,task_id) VALUES('$date','$time','$creator','$receiver','$rate','$review','$task_id')");



         $sql2 = mysqli_query($con,"UPDATE task_create SET status='close' WHERE task_id='$task_id'");


         $response = array(



        "status" => "success",
        "task_id" => $task_id,
        "response" => "Successfully Close job!"

         );


}

  

 }





else{

  

     $response = array(



        "status" => "error",



        "response" => "Access Denied Method Not Allowed!"



         );

   

   }

   

   echo json_encode($response);



?>



