<?php 
session_start();
include "../dbconnection.php"; 
if(isset($_POST['add_cart'])){
	$qty = $_POST['qty'];
	$attr = $_POST['attr'];
	if(isset($_SESSION['username'])){
		$id = $_SESSION['user_id'];		
		$select_sql = "SELECT * FROM `dish_cart` WHERE user_id='$id' AND dish_detail_id='$attr'";
		$result = $conn->query($select_sql);
		if($result->num_rows >0){
			$row = $result->fetch_assoc();
			$cart_id = $row["id"];
			$update_sql = "UPDATE `dish_cart` SET `dish_detail_id`='$attr',`qty`='$qty' WHERE id='$cart_id'";
			$update_result=$conn->query($update_sql);
		}
		else{
			$added_on = date('Y-m-d');
			$insert_sql ="INSERT INTO `dish_cart`(`user_id`, `dish_detail_id`, `qty`, `added-on`) VALUES ('$id', '$attr', '$qty', '$added_on')";
			$insert_result =$conn->query($insert_sql);			
		}
	}
}

?>