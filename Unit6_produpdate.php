<?php
include 'Unit6_database.php';

$conn = getConnection();
?> 
<?php
$prod = $_POST["prod"];
$image = $_POST["image"];
$quant = $_POST["quant"];
$price = $_POST["price"];
$inactive = $_POST["inactive"];
$id = $_POST["id"];

updateProduct($conn,$prod,$image,$quant,$price,$inactive,$id);
echo createTable($conn);