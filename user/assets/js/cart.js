
$('.add-to-cart').click(function(e){	
    e.preventDefault();
    var p_id = $(this).attr('data-id');        
    $.ajax({
        url: 'pages/cart/cart-action.php',
        method: 'POST',
        data: {addCart:p_id},
        success: function(data){ 
            top_menu();                
                // location.reload();
            }
        });
});  



$('.remove-cart-item').click(function(e){
    e.preventDefault();
    var p_id = $(this).attr('data-id');
    $.ajax({
        url: 'pages/cart/cart-action.php',
        method: 'POST',
        data: {removeCartItem:p_id},
        success: function(data){
            top_menu();
            manage_cart();

        }


    });
});


function net_amount(){
    var amount = 0;
    $('.subtotal').each(function(){
        var val = $(this).html();                     
        var total = parseInt(amount) + parseInt(val);
        amount = total;     

    });
    $('.total-amount').html(amount);  


}
net_amount();

$('.item_qty').change(function(){        
    var qty = $(this).val();
    if(qty > 0){
    var price = $(this).siblings('.item-price').val();
    var dish_id = $(this).siblings('.dish_id').val();
    var new_price = (qty * price);              
    $('.subtotal'+dish_id).html(new_price);        
    net_amount();
    }
    

});

function checkout(){      
 var qty = [];
 var id = [];
 var total = $(".total-amount").text();
 var address = $("#address").val();
 var delivery_date = $("#date").val();
 $('.item_qty').each(function(){
   var value = $(this).val();
   qty.push(value);         

})
 $('.id').each(function(){
   var value = $(this).val();
   id.push(value);         

}) 

 $.ajax({
    url: 'pages/cart/cart-action.php',
    method: 'POST',
    data : {
        cart_checkout:'',
        dish_id:id,
        dish_qty:qty,
        total_amount:total,
        order_address:address,
        delivery_date:delivery_date
    },
    success: function(data){
        console.log(data);

    }
}); 
}


