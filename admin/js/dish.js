function show_dish(){		
	$.ajax({
		url : 'pages/dish/dish_action.php',
		type: 'POST',
		success: function(data){
			$("#show_dish_data").html(data);
		}
	});
}
show_dish();

$(document).on("click", "#dish_status", function(){	
	var id = $(this).data("id");
	var type = $(this).val();
	if(confirm("Do You Really Want To Change This Status.. ? ")){
		$.ajax({
			url : 'pages/dish/dish_action.php',
			type : 'POST',
			data:{dish_status:"1", id:id, type:type},
			success: function(data){
				show_dish();

			}
		});
	}	
});

function show_dish_category(){		
	$.ajax({
		url : 'pages/dish/dish_action.php',
		type: 'POST',
		data: {dish_category:""},
		success: function(data){
			$("#select_category").append(data);
		}
	});
}
show_dish_category();

$("#add_dish").on("click", function(){		
	var formData = new FormData(document.getElementById('dish_form'));	
	$.ajax({
		url : 'pages/dish/add_dish.php',
		type: 'POST',
		data : formData,
		contentType: false,
		processData: false,
		success: function(data){
			console.log(data);				
			show_dish();			
			$("#dish_form").trigger("reset");
			$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Add Successfully..</h4>");
			setTimeout(function(){ $("#alert_msg").html("") }, 2000);				
		}
	});
});


$(document).on("click", "#delete_dish", function(){	
	var getid = $(this).data("id");
	if(confirm("Do You Really Want To Delete This Record.. ? ")){
		$.ajax({
			url : 'pages/dish/dish_action.php',
			type : 'POST',
			data : {delete_dish:'1', deleteid:getid},
			success : function(data){
				show_dish();
				$("#alert_msg").html("<h4 class='text-success text-center mb-3 '>Delete Successfully..</h4>");
				setTimeout(function(){ $("#alert_msg").html("") }, 2000);      
			}
		});
	}
});

$("#add_more").on("click", function(){

	var html = '';
            html += '<div id="inputFormRow" class="row">';
            html += '<div class="col-4 mb-2">';
            html += '<input type="text" class="form-control" placeholder="Enter Attribute" name="attribute[]">';
            html += '</div>';
            html += '<div class="col-4">';
            html += '<input type="text" class="form-control" placeholder="Enter Price" name="price[]">';
            html += '</div>';
            html += '<button id="removeRow" type="button" class="btn btn-danger mb-2">Remove</button>';           
            html += '</div>';

            $('#add_box').append(html);
           
});
$(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
