<!DOCTYPE html>
<html>
<?php

session_start();

?>

<?php 
include 'Unit6_database.php';
$conn = getConnection();



if(!(empty($_POST['email'])) && !(empty($_POST['psw']))){
    $_SESSION['role'] = -1;
    $email = $_POST['email'];
    $pass = $_POST['psw'];
    $result = loginEmailPass($conn,$email,$pass);
    
    if($result !== 0){
        
        $row = $result->fetch_assoc();
        $_SESSION['role'] = $row['access'];
        $_SESSION['first_name'] = $row['first_name'];
        if($email !== $row['email'] || $pass !== $row['pass']){
            header("Location: Unit6_index.php?err=Invalid User");
            
        }
    }
    
       
    
    
    
}
include "Unit6_header.php";
?>





