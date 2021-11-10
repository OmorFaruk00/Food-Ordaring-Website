<?php 
include "../dbconnection.php";
$name = mysqli_real_escape_string($conn,$_POST['name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
$added = date('Y-m-d');
$type = $_POST['type'];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
if($type == "register"){
	$sql1 ="SELECT * FROM `user` WHERE email = '$email'";
	$result1=$conn->query($sql1);
	if($result1->num_rows > 0 ){
		$arr = array('status'=>'error', 'msg'=>'Email Already Used', 'field'=>'email_error');
		echo json_encode($arr);
	}
	else{
		$sql = "INSERT INTO `user`(`name`, `email`, `password`, `mobile`, `status`,`added_on`) VALUES ('$name', '$email','$hashed_password', '$mobile', '$status', '$added')";
		$result = $conn->query($sql);
		if ($result) {
			$arr = array('status'=>'success', 'msg'=>'Registration Successfull', 'field'=>'response');
			echo json_encode($arr);
		}
	}	
}


?>