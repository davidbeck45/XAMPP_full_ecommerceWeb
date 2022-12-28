<?php
include 'Unit6_database.php';

$conn = getConnection();
?> 
<?php

$id = $_POST["id"];

$result = checkOrderForDelete($conn,$id);

if(!$result){

    
}else{
    deleteProduct($conn,$id);
}
echo createTable($conn);