
<?php
include 'Unit6_database.php';

$conn = getConnection();
?> 
<?php



$name = $_GET['name'];
$firstLast = $_GET['firstLast'];


if($firstLast == 'first'){
    $result = getFn($name,$conn);
    
}
if($firstLast == 'last'){
    $result = getLn($name,$conn);
}

echo "<table>";
    echo "<tr>";
        echo "<th>FirstName</th>";
        echo "<th>LastName</th>";
        echo "<th>Email</th>";
    echo "</tr>";
    if ($result): ?>
        <?php foreach($result as $row): ?>
        <?php echo "<tr>"; ?>
        <?php
            $f = $row['first_name'];
            $l = $row['last_name'];
            $e = $row['email'];
            echo"\n<td>$f</td>\n";
            echo"<td>$l</td>\n";
            echo"<td>$e</td>\n"; ?>
        <?php echo "</tr>"; ?>


        <?php endforeach ?>
    <?php endif ?>
<?php echo"</table>"; ?>
<?php echo "<br>"; ?>



