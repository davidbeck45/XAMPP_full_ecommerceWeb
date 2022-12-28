<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="Unit6_store.js"></script>
<link rel="stylesheet" href="Unit6_common.css">

</head>
<body>
<?php

if(session_status() <>
 PHP_SESSION_ACTIVE){
  session_start();
 }

 if(isset($_GET['err'])){
  $errorMessage = $_GET['err'];
 }else{
  $errorMessage = " ";
 }
if (isset($_SESSION['role'])) {
  $adminRole = intval($_SESSION['role']);
  $userName =  $_SESSION['first_name'];
}else{
  $adminRole = -1;

}
if($adminRole == 2){?>
  <div class="topnav">
    <a href="Unit6_index.php">Home</a>
    <a href="Unit6_store.php">Store</a>
    <a href="Unit6_order_entry.php">Order Entry</a>
    <a href="Unit6_admin.php">Admin</a>
    <a href="Unit6_admin_product.php">Admin Product</a>
    <li id style = 'float:right'><a href='Unit6_logout.php'>Logout</a></li>
    
  </div>
  <?php
}
elseif($adminRole == 1){?>
  <div class="topnav">
    <a href="Unit6_index.php">Home</a>
    <a href="Unit6_store.php">Store</a>
    <a href="Unit6_order_entry.php">Order Entry</a>
    <a href="Unit6_admin.php">Admin</a>
    <li id style = 'float:right'><a href='Unit6_logout.php'>Logout</a></li>
  </div>
  <?php
}
else{?>

<div class="topnav">
  <a href="Unit6_index.php">Home</a>
  <a href="Unit6_store.php">Store</a>
  <li id style = 'float:right'><a href='Unit6_logout.php'>Logout</a></li>
</div>
<?php
}?>

<header>
<h1>Pen and Pencil store</h1>
<div id = "welcome" >Welcome <?=$userName?></div>
<p id = "intro">High quality products</p>
</header>

</body>
</html>