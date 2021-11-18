<?php
session_start();
// session_destroy();
include "../dbconnection.php"; 
if(isset($_POST['addCart'])){
    $p_id = $_POST['addCart'];
    
    if(isset($_COOKIE['user_cart'])){
        $user_cart = json_decode($_COOKIE['user_cart']);
    }else{
        $user_cart = [];
    }
    if(!in_array($p_id,$user_cart)){
        array_push($user_cart,$p_id);
    }
    
    $cart_count = count($user_cart);
    $u_cart = json_encode($user_cart);

    if(setcookie('user_cart',$u_cart,time() + (1000),'/','','',TRUE)){
        setcookie('cart_count',$cart_count,time() + (1000),'/','','',TRUE);
        echo 'cookie set successfully';
    }else{
        echo 'false';
    }
}

// remove products from cart
if(isset($_POST['removeCartItem'])){
    $p_id = $_POST['removeCartItem'];
    
    if($_COOKIE['cart_count'] == '1'){
        setcookie('cart_count','',time() - (180),'/','','',TRUE);
        setcookie('user_cart','',time() - (180),'/','','',TRUE);
    }else{
        if(isset($_COOKIE['user_cart'])){
            $user_cart = json_decode($_COOKIE['user_cart']);
            if(is_object($user_cart)){
                $user_cart = get_object_vars($user_cart);
            }
            if (($key = array_search($p_id, $user_cart)) !== false) {
                unset($user_cart[$key]);
            }
        }
        $cart_count = count($user_cart);
        $u_cart = json_encode($user_cart);

        if(setcookie('user_cart',$u_cart,time() + (180),'/','','',TRUE)){
            setcookie('cart_count',$cart_count,time() + (180),'/','','',TRUE);
            echo 'cookie set successfully';
        }else{
            echo 'false';
        }
    }
}
if(isset($_POST['cart_checkout']) && isset($_SESSION['username'])){    
    $id = $_POST["dish_id"];
    $qty = $_POST["dish_qty"];
    $dish_id = implode(',',$id);
    $dish_qty = implode(',',$qty);
    $total_amount = $_POST["total_amount"];
    $order_address = $_POST["order_address"];
    $order_date =date("Y-m-d");
    $delivery_date  = $_POST["delivery_date"];    
    $user_id = $_SESSION['user_id'];
    $username =  $_SESSION['username'];

    echo $sql = "INSERT INTO `order_dish`(`dish_id`, `dish_qty`, `total_amount`, `user_id`, `user_name`, `user_address`, `order_date`, `delivery_date`) VALUES ('$dish_id', '$dish_qty', '$total_amount', '$user_id', '$username', '$order_address', '$order_date', '$delivery_date')";
    $result = $conn->query($sql);
    
     // echo  $order_date .' ' .$dish_qty; 
     // echo $_SESSION['username'];
   
    
}

?>