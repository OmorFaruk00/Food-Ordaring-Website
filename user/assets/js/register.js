$("#register_btn").on("click", function(){
	$.ajax({
		url:"pages/register/signin_login_action.php",
		type:"POST",		
		data:$("#register_form").serialize(),
		success : function(result){			
			var data = JSON.parse(result);
			if(data.status == 'error'){
				$("#"+data.field).html(data.msg);				
			}else if(data.status == 'success'){				
				$("#"+data.field).html(data.msg);
				setTimeout(function(){$("#"+data.field).html(data.msg);}, 2000);
			}
		}
	});
});
