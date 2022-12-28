<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

<script type="text/javascript" src="Unit6_add.js"></script>
<script type="text/javascript" src="Unit6_update.js"></script>
<script type="text/javascript" src="Unit6_delete.js"></script>
<link rel="stylesheet" href="Unit6_adminProduct.css">
<link rel="stylesheet"href="Unit6_common.css">
<?php
include 'Unit6_database.php';

date_default_timezone_set("America/Denver");
$conn = getConnection();
?> 
</head>
<body>
<?php include "Unit6_header.php" ?>
<?php
  if($adminRole != 2){
    header("Location: Unit6_index.php?err=You do not have the access rights or you need to log in first");
  }
 ?>
<div class="row">
    
  <div class="column">
  <form id ="penForm" >
        Name: * <input id ="p" type="text" name="name"  required><br>
        Image: * <input id ="im" type="text" name="image" required ><br>
        Quantity: * <input id ="qu" type="number" name="quantity"  required ><br>
        Price: * <input id ="pr" type="number" name="price" required ><br>
        Inactive: * <input id ="in" type="checkbox" name="inactive"required ><br>
        <input id = "id" type ="hidden" name = "prod_id">
        <input id="add" type="button" value="add">
        <input id="update" type="button" value="update">
        <input id="delete" type="button" value="delete" onclick="return confirm('Are you sure?')">

</form>
<p> </p>
  </div>
  <div class="column">
  
  


 
 



<span id="hint"<?php createTable($conn); ?> > </span>
<script>
highlight_row()
function highlight_row() {
    var table = document.getElementById('display-table');
    var cells = table.getElementsByTagName('td');

    for (var i = 0; i < cells.length; i++) {
        // Take each cell
        var cell = cells[i];
        // do something on onclick event for cell
        cell.onclick = function () {
            // Get the row id where the cell exists
            var rowId = this.parentNode.rowIndex;

            var rowsNotSelected = table.getElementsByTagName('tr');
            for (var row = 0; row < rowsNotSelected.length; row++) {
                rowsNotSelected[row].style.backgroundColor = "";
                rowsNotSelected[row].classList.remove('selected');
            }
            var rowSelected = table.getElementsByTagName('tr')[rowId];
            rowSelected.style.backgroundColor = "yellow";
            rowSelected.className += " selected";

            document.getElementById("p").value = rowSelected.cells[0].innerHTML;
            document.getElementById("im").value = rowSelected.cells[1].innerHTML;
            document.getElementById("qu").value = rowSelected.cells[2].innerHTML;
            document.getElementById("pr").value = rowSelected.cells[3].innerHTML;
            document.getElementById("in").value = rowSelected.cells[4].innerHTML;
            document.getElementById("id").value = rowSelected.cells[5].innerHTML;
        }
    }

}

</script>
</div>
</div>
<?php include "Unit6_footer.php" ?>

</body>
</html>