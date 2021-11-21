<?php 
session_start();
include "../dbconnection.php";
?>
<div class="container mt-5">
	<div class="d-flex justify-content-center">
		<div class="card" style="width:600px">    
			<div class="card-body box_shadow">
				<h4 class="card-title font-weight-bold text-center">Update Profile</h4>  
				<?php       
				$sql = "SELECT * FROM `user` WHERE id = '".$_SESSION['user_id']."'";
				$result = $conn->query($sql);
				while($row = $result->fetch_assoc()){
					?> 
					<div class="d-flex justify-content-center">
						<form action="" style="width:300px;" method="POST">
							<div class="form-group">
								<label for="">Username</label>
								<input type="text" class="form-control" id="name" value="<?php echo $row['name']; ?>">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="text" class="form-control" id="email" value="<?php echo $row['email']; ?>"  readonly>
							</div>
							<div class="form-group">
								<label for="">Mobile</label>
								<input type="text" class="form-control" id="mobile" value="<?php echo $row['mobile']; ?>">
								<input type="hidden" class="form-control" id="id" value="<?php echo $row['id']; ?>">

							</div>
							<div class="d-flex justify-content-end">
								<button type="button"  class="btn btn-primary" onclick="update()">Update</button>
							</div>
						</form>      
					</div>
				<?php } ?>
			</div>
		</div>
	</div>




