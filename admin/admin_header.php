<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Question Paper Generator | Admin</title>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--Semantic UI-->
    <link rel="stylesheet" type="text/css" href="../dependencies/semantic/dist/semantic.min.css" />
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="../dependencies/bootstrap/dist/css/bootstrap.min.css" />
 
     <link href="../dependencies/jquery/jquery.min.js">
     <link rel="stylesheet" href="../dependencies/fontawesome/css/all.min.css">
</head>
<body>
<div class="ui top attached  menu" style="border-width: 1px;">
  <a class="item" style="background: teal; color: white;">
   <i class="fa fa-bars" aria-hidden="true"></i>
    Menu
  </a>
   <div class="item"  style="background: teal; color: white;width: 80% ;"><h4>Question Paper Generator (Admin)</h4></div>
   <div class="item"style="background: teal; color: white;width: 100% ;" ><h6 ><?php echo "Welcome " .$_SESSION['username'];?></h6></div>
</div>
<div class="ui bottom attached segment pushable">
  <div class="ui  labeled icon left inline vertical   thin sidebar menu" style="background: teal;">
    <a class="item text-white" href="admin_dashboard.php" >
     <i class="fa fa-home" aria-hidden="true"></i>
      Home
    </a>
    <a class="item  text-white" href="generate.php">
    <i class="fa fa-cog" aria-hidden="true"></i>
      Generate Paper
    </a>
    <a class="item  text-white" href="editprofile_admin.php">
      <i class="fa fa-user" aria-hidden="true"></i>
      Profile
    </a>
    <a class="item  text-white" href="../logout.php">
     <i class="fa fa-power-off" aria-hidden="true"></i>
     Logout
    </a>
  </div>
  <div class="pusher">
    <div class="ui basic segment">