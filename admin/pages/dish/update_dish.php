<?php 
include "../dbconnection.php";
if (isset($_POST['update'])) {
	$id = $_POST['editid'];
	$edit_sql = "SELECT * FROM `dish` WHERE id = '$id'";
	$result1 = $conn->query($edit_sql);
	if($result1->num_rows > 0){
		while($row = $result1->fetch_assoc()){ ?>
			<div class="modal-body">
				<h4 class="text-center mb-3"> Update Dish</h4>
				<form id="dish_form" method ="POST" autocomplete="off" enctype="multipart/form-data">					
					<div class="form-group">						
						<label>Category</label>						
						<select id="select_category" name="category" class="form-control">
							<?php 
							$category = "SELECT * FROM `category`";
							$cat_result = $conn->query($category);
							if($cat_result->num_rows >0){					
							while($row1 = $cat_result->fetch_assoc()){
								if($row['category_id'] == $row1['id']){
									$selected = "selected";
								}else{
									$selected = "";
								}
								
								echo"<option {$selected} value='{$row1['id']}'> {$row1['category']}</option>";
								 } } ?>											
							</select>
						
						
					</div>
					
					<div id="coupon_error"></div>
					<div class="form-group">
						<label>Dish</label>
						<input type="text" id="dish" name="dish" class="form-control" placeholder="Enter Dish Type" value="<?php echo $row['dish']; ?>">
					</div>
					<div class="form-group">
						<label>Detailes</label>
						<input type="text" id="dish_detailes" name="dish_detailes" class="form-control" placeholder="Enter Dish Detailes" value="<?php echo $row['dish_details']; ?>">
					</div>
					<div class="form-group">
						<label>Image</label>
						<input type="file" id="file" name="file" class="form-control" placeholder="Enter Dish Image" >
					</div>
					<div class="form-group">
						<label>Added On</label>
						<input type="date" id="added" name="added" class="form-control" placeholder="Enter Date" value="<?php echo $row['added_on']; ?>">
					</div>					
					<div class="form-group">				
						<input type="hidden" id="status" name="status" value="1">
					</div>
					<div id="alert"></div>
					<div class="form-group">
						<label>Price</label>
						<input type="text" id="price" name="price" class="form-control" placeholder="Enter Price" value="<?php echo $row['price']; ?>">
						<input type="hidden" id="id" name="id" class="form-control" placeholder="Enter Price" value="<?php echo $row['id']; ?>">
					</div>
				</div>
				<div class="d-flex justify-content-end p-3">
					<div id="error_msg" style="height:10px"></div>
					<button type="submit" name="add_dish" id="update_dish" class="btn btn-primary mr-2" data-dismiss="modal">Update</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>        
		</div>

	<?php }
}
}
?>