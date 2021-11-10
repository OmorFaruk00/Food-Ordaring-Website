       <div class="login-register-area pt-95 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav">
                            <a class="active" data-toggle="tab" href="#lg1">
                                <h4> login </h4>
                            </a>
                            <a data-toggle="tab" href="#lg2">
                                <h4> register </h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane active">
                                <div class="login-form-container">
                                    <div class="text-center text-success h4" id="login_response" style="height: 10px; margin-bottom: 60px;"></div>
                                    <div class="login-register-form">
                                        <form action="#" id="login_form" method="post">
                                            <input type="text" name="user-name" id="user_name" placeholder="Username">
                                            <div id="username_error" style=" height: 10px; margin-bottom: 20px; margin-top: -25px; color: red;"></div>
                                            <input type="password" name="user-password" id="user_password" placeholder="Password">
                                            <div id="userpassword_error" style=" height: 10px; margin-bottom: 20px; margin-top: -25px; color: red;"></div>
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <button type="button" id="user_login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">                                
                                <div class="login-form-container">
                                 <div class="text-center text-success h4" id="response" style="height: 10px; margin-bottom: 60px;"></div>                                    
                                    <div class="login-register-form">
                                        <form action="#" method="post" id="register_form">                                          
                                            <input type="text" name="name" id="name" placeholder="Username" required>
                                            <div id="name_error" style=" height: 10px; margin-bottom: 20px; margin-top: -25px; color: red;"></div>
                                            <input type="password" name="password" id="password" placeholder="Password">
                                            <div id="password_error" style=" height: 10px; margin-bottom: 20px; margin-top: -25px; color: red;"></div>
                                            <input type="text" name="email" id="email" placeholder="Email">
                                            <div id="email_error" style=" height: 10px; margin-bottom: 20px; margin-top: -25px; color: red;"></div>
                                            <input type="number" name="mobile" id="mobile" placeholder="Phone">
                                            <div id="mobile_error" style=" height: 10px; margin-bottom: 20px; margin-top: -25px; color: red;"></div>
                                            <input type="hidden" name="status"  value="1">
                                            <input type="hidden"name="type" value="register">
                                            <div class="button-box">
                                                <button type="button" id="register_btn">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../layout/footer.php'?>
    <script src="assets/js/register.js"></script>
    
    
    
    
    
    