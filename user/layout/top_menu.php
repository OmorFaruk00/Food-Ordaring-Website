<?php session_start(); ?>
<div class="header-middle-right f-right">                                
                        <!-- <div class="header-wishlist">
                            <a href="#">
                                <div class="header-icon-style">
                                    <i class="icon-heart icons"></i>
                                </div>                                        
                            </a>
                        </div> -->
                        <div class="header-cart">
                            <a href="#">
                                <div class="header-icon-style">
                                    <i class="fa fa-cart-plus mx-5" onclick="manage_cart()"></i>
                                    <?php if(isset($_COOKIE['cart_count'])){
                                        echo '<span onclick="manage_cart()">'.$_COOKIE["cart_count"].'</span>';
                                    }else{echo '<span class="count-style">0</span>';} ?>                                     
                                </div>                                        
                            </a>

                        </div>                                
                        <div class="header-login">
                            <a href="#" onclick="signin_login()">
                                <div class="header-icon-style">                                   
                                    <i class="fa fa-user mr-3"></i>
                                    <div class="account-curr-lang-wrap f-right" id="user_account">
                                        <?php
                                        if (isset($_SESSION['username'])) {                                            
                                            echo '<ul><li class="top-hover"><a href="#" class="text-danger text-capitalize">Hi '.$_SESSION['username'].'<i class="ion-chevron-down text-danger"></i></a><ul><li><a href="#" onclick="profile()">Profile</a></li><li><a href="#" onclick="my_order()">My Order</a></li><li><a href="#" onclick="logout()">Logout</a></li></ul>';
                                        }
                                        ?>
                                    </div>
                                </div>                                        
                            </a>
                        </div>
                    </div>
                    <script src="assets/js/user.js"></script>
                    