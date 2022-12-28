            
            

$(document).ready(function(){
    function check(prod, image, quant, price){
        if(prod==''){
            $('p').append('<span id="add_here">Please Fill Pen Name </br></span>');
            alert("Please Fill Pen Name");
            }
            else if(image ==''){
                $('p').append('<span id="add_here">Please Fill Image Name  </br></span>');
                alert("Please Fill Image Name");
            }
            else if(quant ==''){
                $('p').append('<span id="add_here">Please Fill Quantity </br></span>');
                alert("Please Fill Quantity");
            }
            else if(price ==''){
                $('p').append('<span id="add_here">Please Fill Price </br></span>');
                alert("Please Fill Price");
            }else{
                return;
            }
      
    }
    $("#update").click(function(){
        
        var prod = $("#p").val();
        var image = $("#im").val();
        var quant = $("#qu").val();
        var price = $("#pr").val();
        var inactive = $("#in").val();
        
        if (inactive = 'on'){
            inactive = 1;
        }else{
            inactive = 0;
        }
        var id = $("#id").val();
        
       
        
        // // // Returns successful data submission message when the entered information is stored in database.
        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'prod='+ prod + '&image=' + image + '&quant=' + quant + '&price='+ price + '&inactive=' + inactive + '&id=' + id ;
    
        if(prod==''||image==''||quant==''||price ==''){
            check(prod, image, quant, price);
        }else{
    
            $.ajax({
            type: "POST",
            url: "Unit6_produpdate.php",
            data: dataString,
            cache: false,
            success: function(data){
                document.getElementById("hint").innerHTML = data;
                highlight_row();
                document.getElementById("penForm").reset();
                document.getElementById("add_here").innerHTML = "";
                

                
    
    }
    });
    }
    return false;
    });
    });