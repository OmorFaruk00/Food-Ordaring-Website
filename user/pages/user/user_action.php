<?php 
session_start();
include "../dbconnection.php";
if(isset($_POST["cencel_order"])){
	$sql = "DELETE FROM `order_dish` WHERE  user_id = '".$_SESSION['user_id']."' AND status = 0";
	$result = $conn->query($sql);

}
if(isset($_POST["update"])){
	$name = $_POST["user_name"];
	$mobile = $_POST["user_mobile"];
	$id = $_POST["user_id"];	
	$sql = "UPDATE `user` SET `name`='$name',`mobile`='$mobile' WHERE  id = '$id'";	
	$result = $conn->query($sql);	

}
if(isset($_POST['change_password'])) {
	$old = $_POST['old'];
	$new = $_POST['new'];
	$newpass = password_hash($new, PASSWORD_BCRYPT);
	$sql1 = "SELECT * FROM `user` WHERE id = '".$_SESSION['user_id']."'";
	$result = $conn->query($sql1);
	$row =$result->fetch_assoc();
	$oldpassword = $row['password'];
	$oldpass_decode = password_verify($old, $oldpassword);
	if($oldpass_decode == 1 ){		
		$sql="UPDATE `user` SET `password`='$newpass' WHERE id = '".$_SESSION['user_id']."'";
		$result1 = $conn->query($sql);           
		echo "success";
	}	
}

?>




