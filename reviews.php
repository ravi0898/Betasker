<?php include("controller/cookie.php");?>
<!DOCTYPE html>
<html>
<head>
<meta name = "viewport" content = "width = device-width, initial-scale = 1,
maximum-scale = 1, minimum-scale = 1, user-scalable = no, minimal-ui" />
<meta name = "apple-mobile-web-app-capable" content = "yes" />
<meta name="theme-color" content="#05b2de">
<meta name = "apple-mobile-web-app-status-bar-style" content = "black" />
<title>Betasker</title>
<link rel = "stylesheet"href = "https://cdnjs.cloudflare.com/ajax/libs/framework7/1.4.2/css/framework7.material.min.css" />
<link rel = "stylesheet"href = "https://cdnjs.cloudflare.com/ajax/libs/framework7/1.4.2/css/framework7.material.colors.min.css" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<style type="text/css">



.bg-set{
background-color:#fff;
background:#fff;
background-image:none;
}

.toolbar.messagebar {
position: fixed !important;
bottom: 0px !important;
}

a {
color: #7a7a7a !important;
}

p {
margin:0;
font-weight:400;
font-size:14px;
}

i.fa.fa-angle-right {
    font-size: 30px !important;
    padding-top: 15px !important;
    padding-left: 20px;
}
.card {
    margin: 0px 0px 7px 0px;
    border-bottom: 1px solid rgba(0,0,0,.125);
    border-top: none;
    border-radius: 0px;
    border-left: 4px solid #7fb145;
    padding: 0px 5px;
}

.bg-i {
    background-size: contain;
    position: relative;
}

.profileimg {
    position: relative;
}

img.center-img {
    height: 100px;
    width: 100px;
    position: relative;
    top: 100px;
    border-radius: 50%;
    border: 2px solid #05a0c7;
}


.background-change {
   position: absolute;
    right: 20px;
    top: 20px;
}


.pro-change {
   
    position: absolute;
    bottom: -66px;
    left: 80px;
    z-index: 999;
}

.fa-camera{
  font-size:18px;
   color: #fff;
}

.list{
  padding:0px !important;
}

.checked {
  color: orange;
}

</style>
</head>


<body class="bg-set">
<div class = "views">
<div class="navbar">
<div class="navbar-bg"></div>
<div class="navbar-inner sliding">
<div class="left">
<a href="#" onclick="goBack()"  class="link back">
<i class="icon icon-back"></i>
</a>
</div>
<div class="title pt-1 pl-2"><span class="subtitle"><h6>Reviews</h6></span></div>
<div class="right">  </div>
</div>
</div>

<!-- registration form start -->
<div class = "page-content pt-5 pl-3">
 <div class="" style="margin-top:40px"></div>
<div class="list media-list sortable">
   
 <!----->
<?php
$account_id     = $_COOKIE['id'];
$api_url1       = 'https://sharukh.dbtechserver.online/betasker/controller/api/getall_review.php?id='.$account_id;
$json_data1     = file_get_contents($api_url1);
$response_data1 = json_decode($json_data1);

$getbokk1 = $response_data1->result;
$counts1 = COUNT($getbokk1);
if($counts1 > 0){
 foreach($getbokk1 as $val2){
?>

  <div class="card pb-2">
  <div class="card-content">
  <!-- <a href="#" class="item-content"> -->
  <div class="row d-flex" style="align-content:center;"> 

  <div class="col-8">
  <h4 style="font-size: 20px;"><?php echo $val2->fullname;?></h4>

  <div class="col-12 pl-0 "><p><?php echo $val2->review;?></p>
  <div class="rating">
    <?php $rate = $val2->rate; 
          $tr = 5 - $rate;
     for ($i=0; $i < $rate; $i++) {
      
    ?>
  <span class="fa fa-star checked"></span>
  <?php } ?>
<?php 
     for ($j=0; $j < $tr; $j++) {
      
    ?>
    <span class="fa fa-star"></span>
  <?php } ?>

  </div>
  </div>
  </div>
  <div class="col-4 text-center">
   <a href="profile.php?id=<?php echo $val2->creator;?>">
  <img class="pt-3" src="img/<?php echo $val2->img;?>" width="60">
  </a>
  </div>
  </div>
  <!-- </a> -->
  </div>

  </div>

<?php }}else{ ?>

 <center> <img src="img/no-data.jpg" width="100%">
       <h2> No Data Available</h2>
     </center>


<?php } ?>
<!----->



 </div>  <!-----page----->


<div style="height:70px"></div>  
<!----footer include----->
  <?php include 'include/footer2.php';?>
<!---footer include----->

</body>
</html>   