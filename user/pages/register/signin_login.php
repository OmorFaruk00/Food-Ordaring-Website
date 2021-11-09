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
                                    <div class="login-register-form">
                                        <form action="#" method="post">
                                            <input type="text" name="user-name" placeholder="Username">
                                            <input type="password" name="user-password" placeholder="Password">
                                            <div class="button-box">
                                                <div class="login-toggle-btn">
                                                    <input type="checkbox">
                                                    <label>Remember me</label>
                                                    <a href="#">Forgot Password?</a>
                                                </div>
                                                <button type="submit"><span>Login</span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div id="lg2" class="tab-pane">                                
                                <div class="login-form-container">                                    
                                    <div class="login-register-form">
                                        <form action="#" method="post" id="register_form">
                                            <div class="text-center text-success mb-3 h4" id="response"></div>
                                            <input type="text" name="name" placeholder="Username">
                                            <input type="password" name="password" placeholder="Password">
                                            <input type="text"  name="email" placeholder="Email">
                                            <div id="email_error" style="margin-bottom: 20px; margin-top: -25px; color: red;"></div>
                                            <input type="number" name="mobile" placeholder="Phone">
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
    
    
    
    
    
    