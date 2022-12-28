<?php

include 'Unit6_database.php';
$conn = getConnection();

$id = $_GET["id"];

$A = available($conn, $id);
echo $A;

?>