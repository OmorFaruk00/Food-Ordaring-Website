<?php 
include "../dbconnection.php";
$category = $_POST['category'];
$dish = $_POST['dish'];
$dish_detailes = $_POST['dish_detailes'];
$status = $_POST['status'];
$added = $_POST['added'];
$price = $_POST['price'];
$filename = $_FILES['file']['name'];
$extansion = pathinfo($filename, PATHINFO_EXTENSION);
$valid_extansion = array("jpg", "jpeg", "png", "gif");
if(in_array($extansion, $valid_extansion)){
	$new_name = rand() . "." . $extansion;
	$path = "../../images/" . $new_name;
	move_uploaded_file($_FILES['file']['tmp_name'], $path);
	$sql = "INSERT INTO `dish`(`category_id`, `dish`, `dish_details`, `image`, `status`, `added_on`,`price`) VALUES ('$category', '$dish', '$dish_detailes','$path', '$status', '$added','$price')";
	$result = $conn->query($sql);	
}
?>