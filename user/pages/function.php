<?php 
function manage_user_cart($uid, $qty, $attr){
     global $conn;			
		$select_sql = "SELECT * FROM `dish_cart` WHERE user_id='$uid' AND dish_detail_id='$attr'";
		$result = $conn->query($select_sql);
		if($result->num_rows >0){
			$row = $result->fetch_assoc();
			$cart_id = $row["id"];
			$update_sql = "UPDATE `dish_cart` SET `dish_detail_id`='$attr',`qty`='$qty' WHERE id='$cart_id'";
			$update_result=$conn->query($update_sql);
		}
		else{
			$added_on = date('Y-m-d');
			$insert_sql ="INSERT INTO `dish_cart`(`user_id`, `dish_detail_id`, `qty`, `added-on`) VALUES ('$uid', '$attr', '$qty', '$added_on')";
			$insert_result =$conn->query($insert_sql);			
		}
}




 ?>