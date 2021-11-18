<?php session_start(); ?>
<header class="header-area">        
    <div class="header-middle bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12 col-sm-4">
                    <div class="logo">
                        <a href="#" onclick="shop()">
                            <!-- <img alt="" src="assets/img/logo/logo.png"> -->
                            <h4>Food Ordaring</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-12 col-sm-8">
                    <div id="show_top_menu">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom black-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="top-hover"><a href="index.php">home</a></li>                  
                                <li class="mega-menu-position top-hover"><a href="#" onclick="shop()">Shop</a></li>          
                                <li><a href="#" onclick="about()">about-us</a></li>
                                <li><a href="#" onclick="contact()">contact-us</a></li>                                        
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow" id="nav">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#" onclick="shop()"> Shop </a></li>
                                <li><a href="#" onclick="about()">about-us</a></li>
                                <li><a href="contact.php">contact-us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile-menu-area-end -->
</header>
<script src="assets/js/user_menu.js"></script>