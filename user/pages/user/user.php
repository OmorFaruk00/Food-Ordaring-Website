<?php 
session_start();
$sql = "DELETE FROM `order_dish` WHERE user_id = '".$_SESSION['user_id']."' AND status = '0'";
$result = $conn->query($sql);
echo "ok";


 ?>