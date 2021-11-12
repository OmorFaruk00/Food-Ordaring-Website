<?php 
session_start();
echo '<pre>';
print_r($_SESSION['cart']);

if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
	foreach ($_SESSION['cart'] as $key => $value) {
		echo $key;		 
		echo $value['qty'] ;
		echo "<br>";
	}
}

 ?>