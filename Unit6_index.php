<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<link rel="stylesheet"href="Unit6_common.css">
<link rel="stylesheet" href="Unit6_store.css">
<script type = "text/javascript" src="Unit6_cookie.js"></script>
<link rel="stylesheet" href="Unit6_index.css">
<?php
include 'Unit6_database.php';
date_default_timezone_set("America/Denver");
$conn = getConnection();
?> 
<?php

session_start();
include "Unit6_header.php";

?>
</head>
<body>
    

<p > Welcome! Please log in or Continue as Guest to begin. <span id ="err"><?=$errorMessage?></span></p>
<form action="Unit6_login.php" method="post">
  

  <div class="container">
    
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required>
</br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <button id = "login" type="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="Guestbtn">Continue as Guest</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>