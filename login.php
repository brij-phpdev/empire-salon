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
                   <h3>Login</h3>
                   
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
                                    Login to unlock offers</h2>
                                <div class="de-separator"></div>
                                <p class="lead text-center">
                                    
                                </p>
                                <div class="contact-form">
                                    
                                    <?php if(!empty($_GET)): ?>
                                        <div class="row mb-20">
                                        <div class="col-12 text-<?php echo $_GET['type']?>">
                                            <?php echo htmlentities($_GET['msg']) ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <form method="post" action="checkUser.php">
       

                                    <div class="col-lg-12">
                            <div id='phone_error' class='error'>Please enter your email/phone number.</div>
                            <div class="mb25">
                                <input type='text' name='mobile' id='email_or_phone' class="form-control" placeholder="email/phone number" required>
                            </div>

                                </div>
                                    <div class="col-lg-12">
                            <div id='mypassword_error' class='error'>Please enter your password.</div>
                            <div class="mb25">
                                <input type='password' name='password' id='mypassword' class="form-control" placeholder="enter your password" required>
                            </div>

                                </div>
                                        <div class="row">
                                    <div class="col-lg-6">
                            
                            <div class="mb25">
                                 <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>" />
                                 <input type="hidden" name="action" value="login_attempt" />
                                <input type="submit" class="default_btn" name="login" value="Login">
                            </div>

                                </div>
                                            <div class="col-lg-6" style="float: right;">
                                                <small>Not a registered User? Register Now</small> <a class="mail_call" href="register.php" >Register</a>
                                </div>
                                        </div>
                                <div class="d-deco"></div>
                                </form>
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
