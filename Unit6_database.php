<?php include "Unit6_database_credentials.php" ?>

<?php
function getConnection(){
    include "Unit6_database_credentials.php";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}
function totalOrder($conn){
    $sql = "select COUNT(*) x from Orders";
    $totalOrder = $conn -> query($sql);
    return $totalOrder;
}
function getMyCustomers($conn) {
    $sql = "select * from Customer";
    $result = $conn->query($sql);
    return $result;
}

function getCust2($conn) {
    $stmt = $conn -> prepare("select * from Customer where id = ?") ;
    $stmt->bind_param("i", $Customer_id);
    $Customer_id = 2;
    $stmt->execute();
    $customer2 = $stmt->get_result();
    $stmt->close();
    return $customer2;
}
function getCust3($conn) {
    $stmt = $conn -> prepare("select * from Customer where id = ?") ;
    $stmt->bind_param("i", $Customer_id);
    $Customer_id = 3;
    $stmt->execute();
    $customer3 = $stmt->get_result();
    $stmt->close();
    return $customer3;
}
function getEmail($conn) {
    $stmt = $conn -> prepare("select * from Customer where email = ?") ;
    $stmt->bind_param("s", $email);
    $email = $_POST["email"];
    $stmt->execute();
    $customerEmail = $stmt->get_result();
    $stmt->close();
    return $customerEmail;
    
}
function getEmail2($conn) {
    $stmt = $conn -> prepare("select * from Customer where email = ?") ;
    $stmt->bind_param("s", $email2);
    $email2 = "dduck@mines.edu";
    $stmt->execute();
    $customerEmail2 = $stmt->get_result();
    $stmt->close();
    return $customerEmail2;
    
    
}
function addCustomer($conn,$e,$f,$l){
    $sql = "INSERT INTO Customer (first_name, last_name, email)
    VALUES ('$f','$l','$e')";
    
    $result = $conn->query($sql);
    return $result;
      
}
function getMyOrder($conn) {
    $sql = "select * from Orders";
    $result = $conn->query($sql);
    return $result;
}
function addOrder($conn,$prod,$cust,$quant,$price,$tax,$dono){
    $t = $_POST['t'];
    $result = $conn->query("SELECT * FROM Orders WHERE time_stamp=$t AND product_id=$prod AND customer_id=$cust");
    if ($result->num_rows > 0) return;
    
    $sql = "INSERT INTO Orders (product_id,customer_id,quantity,price,tax,donation,time_stamp)
    VALUES ('$prod','$cust','$quant', '$price', '$tax','$dono','$t')";
    

    $result = $conn->query($sql);
    return $result;
      
}
function getMyProduct($conn) {
    $sql = "select * from Product";
    $result = $conn->query($sql);
    return $result;
}
function sellProduct($conn) {
    $stmt = $conn -> prepare("UPDATE Product set in_stock = '8' where product_name = ? ") ;
    $stmt->bind_param("s", $Product_id);
    $Product_id = "BSIQ";
    $stmt->execute();
    $product = $stmt->get_result();
    $stmt->close();
    return $product;
}
function findProduct($conn, $productID) {
    $stmt = $conn -> prepare("select * from Product where id = ?") ;
    $stmt->bind_param("i", $productID);
    
    $stmt->execute();
    $product1 = $stmt->get_result();
    $stmt->close();
    return $product1;
}
function sellProduct2($conn) {
    $stmt = $conn -> prepare("UPDATE Product set in_stock = '0' where product_name = ? ") ;
    $stmt->bind_param("s", $Product_id);
    $Product_id = "BSIQ";
    $stmt->execute();
    $product = $stmt->get_result();
    $stmt->close();
    return $product;
}
function getCustNameByEmail($conn, $custEmail) {
    $query = "select first_name, last_name from Customer where email = ?";
    $stmt = $conn->prepare( $query );
    $stmt->bind_param("s", $custEmail);
    
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    if ($result->num_rows > 0) {
        $row =  $result->fetch_assoc();
        $name = $row['first_name'] . " " . $row['last_name'];
        return $name;
    }
    else {
        return 0;
    }
}
function getFn($name,$conn){
    
    $name = $name . '%';
    $stmt = $conn -> prepare(" SELECT * FROM Customer WHERE first_name LIKE ?");
    
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}
function getLn($name,$conn){
    
    $name = $name . '%';
    $stmt = $conn -> prepare(" SELECT * FROM Customer WHERE last_name LIKE ?");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result;
}

