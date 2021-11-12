function add_to_cart(id){
	var qty = $('#qty'+id).val();
	var attr = $('input[name="radio_attr'+id+'"]:checked').val();	
	$.ajax({
		url: 'pages/cart/cart.php',
		type: 'post',
		data: {add_cart:'1', qty:qty, attr:attr},
		success: function(data){
			$("#dish_detailes_form").trigger('reset');
			swal({ title: "Congratulation!", text: "Dish Added Successfully", icon: "success", timer: 2000	});
		}

	});
}