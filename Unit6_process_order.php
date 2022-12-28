<html>
<head>
<link rel="stylesheet" href="Unit6_common.css">
<script type = "text/javascript" src="Unit6_cookie.js"></script>
</head>
<?php
include 'Unit6_database.php';
$conn = getConnection();
?> 
<body>

<?php include "Unit6_header.php" ?>
<div class ="tx" >
<?php
$cost = 0;
$total = 0;
$subtotal = 0;
$tax = 0;
?>
<?php 
$customerEmail= getEmail($conn); 


if($customerEmail->num_rows > 0){
   $row = $customerEmail -> fetch_assoc();
   echo "Welcome Back " .$row['first_name']. " " . $row['last_name']. "<br/>";
}else{
   $email = $_POST["email"];
   $fName = $_POST["FirstName"];
   $lName = $_POST["LastName"];
   addCustomer($conn,$email,$fName,$lName);
}
?>
<?php 

$result = getMyProduct($conn); 
$row = $result -> fetch_assoc();

if($row){
    $pens = $row['id'];
    
}
$product = findProduct($conn, $_POST["pens"]);
   $row = $product->fetch_assoc();
   if($row){
      
      $name = $row['product_name'];
   }
?>

Thank you for your order,  <?php echo $_POST["FirstName"]; ?>
 <?php echo $_POST["LastName"]; ?>
 (<?php echo $_POST["email"]; ?>)
</br>
You have selected:  <?php echo $_POST["quantity"]; ?>

 <?php echo $name; ?> pen(s) @
 
 <?php
   
   $product = findProduct($conn, $_POST["pens"]);
   $row = $product->fetch_assoc();
   if($row){
      $cost = $row['price'];
      $name = $row['product_name'];
   }


 echo $cost;
 $subtotal = $_POST["quantity"] * $cost;
 
 ?>
 </br>
 subtotal: $<?php echo $subtotal?>
</br>
Total including tax(.75%): $
<?php
$tax = .075 *  $subtotal;
$total = $tax + $subtotal;
$total = number_format($total,2);
echo $total;


?>
<?php $purchased = $_POST["pens"]?>
</br>
Total with donation: $
<?php
if($_POST["dono"] == "Yes"){
   $dono = ceil($total)-$total;
    echo ceil($total);
}else{
   $dono = 0;
    echo $total;
}

?>
<?php 

$result = getEmail($conn); 
$row = $result -> fetch_assoc();

if($row){
    $cust = $row['id'];
    
}
addOrder($conn,$_POST["pens"],$cust,$_POST["quantity"],$cost,$tax,$dono);
?>
<p id = "emailOfferText"> We will send offers to <?php echo $_POST["email"] ?> </p>

<div id = "Offer">Based on your viewing history we'd like to offer 20% off on these items: </div>


<ul id="myList"></ul>
<script>
var penName=<?php echo json_encode($name); ?>;
let list = document.getElementById("myList");

$cookie = getCookie("pen");
$cookie.forEach((item)=>{
  let li = document.createElement("li");
  li.innerText = item;
  list.appendChild(li);
})
$('#myList li').filter(function() {
    return $(this).text() === penName;
}).hide();
var len = document.querySelectorAll("#myList li").length;
if(len == 1){
   $('#Offer').hide();
}


</script>





</div>



<?php include "Unit6_footer.php" ?>
</body>
</html>