function addOrders($conn,$prod,$cust,$quant,$price,$tax,$dono,$t){
    
    if ($result->num_rows > 0) return;
    
    $sql = "INSERT INTO Orders (product_id,customer_id,quantity,price,tax,donation,time_stamp)
    VALUES ('$prod','$cust','$quant', '$price', '$tax','$dono','$t')";
    

    $result = $conn->query($sql);
    return $result;
}
function sellProduct3($conn,$bought,$pName) {
    $stmt = $conn -> prepare("UPDATE Product set in_stock = in_stock - '$bought' where product_name = ? ") ;
    $stmt->bind_param("s", $pName);
    
    $stmt->execute();
    $product = $stmt->get_result();
    $stmt->close();
    return $product;
}
function available($conn,$id){
    $query = "select in_stock from Product where id = ?";
    $stmt = $conn->prepare( $query );
    $stmt->bind_param("i", $id);
    
    $stmt->execute();
    $result = $stmt->get_result(); // get the mysqli result
    if ($result->num_rows > 0) {
        $row =  $result->fetch_assoc();
        $A = $row['in_stock'];
        return $A;
    }
    else {
        return 0;
    }
}
function inactiveProduct($conn) {
    $stmt = $conn -> prepare("select * from Product where inactive = ?") ;
    $stmt->bind_param("i", 1);
    $stmt->execute();
    $product2 = $stmt->get_result();
    $stmt->close();
    return $product2;
}
function createTable($conn){
    $result = getMyProduct($conn);
    echo "<div style='max-height: 50 overflow-y: scroll; '>";
        echo "<table id=\"display-table\" class=\"table-layout\" style='height: 400px; '>";
            echo "<thead style='width: 100%;'>";
            echo "<tr>";
                echo "<th>Pen</th>";
                echo "<th>image</th>";
                echo "<th>quantity</th>";
                echo "<th>price</th>";
                echo "<th>inactive</th>";
                echo "<th style = display:none></th>";
            echo "</tr>";
                if ($result):
                    foreach($result as $row):
                    echo "<tr>";
                    
                    $pe = $row['product_name'];
                    $im = $row['image_name'];
                    $qu = $row['in_stock'];
                    $pr = $row['price'];
                    //$in = $row['inactive'];
                    $id = $row['id'];
                    echo"\n<td>$pe</td>\n";
                    echo"<td>$im</td>\n";
                    echo"<td>$qu</td>\n";
                    echo"<td>$pr</td>\n";
                    if($row['inactive']){
                        echo"<td>Yes</td>\n";
                    }else{
                        echo"<td>No</td>\n";
                    }
                    echo"<td style=display:none>$id</td>";
                    echo "</tr>";
    //echo "</div>";
                    endforeach;
                    endif;

}
function addProduct($conn,$prod,$image,$quant,$price,$inactive){
    
    $sql = "INSERT INTO Product (product_name,image_name,in_stock,price,inactive)
    VALUES ('$prod','$image','$quant', '$price', '$inactive')";
    $result = $conn->query($sql);
    return $result;
      
}
function updateProduct($conn,$prod,$image,$quant,$price,$inactive,$id){
    
    $stmt = $conn->prepare("UPDATE Product SET product_name = ?,image_name = ?,in_stock =? ,price = ?,inactive = ? WHERE id = ?");

    $stmt->bind_param('ssidii',$prod,$image,$quant,$price,$inactive,$id);
    $stmt->execute();
    
      
}
function checkOrderForDelete($conn,$id){
    $stmt = $conn -> prepare("select * from Orders where product_id = ?") ;
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;

}
function deleteProduct($conn, $id){
    $stmt = $conn -> prepare("DELETE from Product where id = ?") ;
    $stmt->bind_param("i", $id);
    $stmt->execute();
   
}
function loginEmailPass($conn,$email,$pass){
    $stmt = $conn -> prepare("SELECT * from Users WHERE email = ? AND pass = ?");
    $stmt->bind_param("ss", $email,$pass);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result;
}
?> 
