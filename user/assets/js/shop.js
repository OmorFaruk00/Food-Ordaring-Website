$( document ).ready(function() {
	show_category();
});

function show_category(){
	$.ajax({
		url: "pages/shop/shop-action.php",
		type: "POST",
		data:{
			category_list:""
		},				
		success: function(data){
			$('#show_category').html(data);			             
		}
	});
}

function show_product(){
	$.ajax({
		url: "pages/shop/shop-action.php",
		type: "POST",
		data:{
			selected_category:""
		},				
		success: function(data){
			$('#show_product').html(data);			             
		}
	});
}
show_product();

function select_category(){
	var category_id = [];
	$(":checkbox:checked").each(function(key){
		category_id[key] = $(this).val();
	});

	var catergory_item = category_id.length;
	if(catergory_item > 0){
		var category = category_id;
	}else{
		var category = '';
	}
	$.ajax({
		url: "pages/shop/shop-action.php",
		type: "POST",
		data:{
			selected_category:category
		},				
		success: function(data){
			$('#show_product').html(data);			             
		}
	});

}