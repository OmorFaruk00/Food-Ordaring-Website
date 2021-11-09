<?php 
include "../dbconnection.php"; 


$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$status = $_POST['status'];
$added = date('Y-m-d');
$type = $_POST['type'];
if($type == "register"){
	$sql1 ="SELECT * FROM `user` WHERE email = '$email'";
	$result1=$conn->query($sql1);
	if($result1->num_rows > 0 ){
		$arr = array('status'=>'error', 'msg'=>'Email Already Used', 'field'=>'email_error');
		echo json_encode($arr);
	}
	else{
		$sql = "INSERT INTO `user`(`name`, `email`, `password`, `mobile`, `status`,`added_on`) VALUES ('$name', '$email','$password', '$mobile', '$status', '$added')";
		$result = $conn->query($sql);
		if ($result) {
			$arr = array('status'=>'success', 'msg'=>'Registration Successfully', 'field'=>'response');
			echo json_encode($arr);
		}
	}	
}?>