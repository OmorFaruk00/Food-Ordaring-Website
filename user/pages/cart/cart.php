<?php if(isset($_COOKIE['cart_count']) > 0){ ?>
 <!-- shopping-cart-area start -->
 <div class="cart-main-area pt-40 pb-100">
    <div class="container">
        <h3 class="page-title">Your cart </h3>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-11 ">
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-11 shadow">
                       <table class="table text-center" id="reload_table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Dish Id</th>
                                <th>Dish Name</th>
                                <th> Price</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <?php 
                        include "../dbconnection.php"; 
                        if(isset($_COOKIE['user_cart'])){
                            $pid = json_decode($_COOKIE['user_cart']);
                            if(is_object($pid)){
                                $pid = get_object_vars($pid);
                            }
                            $pids = implode(',',$pid);                        
                            $sql = "SELECT * FROM `dish` WHERE id in($pids)";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0 ){
                                while($row = $result->fetch_assoc()){   ?>
                                 <tbody>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="../admin/.<?php echo $row['image']; ?>" alt="" height="60px" width="80px">
                                        </td>
                                        <td class=""><a href="#"><?php echo $row['id']; ?></a></td>
                                        <td class="product-name"><a href="#"><?php echo $row['dish']; ?></a></td>


                                        <td class="product-price-cart"><span>&#2547;</span> <span class="price" ><?php echo $row['price']; ?></span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box item_qty" type="number" id="qty"  value="1">
                                                <input type="hidden" class="item-price" value="<?php echo $row['price']; ?>"/>
                                                <input type="hidden" class="dish_id id" value="<?php echo $row['id']; ?>"/>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span>&#2547;</span> <span  class="subtotal subtotal<?php echo $row["id"];?>"><?php echo $row['price']; ?></span></td>
                                        <td class="product-remove text-center">                                    
                                            <a href="#"><i class="fa fa-times remove-cart-item"  data-id="<?php echo $row["id"]; ?>" onclick="remove_cart()"></i></a>
                                        </td>
                                    </tr>
                                </tbody>                                
                                <?php        
                            }
                        }
                    } ?>
                </table>
                <button type="submit" class="btn btn-success" onclick="shop()">Continue Shopping</button>                

            </div>
            <div class="col-md-12 col-lg-4 col-11 m-sm-auto">
               <div class="grand-totall">
                <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                </div>
                <h5>Total Amount <span class="total-amount"></span><span class="mr-2">&#2547;</span> </h5>
                <h5>Delivery Charge <span>80</span></h5>
                <hr>
                <h4 class="grand-totall-title">Grand Total  <span>00</span></h4>                
                <div class="form-group">
                    <input type="text" placeholder="Delivery Address"class="form-control mb-2"  id="address" >
                    <label for="" class="font-weight-bold">Expected Delivery Date</label>
                    <input type="date" class="form-control" id="date">                    
                </div>                
                <a href="#" onclick="checkout()">Proceed to Checkout</a>            
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<?php }else{
    echo "<h3 class='text-center mt-3 text-danger font-weight-bold'>Your Cart Is Empty</h3>";
} ?>

<script src="assets/js/cart.js"></script>