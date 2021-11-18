<?php 
session_start();
include "../dbconnection.php";
$username = mysqli_real_escape_string($conn, $_POST['name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$sql = "SELECT * FROM `user` WHERE `name` = '$username'";
$result=$conn->query($sql);
if($result->num_rows > 0 ){
	while($row = $result->fetch_assoc()){
		$_SESSION['is_login'] = true;
		$_SESSION['user_id'] = $row['id'];  
		$_SESSION['username'] = $row['name'];
		$db_pass = $row['password'];
		if (password_verify($password, $db_pass)) {
			$arr = array('status'=>'success', 'msg'=>'Login Successfull', 'field'=>'login_response','username'=>$row['name']);
			echo json_encode($arr);			
		}
		else{
			$arr = array('status'=>'error', 'msg'=>'<h5 class="text-danger">Username And Password Are Not Match</h5>', 'field'=>'login_response');
			echo json_encode($arr);

		}
	}
}
?>