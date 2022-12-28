
<?php
include 'Unit6_database.php';
date_default_timezone_set("America/Denver");
$conn = getConnection();
?> 

<?php
$cost = 0;
$total = 0;
$subtotal = 0;
$tax = 0;
//Fetching Values from URL
$email = $_POST["email"];
$Fname = $_POST["Fname"];
$Lname = $_POST["Lname"];
$penID = $_POST["pen"];
$quantity = $_POST["quantity"];
$available = $_POST["available"];
$time = $_POST["time"];
$Pname = $_POST["pens"];

$product = findProduct($conn, $penID);
$row = $product->fetch_assoc();
if($row){
    $cost = $row['price'];
    $pName = $row['product_name'];
}

$subtotal = $_POST["quantity"] * $cost;
$tax = .075 *  $subtotal;
$total = $tax + $subtotal;
$total = number_format($total,2);
$dono = 0;
$result = getEmail($conn); 
$row = $result -> fetch_assoc();

if($row){
    $cust = $row['id'];
    
}


echo $penID;
addOrders($conn,$penID,$cust,$quantity,$cost,$tax,0,$time);
sellProduct3($conn, $quantity, $pName);
echo "Order Submitted Succesfully! $Fname$Lname purchased $quantity $pName pen(s) $subtotal!";