


$(document).ready(function(){
$("#submit").click(function(){
    
    var Fname = $("#fn").val();
    var email = $("#email").val();
    var Lname = $("#ln").val();
    var quantity = $("#quantity").val();
    var time = $("#time").val();
    var available = $("#available").val();
    var pen = $("#pSel").val();
    var quanInt = parseInt(quantity);
    var availInt = parseInt(available);
    
    // // // Returns successful data submission message when the entered information is stored in database.
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'Fname='+ Fname + '&Lname=' + Lname + '&email=' + email + '&pen='+ pen + '&available=' + available + '&quantity=' + quantity + '&time=' + time;

    if(Fname==''||email==''||Lname==''||quantity==''||pen =='' || quantity == ''){
    alert("Please Fill All Fields");
    }else if((quanInt > availInt)){
        alert("Please Choose An Available Quantity");
    }else{

        $.ajax({
        type: "POST",
        url: "Unit6_ajaxsubmit.php",
        data: dataString,
        cache: false,
        success: function(result){
            
            document.getElementById('fn').value = '';
            document.getElementById('ln').value = '';
            document.getElementById('email').value = '';
            document.getElementById('pSel').value = '';
            document.getElementById('available').value = '';
            document.getElementById('quantity').value = '';
            $("#hint").empty();
            document.getElementById('results').append(result);

}
});
}
return false;
});
});