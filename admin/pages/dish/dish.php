<div class="text-info mt-3 d-flex justify-content-between">
	<h2 class="ml-3"> Dish Detailes</h2>
	<div id="alert_msg" style="height: 10px;"></div>
	<button class="btn btn-info" data-toggle="modal" data-target="#Add_dish_modal">Add Dish</button>
</div>
<div id="show_dish_data"></div>

<div class="modal fade" id="Add_dish_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">      
			<div class="modal-body">
				<h4 class="text-center mb-3"> Add Dish</h4>
				<form id="dish_form" method ="POST" autocomplete="off" enctype="multipart/form-data">
					<div class="form-group">
						<label>Category</label>
						<select id="select_category" name="category" class="form-control">
							<option value="">Select Category</option>											
						</select>
					</div>
					<div id="coupon_error"></div>
					<div class="form-group">
						<label>Dish</label>
						<input type="text" id="dish" name="dish" class="form-control" placeholder="Enter Dish Type">
					</div>
					<div class="form-group">
						<label>Detailes</label>
						<input type="text" id="dish_detailes" name="dish_detailes" class="form-control" placeholder="Enter Dish Detailes">
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" id="file" name="file" class="form-control" placeholder="Enter Dish Image">
					</div>
					<div class="form-group">
						<label>Added On</label>
						<input type="date" id="added" name="added" class="form-control" placeholder="Enter Date">
					</div>					
					<div class="form-group">				
						<input type="hidden" id="status" name="status" value="1">
					</div>
					<div id="alert"></div>			
					<div class="d-flex justify-content-end">
						<div id="error_msg" style="height:10px"></div>
						<button type="submit" name="add_dish" id="add_dish" class="btn btn-primary mr-2" data-dismiss="modal">Submit</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>        
			</div>      
		</div>
	</div>
</div>
<!-- Update delivery boy modal -->
<div class="modal fade" id="update_coupon_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content"  id="update_modal"> 		
		</div>
	</div>
</div>


<script src="js/dish.js"></script>