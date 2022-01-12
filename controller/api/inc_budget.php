<?php
include_once '../config.php';

if(isset($_POST['submit'])){

    //variables input type
    $amount        = mysqli_escape_string($con,$_POST['amount']);
    $task_id       = mysqli_escape_string($con,$_POST['task_id']);
    $uid           = $_COOKIE['id'];
    $date          = date('Y-m-d');
    
    //insert query 

    $check   = mysqli_query($con,"SELECT * FROM task_create WHERE account_id ='$uid' AND task_id='$task_id'");
    $getud   = mysqli_fetch_array($check); 
    $task_budget = $getud['task_budget'];
    
    $add = $task_budget + $amount;

    $sql = "UPDATE `task_create` SET task_budget='$add' WHERE account_id='$uid' AND task_id='$task_id'";

        
    $run = mysqli_query($con,$sql);

    $addquery = mysqli_query($con, "INSERT INTO `task_budget_inc` (`id`, `task_id`, `uid`, `amount`, `date`) VALUES (NULL, '$task_id', '$uid', '$amount', '$date')"); 


        
    header('Location : ../../tasks-details.php?task_id='.$task_id);
    
  }
?>



