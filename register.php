<?php
include_once './includes/header.php';
include_once './includes/process.php';
include_once './includes/functions.php';
?>


<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <section class="page_header d-flex align-items-center">
        <div class="container">
            <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                <h3>Register</h3>

            </div>
        </div>
    </section><!--/. page_header -->



    <section class=" jarallax">
        <div class="de-gradient-edge-top"></div>

        <div class="container position-relative z1000">
            <div class="row gx-5">

                <div class="col-lg-8 offset-lg-2">

                    <div class="d-sch-table">
                        <!--<h2 class="wow fadeIn text-center">Login</h2>-->
                        <h2 class="wow fadeIn text-center" style="font-size: 22px!important;">
                            Register to unlock offers</h2>
                        <div class="de-separator"></div>
                        <p class="lead text-center">

                        </p>
                        <div class="contact-form">
                            <!--<h2>Register</h2>-->
                            <form class="form-border form-horizontal position-relative z1000" method="post" action="includes/register.php">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" id="phone" name="phone" min="10" max="10" placeholder="Enter Phone Number without 0" required="required">
                                    </div>
                                </div>
                                <div class="form-group row" id="email_cont">
                                    <div class="col-md-12">
                                        <input id="email" class="form-control" type="email" name="email" placeholder="Enter Email" required="required">
                                    </div>
                                </div>
                                <div class="form-group row" id="name_cont">
                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control" name="name" placeholder="Enter Name" required="required">
                                    </div>
                                </div>
                                <div class="form-group row" id="pwd_cont">
                                    <div class="col-md-12">
                                        <input id="pasword" type="password" class="form-control" name="password" required="required" placeholder="Set your password">
                                    </div>
                                </div>
                                <div class="form-group row" id="register_button">
                                    <div class="col-md-12">
                                        <input type="submit" class="default_btn" name="register" value="Register">
                                    </div>
                                </div>
                                <div class="form-group row">
                                
                                <div class="col-sm-12">
                                    <input type="text" class="mobile_otp_input form-control" value="" placeholder="Mobile Number" name="mobile_otp" id="mobile_otp">
                                    <div class="success-mobile-update"></div>
                                    <div class="error-mobile-update"></div>
                                </div>
                            </div>
                                <div class="form-group row" id="login_link" style="display: none;">
                                    <div class="col-sm-12">
                                        <a href="login.php" class="default_btn">Login</a>
                                    </div>
                                </div>
                                <div class="form-group row" id="forgot_link" style="display: none;">
                                    <div class="col-sm-12">
                                        <a href="forgot_password.php" class="default_btn">Forgot Password</a>
                                    </div>
                                </div>
                            <div class="form-group">
                                <p class="sent-otp-fastsms_submit">
                                    <button id="sent-otp-fastsms" class="button btn btn-success" value="Get OTP">Get OTP</button>
                                </p>
                            </div>

                            <div class="mobile_sms_otp">
                                <div class="form-group row">
                                    <!--<label for="mobile_sms" class="col-sm-4 hidden control-label" id="mobile_sms" >Enter OTP: </label>-->
                                    <div class="col-sm-8">
                                        <input type="text" class="mobile_sms_input form-control" placeholder="Enter OTP" value="" name="mobile_sms" id="mobile_sms">                           
                                    </div>
                                </div>
                                <div class="form-group">
                                    <a id="verify-otp-fastsms" class="default_btn" value="Verify OTP">Verify OTP</a>
                                </div>
                            </div>
                                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>" />

                            </form>

                        </div>

                    </div>
                    <div class="d-deco"></div>
                </div>
            </div>
        </div>
</div>
<div class="de-gradient-edge-bottom"></div>
</section>




</div>
<div class="spacer-double padding-15"></div>
<!-- content close -->

<!-- footer begin -->
<?php
include_once './includes/footer.php';
?>
