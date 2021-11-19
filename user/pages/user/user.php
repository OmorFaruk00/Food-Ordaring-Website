<?php 
session_start();
include "../dbconnection.php"; 
if(isset($_POST["cencel_order"])){
	$sql = "DELETE FROM `order_dish` WHERE  user_id = '".$_SESSION['user_id']."' AND status = 0";
	$result = $conn->query($sql);

}



?>