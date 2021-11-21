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
if (isset($_POST['change_password'])) {
	$id = $_POST['id'];
     echo $id;
}

?>




