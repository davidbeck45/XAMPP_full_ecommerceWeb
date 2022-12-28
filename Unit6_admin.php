<!DOCTYPE html>
<html>
<?php
include 'Unit6_database.php';
$conn = getConnection();
?> 
<head>
<link href="Unit6_common.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="Unit6_admin.css">
</head>
<?php include "Unit6_header.php" ?>
<?php
  if($adminRole < 1){
    header("Location: Unit6_index.php?err=You do not have the access rights or you need to log in first");
  }
 ?>
<body>
<table>
                <tr>
                    <th>Customer #</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Email</th>
                </tr>
                
                <?php $result = getMyCustomers($conn);?>
                
                <?php if ($result): ?>
                    <?php foreach($result as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['last_name'] ?></td>
                        <td><?= $row['first_name'] ?></td>
                        <td><?= $row['email'] ?></td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>

</table>
<table>
                <tr>
                    <th>Order #</th>
                    <th>product #</th>
                    <th>customer #</th>
                    <th>quantity </th>
                    <th>price </th>
                    <th>tax</th>
                    <th>donation</th>
                    <th>timestamp</th>
                </tr>
                <?php
                $result = totalOrder($conn);
                $row = $result-> fetch_assoc();
                if($row["x"] == 0){
                    echo "Number of Orders: " . $row['x'] . "<br/>";

                }
                ?>
                <?php $result = getMyOrder($conn);?>
                <?php if ($result): ?>
                    <?php foreach($result as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['product_id'] ?></td>
                        <td><?= $row['customer_id'] ?></td>
                        <td><?= $row['quantity'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><?= $row['tax'] ?></td>
                        <td><?= $row['donation'] ?></td>
                        <td><?= $row['time_stamp'] ?></td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
</table>
<table>
                <tr>
                    <th>Product #</th>
                    <th>Name</th>
                    <th>Image Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </tr>
                <?php $result = getMyProduct($conn);?>
                <?php if ($result): ?>
                    <?php foreach($result as $row): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['product_name'] ?></td>
                        <td><?= $row['image_name'] ?></td>
                        <td><?= $row['price'] ?></td>
                        <td><?= $row['in_stock'] ?></td>
                    </tr>
                    <?php endforeach ?>
                <?php endif ?>
</table>
<?php include "Unit6_footer.php" ?>