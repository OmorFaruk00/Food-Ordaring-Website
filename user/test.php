<?php if(isset($_COOKIE['cart_count']) > 0){ ?>
 <!-- shopping-cart-area start -->
 <div class="cart-main-area pt-40 pb-100">
    <div class="container">
        <h3 class="page-title">Your cart </h3>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-11 ">
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-11 shadow">
                       <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Until Price</th>
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
                                        <td class="product-name"><a href="#"><?php echo $row['dish']; ?></a></td>
                                        <td class="product-price-cart"><span class="amount"><?php echo $row['price']; ?></span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="2">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" id="subtotal">110.00</td>
                                        <td class="product-remove text-center">                                    
                                            <a href="#"><i class="fa fa-times remove-cart-item"  data-id="<?php echo $row["id"]; ?>"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php        
                            }
                        }
                    } ?>
                </table>

            </div>
            <div class="col-md-12 col-lg-4 col-11 m-sm-auto">
               <div class="grand-totall">
                <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                </div>
                <h5>Total products <span id="total"></span></h5>
                <div class="total-shipping">
                    <h5>Total shipping</h5>
                    <ul>
                        <li><input type="checkbox"> Standard <span>$20.00</span></li>
                        <li><input type="checkbox"> Express <span>$30.00</span></li>
                    </ul>
                </div>
                <h4 class="grand-totall-title">Grand Total  <span>$260.00</span></h4>
                <a href="#">Proceed to Checkout</a>
            </div>

        </div>
    </div>

</div>

</div>
</div>
</div>
</div>
<?php }else{
    echo "<h4>Your Cart Is Empty</h4>";
} ?>
<script src="assets/js/cart.js"></script>