<?php 
include "../dbconnection.php";
$sql = "SELECT dish.*, category.category FROM dish, category WHERE dish.category_id = category.id order by id";
$result = $conn->query($sql);
if($result->num_rows > 0){
	?>
	<table class="table table-striped mt-3 text-center"> 	
		<thead>
			<tr>
				<th>Sno</th>
				<th>Category</th>
				<th>Dish</th>			
				<th>Details</th>
				<th>Image</th>
				<th>Added</th>
				<th>Action</th>
			</tr>
		</thead>
		<?php while($row = $result->fetch_assoc()){  ?>		
			<tbody>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['category']; ?></td>
					<td><?php echo $row['dish']; ?></td>
					<td  height = "auto" width="400px"><?php echo $row['dish_details']; ?></td>
					<td><img src=".<?php echo $row['image']; ?>"  height = "40px" width="80px"></td>
					<td><?php echo $row['added_on']; ?></td>
					<td><button class="btn btn-primary" id="update_dish"  data-id = "<?php echo $row['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>			
						<button class="btn btn-danger mx-2" id="delete_dish"  data-id = "<?php echo $row['id']; ?>"><i class="fa fa-trash " aria-hidden="true"></i></button>
						<?php if($row['status'] == 1) {?>			
							<button type ="submit" class=" btn btn-success" id="dish_status" data-id = "<?php echo $row['id']; ?>" value="active"><i class="fa fa-check-circle" aria-hidden="true"></i></button>
						<?php }else{ ?>
							<button class=" btn btn-danger" id="dish_status" data-id = "<?php echo $row['id']; ?>" value="deactive"><i class="fa fa-times-circle" aria-hidden="true"></i></button> </td>
						<?php } ?>			
					</tr>
				</tbody>
			<?php } } ?>
		</table>
		<?php 
		if(isset($_POST['dish_status'])){ 
			$id = $_POST['id'];
			$type = $_POST['type'];	
			if($type == "active" ){
				$sql = "UPDATE `dish` SET status = '0' WHERE id = '$id'";
				$result = $conn->query($sql);	
			}else if($type == "deactive"){
				$sql1 = "UPDATE `dish` SET status = '1' WHERE id = '$id'";
				$result1 = $conn->query($sql1);
			}
		}
		if(isset($_POST['dish_category'])){
		$sql1 = "SELECT * FROM `category`";
		$result1 = $conn->query($sql1);
		$output = "";
		while($row = $result1->fetch_assoc()){
			$output.="<option value='{$row['id']}'>{$row['category']}</option>";

		}
		echo $output;
		}

		

		
     if(isset($_POST['delete_dish'])){
			$deleteid = $_POST['deleteid'];
			$sql = "DELETE FROM `dish` WHERE id = '$deleteid'";
			$result = $conn->query($sql);
		}




		 ?>