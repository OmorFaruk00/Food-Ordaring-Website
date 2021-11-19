
function my_order(){
	$.ajax({
		url: "pages/user/user_order.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_content').html(response);
			              
		}
	});
}
function order_cancel(){	
	if(confirm("Are you sure you want to cancel this order")){
		$.ajax({
			url: "pages/user/user.php",
			type: "post",		
			data:{cencel_order:"1"},
			success: function(response){
				swal({ title: "Canceled", text: "Your order is calceled", icon: "success", timer:2000, });
				my_order();        
			}
		});
	}
	
}
function profile(){

	$.ajax({
		url: "pages/user/profile.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_content').html(response);
			              
		}
	});
}