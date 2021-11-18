$( document ).ready(function() {
	top_menu();
	shop();
});
function top_menu(){	
	$.ajax({
		url: "layout/top_menu.php",
		type: "GET",
		cache: false,
		success: function(response){
			$("#show_top_menu").html(response);              
		}
	});
}

function shop(){	
	$.ajax({
		url: "pages/shop/shop.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_content').html(response);              
		}
	});
}

function about(){
	$.ajax({
		url: "pages/about-us/about.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_content').html(response);               
		}
	});
}
function signin_login(){

	$.ajax({
		url: "pages/register/signin_login.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_content').html(response);               
		}
	});
}
function contact(){
	
	$.ajax({
		url: "pages/contact/contact.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_content').html(response);               
		}
	});
}
function wishlist(){
	$.ajax({
		url: "pages/wishlist/wishlist.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_content').html(response);               
		}
	});
}
function manage_cart(){
   $.ajax({
		url: "pages/cart/cart.php",
		type: "GET",
		cache: false,
		success: function(response){
			$('#main_content').html(response);               
		}
	});
}