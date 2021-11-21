<?php 
include "../dbconnection.php"; 
session_start();
 ?>
<div class="container mt-100">
  <div class="d-flex justify-content-center" >
    <div class="card" style="width:600px">    
      <div class="card-body text-center box_shadow pt-50 pb-50">
        <h4 class="card-title font-weight-bold">Profile</h4>  
        <?php 
         $sql = "SELECT * FROM `user` WHERE id = '".$_SESSION['user_id']."'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
         ?>  
       
        <h6>Name: <?php echo $row['name']; ?></h6>
        <h6>E-mail: <?php echo $row['email']; ?></h6>
        <h6>Phone Number: <?php echo $row['mobile']; ?></h6>
        <div class="d-flex justify-content-between mx-5 mt-4">          
          <a href="#" class="text-success" onclick="update_profile()" >Edit Profile</a>
          <a href="#" class="text-danger" data-id="<?php echo $row['id']; ?>" onclick="change_password()">Change Password</a>
        <?php } ?>
        
        </div>
        
      </div>
    </div>
  </div>
</div>
  <!-- <script src="assets/js/user.js"></script> -->