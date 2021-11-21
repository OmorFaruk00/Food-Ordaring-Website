
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
			url: "pages/user/user_action.php",
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
function update_profile(){
	$.ajax({
		url: "pages/user/update_profile.php",
		type: "post",			
		success: function(response){
			$('#main_content').html(response);

		}
	});
}
function update(){	
	var name = $("#name").val();
	var mobile = $("#mobile").val();
	var id = $("#id").val();	
	$.ajax({
		url: "pages/user/user_action.php",
		type: "post",
		data:{update:'1',user_id:id, user_name:name, user_mobile:mobile},			
		success: function(response){
			swal({ title: "Updated", text: "Your profile update successfully", icon: "success", timer:2000, });
			profile();              
		}
	})
	
}
function change_password(){
	$.ajax({
		url: "pages/user/update_password.php",
		type: "post",			
		success: function(response){
			$('#main_content').html(response);

		}
	});
}
function password_submit(){
	var old_pass = $("#old").val();
	var new_pass = $("#new").val();	
	$.ajax({
		url: "pages/user/user_action.php",
		type: "post",
		data:{change_password:'1', old:old_pass, new:new_pass},			
		success: function(data){
			console.log(data);
			if($.trim(data) == "success"){
				$("#change_pass_form").trigger("reset");
				profile();				
				swal({ title: "Updated", text: "Your password update successfully", icon: "success", timer:2000, });				
			}
			else{
				swal({ title: "Error", text: "Your Old password Not Match ", icon: "error", timer:2000, });
			}
			
			            
		}
	})

}
