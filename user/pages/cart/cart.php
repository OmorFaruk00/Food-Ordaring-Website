<?php 
session_start();
include "../dbconnection.php"; 
include "../function.php"; 
if(isset($_POST['add_cart'])){
	$qty = $_POST['qty'];
	$attr = $_POST['attr'];
	if(isset($_SESSION['username'])){
		$uid = $_SESSION['user_id'];		
		manage_user_cart($uid, $qty, $attr);
	}
	else{
		$_SESSION['cart'][$attr]['qty'] = $qty;

	}
}

?>