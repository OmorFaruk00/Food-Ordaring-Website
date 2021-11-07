<?php 
include "../dbconnection.php";
$category = $_POST['category'];
$dish = $_POST['dish'];
$dish_detailes = $_POST['dish_detailes'];
$status = $_POST['status'];
$added = $_POST['added'];
$filename = $_FILES['file']['name'];
$extansion = pathinfo($filename, PATHINFO_EXTENSION);
$valid_extansion = array("jpg", "jpeg", "png", "gif");
if(in_array($extansion, $valid_extansion)){
	$new_name = rand() . "." . $extansion;
	$path = "../../images/" . $new_name;
	move_uploaded_file($_FILES['file']['tmp_name'], $path);
	$sql = "INSERT INTO `dish`(`category_id`, `dish`, `dish_details`, `image`, `status`, `added_on`) VALUES ('$category', '$dish', '$dish_detailes','$path', '$status', '$added')";
	$result = $conn->query($sql);
	$did = $conn->insert_id;
	$attributeArr = $_POST['attribute'];
	$priceArr = $_POST['price'];
	foreach ($attributeArr as $key => $value) {
		$attribute = $value;
		$price = $priceArr[$key];
		$sql1 = "INSERT INTO `dish detailes`(`dish_id`,`attribute`, `price`, `added_on`, `status`) VALUES ('$did', '$attribute','$price','$added','$status')";
		$result1 = $conn->query($sql1);		
	}	
}
?>