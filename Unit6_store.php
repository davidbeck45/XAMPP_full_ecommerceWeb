<!DOCTYPE html>
<html>
<head>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script type = "text/javascript" src="Unit6_store.js"></script>
<link rel="stylesheet"href="Unit6_common.css">
<link rel="stylesheet" href="Unit6_store.css">
<script type = "text/javascript" src="Unit6_cookie.js"></script>
<?php
include 'Unit6_database.php';
date_default_timezone_set("America/Denver");
$conn = getConnection();
?> 
</head>
<script>
    $cookie = getCookie("none");
    
    if($cookie != null){

        for(let i = 0; i < $cookie.length; i++){
            console.log($cookie[i]);
            document.cookie = $cookie[i] + "=; path=/; max-age=0";
        }
    }
</script>

<body>
<?php include "Unit6_header.php" ?>

<div class ="row">
  <div class="column">


  <p1>Personal Info</p1>

  <form action="Unit6_process_order.php" method="post">
  FirstName: * <input id ="fn" type="text" name="FirstName" required ><br>
  LastName: * <input id ="ln" type="text" name="LastName" required ><br>
  E-mail: * <input type="email" name="email" required ><br>
  <input type="hidden" name="t" value="<?=time()?>">



  <p2>Product Info</p2>

  <?php $result = getMyProduct($conn);?>
                <?php if ($result): ?>
                  <select name="pens" id = "pSel" required>
                    <option value="" disabled selected hidden>Choose a pen</option>
                    <?php foreach($result as $row): ?>
                      <option value = <?=$row['id']?> data-image_name = <?= $row['image_name'] ?> data-in_stock = <?= $row['in_stock'] ?> data-inactive = <?= $row['inactive'] ?> data-product_name = <?=$row['product_name']?> > <?= $row['product_name'] ?><?= $row['price'] ?></option>
                      

                    <?php endforeach ?>
                    <label for="quantity">Quantity (between 1 and 5):</label>
                    <input type="number" id="quantity" name="quantity" min="1" max="100" required >
                    </select>
                <?php endif ?>

  <br/>


  <aside>round up to the nearest dollar for donation?</aside>
  <input type="radio" id="Yes" name="dono" value="Yes">
  <label for="Yes">Yes</label><br>
  <input type="radio" id="No" name="dono" value="No">
  <label for="No">No</label><br>
  <input type="submit" value="Submit">
  </form>
  
  </div>
  <div class="column">
    <div class = "side">
    Select Pen to see image:
    </div>  

    <div class = "side2">
    <img id = "penImg" src = ""></img>
    <p id ="quant"></p>
    <p id ="soldout"></p>
    </div>
  </div>
</div>
<script>
$('#pSel').on("change",function(){

    var image = $("#pSel option:selected").attr('data-image_name');
    var name = $("#pSel option:selected").attr('data-product_name');
    var id = $("#pSel option:selected").attr('value');

    document.cookie = name + "=" + name + "; path=/;";
    
    $("#penImg").attr('src', 'image/' + image + '.jpg');
    var quantity = $("#pSel option:selected").attr('data-in_stock');
    if(quantity == 0){
      $('#soldout').show();
      $('#quant').hide();
      $('#soldout').append("Sold Out");
    }
    if(quantity < 5 && quantity > 0){
      $('#quant').show();
      $('#soldout').hide();
      $('#quant').append("Only " + quantity + " Left");
    }
    if(quantity >= 5){
      $('#quant').hide();
      $('#soldout').hide();
    }
  
   
});


</script>
<script>
var inactive = $("#pSel option[data-inactive='1']").attr("disabled","disabled"); 
</script>

<?php include "Unit6_footer.php" ?>



</body>
</html>