<?php
include "../dbconnection.php";
if (isset($_POST['update'])) {
	$id = $_POST['editid'];
	$edit_sql = "SELECT * FROM `coupon_code` WHERE id = '$id'";
	$result1 = $conn->query($edit_sql);
	if($result1->num_rows > 0){
		while($row = $result1->fetch_assoc()){
			?>				
				<div class="modal-body">
				<h4 class="text-center mb-3"> Update Coupon </h4>
				<form id="update_coupon_form" method ="POST" autocomplete="off">
					<div class="form-group">
						<label>Coupon Code</label>
						<input type="text" id="up_code" class="form-control" placeholder="Enter Code" value="<?php echo $row['coupon_code']; ?>" >
					</div>
					<div class="form-group">
						<label>Coupon Type</label>
						<input type="text" id="up_type" class="form-control" placeholder="Enter Type" value="<?php echo $row['coupon_type']; ?>" >
					</div>
					<div class="form-group">
						<label>Coupon Value</label>
						<input type="number" id="up_value" class="form-control" placeholder="Enter Value" value="<?php echo $row['coupon_value']; ?>" >
					</div>
					<div class="form-group">
						<label>Min Value</label>
						<input type="number" id="up_min_value" class="form-control" placeholder="Enter Value" value="<?php echo $row['cart_min_value']; ?>" >
					</div>
					<div class="form-group">
						<label>Added On</label>
						<input type="date" id="up_added" class="form-control" placeholder="Enter Date" value="<?php echo $row['added_on']; ?>" >
					</div>
					<div class="form-group">
						<label>Expire On</label>
						<input type="date" id="up_expire" class="form-control" placeholder="Enter Date" value="<?php echo $row['expire_on']; ?>" >
					</div>					
					<div class="form-group">				
						<input type="hidden" id="up_id" value="<?php echo $row['id']; ?>">
					</div>
					<div id="alert"></div>			
					<div class="d-flex justify-content-end">
						<div id="error_msg" style="height:10px"></div>
						<button type="submit" id="update_action" class="btn btn-primary mr-2" data-dismiss="modal">Submit</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
				</form>        
			</div>
			<?php
		}
	}
}
?> 
<?php 
if(isset($_POST['update_coupon'])){
			$id = $_POST['id'];
			$code = $_POST['code'];
			$code = $_POST['code'];
			$type = $_POST['type'];
			$value = $_POST['value'];
			$min_value = $_POST['min_value'];
			$added = $_POST['added'];
			$expire = $_POST['expire'];

			$sql = "UPDATE `coupon_code` SET `coupon_code`='$code', `coupon_type`='$type', `coupon_value`='$value', `cart_min_value`='$min_value', `added_on`='$added', `expire_on`='$expire' WHERE id ='$id'";
			$result = $conn->query($sql);
		}



 ?>