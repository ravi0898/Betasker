<?php
include_once '../config.php';

$products_arr=array();
$products_arr["result"]=array();
$account_id = mysqli_escape_string($con,$_GET['id']);
//get user data from the database

$query = mysqli_query($con,"SELECT * FROM review WHERE receiver='$account_id' ORDER BY id DESC");


while ($userData = mysqli_fetch_array($query)){

$creator   = $userData['creator'];

$sqls = mysqli_query($con,"SELECT * FROM account WHERE account_id ='$creator'");

$uget = mysqli_fetch_array($sqls);

$img       = $uget['img'];
$fullname  = $uget['fullname'];

$p_item = array(

"date"      => $userData['date'],
"time"      => $userData['time'],
"task_id"   => $userData['task_id'],
"creator"   => $userData['creator'],
"receiver"  => $userData['receiver'],
"rate"      => $userData['rate'],
"review"    => $userData['review'],
"img"       => $img,
"fullname"  => $fullname
);

array_push($products_arr["result"], $p_item);


}

echo json_encode($products_arr);

?>