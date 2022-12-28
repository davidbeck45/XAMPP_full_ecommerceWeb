<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script type="text/javascript" src="Unit6_script.js"></script>
<link rel="stylesheet"href="Unit6_common.css">
<link rel="stylesheet" href="Unit6_store.css">
<?php
include 'Unit6_database.php';

date_default_timezone_set("America/Denver");
$conn = getConnection();
?> 
</head>


<body>
<?php include "Unit6_header.php" ?>
<?php
  if($adminRole < 1){
    header("Location: Unit6_index.php?err=You do not have the access rights or you need to log in first");
  }
 ?>
<div class ="row">
  <div class="column">

  
  <p1>Personal Info</p1>

  <form method="post" >
  FirstName: * <input id ="fn" type="text" name="FirstName" onkeyup="showName(this.value,'first')" required><br>
  LastName: * <input id ="ln" type="text" name="LastName" onkeyup="showName(this.value,'last')" required ><br>
  E-mail: * <input id ="email" type="email" name="email"  required ><br>
  <input id = "time" type="hidden" name="t" value="<?=time()?>">

  
  <br/>
  <?php  ?>
 





  <p2>Product Info</p2>

  <?php $result = getMyProduct($conn);?>
                <?php if ($result): ?>
                  <select name="pens" id = "pSel" required>
                    <option value="" disabled selected hidden>Choose a pen</option>
                    <?php foreach($result as $row): ?>
                      <option value = <?=$row['id']?> data-image_name = <?= $row['image_name'] ?> data-in_stock = <?= $row['in_stock'] ?> > <?= $row['product_name'] ?><?= $row['price'] ?></option>
                    <?php endforeach ?>
                    <label for="quantity">Quantity (between 1 and 5):</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="100" required ><br/>
                    Availble:<input type="text" id="available" name="available" readonly><br>
                    <input id="submit" type="button" value="Submit">
                    </select>
                <?php endif ?>

  <br/>


  <input id = "reset" type="reset" value="Clear Field"  /> <br/>

  </div>
  <div class="column">
    <div class = "side"> 
    <div id="hint" onclick ="highlight_row()"></div>
    <p id ="results"></p>
    <p id ="quant"></p>
    <p id ="soldout"></p>
    </div>
  </div>
</div>


<script> 

function showName(name, firstLast) {
    
    if(name.length == 0){
      document.getElementById("hint").innerHTML = "";
      return;
    } else{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
        document.getElementById("hint").innerHTML = this.responseText;
          
      };
      xmlhttp.open("GET", "Unit6_custTable.php?name=" + name +"&firstLast=" + firstLast);
      xmlhttp.send();
      
    }
  }
</script>

<script> 
// Demo function that accesses customer file

function showAvailable() {
  
  var id = document.getElementById('pSel').value;
  if(id.length ==0){
    document.getElementById("available").innerHTML = "";
  }else{
      var xmlhttp1 = new XMLHttpRequest();
      xmlhttp1.onload = function() {
      document.getElementById('available').value = this.responseText;

    };
    xmlhttp1.open("GET", "Unit6_get_available.php?id=" + id);
    xmlhttp1.send();
  }
    
  }
</script>
<style>
#hint {
    text-align: center;
    border: 1px solid black;
    border-collapse: collapse;
    font-family:"Trebuchet MS";
    margin: 0 auto 0;
}
#hint td, #hint th {
    border: 1px solid grey;
    padding: 5px 5px 0;
}
#hint td {
    text-align: left;
}
.selected {
    color: red;

}
</style>
<script>

function highlight_row() {
    var table = document.getElementById('hint');
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

            document.getElementById("fn").value = rowSelected.cells[0].innerHTML;
            document.getElementById("ln").value = rowSelected.cells[1].innerHTML;
            document.getElementById("email").value = rowSelected.cells[2].innerHTML;
        }
    }

}
</script>

<?php include "Unit6_footer.php" ?>



</body>
</html>