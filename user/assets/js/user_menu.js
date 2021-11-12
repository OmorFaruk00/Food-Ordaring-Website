$( document ).ready(function() {
	shop();
});


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