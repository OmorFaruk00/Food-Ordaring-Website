$("#register_btn").on("click", function(){

	var name = $("#name").val();
	var password = $("#password").val();
	var email = $("#email").val();
	var mobile = $("#mobile").val();
	
	if(name == ""){		
		$("#name_error").html("**Please Fill The Username Field");
		return false;
	}
	if((name.length <=2)|| (name.length ) > 20){
		$("#name_error").html("**Username must be between 2 to 20");
		return false;
	}
	if(!isNaN(name)){
		$("#name_error").html("**Only character are allowed");
		return false;	
	}
	if(password == ""){		
		$("#password_error").html("**Please Fill The Password Field");
		return false;
	}
	if((password.length <=3)|| (password.length ) > 8 ){
		$("#password_error").html("**Password must be between 4 to 8");
		return false;
	}
	if(email == ""){		
		$("#email_error").html("**Please Fill The email Field");
		return false;
	}
	if(mobile == ""){		
		$("#mobile_error").html("**Please Fill The Mobile Field");
		return false;
	}
	if(mobile.length != 11){
		$("#mobile_error").html("**Mobile Number must be 11 number");
		return false;
	}
	else{
		$.ajax({
			url:"pages/register/signin_login_action.php",
			type:"POST",		
			data:$("#register_form").serialize(),
			success : function(result){						
				var data = JSON.parse(result);
				if(data.status == 'error'){
					$("#"+data.field).html(data.msg);
					setTimeout(function(){$("#email_error").html('');}, 2000);
				}else if(data.status == 'success'){
					$("#register_form").trigger('reset');
					$("#"+data.field).html(data.msg);
					setTimeout(function(){$("#response").html('');}, 2000);
				}
			}
		});
	}	
});

$("#user_login").on("click", function(){
	var name = $("#user_name").val();
	var password = $("#user_password").val();

	$.ajax({
		url:"pages/register/login.php",
		type:"POST",		
		data:{name:name, password:password},
		success : function(result){												
			var data = JSON.parse(result);
			if(data.status == 'error'){			

				$("#"+data.field).html(data.msg);
					// setTimeout(function(){$("#email_error").html('');}, 2000);
				}else if(data.status == 'success'){				    					
					$("#login_form").trigger('reset');
					$("#"+data.field).html(data.msg);
					// shop();
					setTimeout(function(){ shop();}, 2000);
					user_account(data.username);
				}
			}
		});
});

function user_account(username){
	if(username != null){
		document.getElementById("user_account").innerHTML = '<ul><li class="top-hover"><a href="#" class="text-danger">'+username+'<i class="ion-chevron-down text-danger"></i></a><ul><li><a href="wishlist.php">Wishlist  </a></li><li><a href="#" onclick="logout()">Logout</a></li><li><a href="my-account.php">my account</a></li></ul></li></ul>';
	}
}



function logout(){
	$.ajax({
		url:"pages/register/logout.php",
		type:"POST",
		success : function(result){	
			$("#user_account").html("");
		}
	});
}