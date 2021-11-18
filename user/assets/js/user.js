
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
function order_cencel(){
	// alert("ok");
	$.ajax({
		url: "pages/user/user.php",
		type: "GET",
		cache: false,
		success: function(response){
			              
		}
	});
}