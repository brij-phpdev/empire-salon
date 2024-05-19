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
<!--                   <h2>Career at Empire</h2>-->
                   
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
                                <div class="de-separator"></div>
                                <p class="lead text-center">
                                Enter your registered credentials to unlock offers
                                </p>
                                <div class="contact-form">
                                    <form name="jobForm" id="ajax_form" class="form-border form-horizontal position-relative z1000" method="post" action="login_post.php">
                                        <div class="form-group row">
                                    <div class="col-md-12">
                                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone" required>
                                            </div>
                                        </div>
<!--                                    <div class="form-group row">
                                    <div class="col-md-12">
                                                <input type='text' name='name' id='name' class="form-control" placeholder="Your Name" required="">
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                    <div class="col-md-12">
                                                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" required>
                                            </div>
                                        </div>
                                        
                                        
                                   
                                    <!--<div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY ?>"></div>-->
                                    <div id='submit' class="mt-5">
                                        <input type='submit' id='send_message' value='Login' class="default_btn">
                                    </div>
                                    
                                    <input type="hidden" name="ps_str_task" value="<?php echo $ps_str_task ?>" />

                                    <div id="success_message" class='success'>
                                        Job application submitted successfully. Refresh this page if you want to send more messages.
                                    </div>
                                    <div id="error_message" class='error'>
                                        Sorry there was an error sending your form.
                                    </div>
                                    
                                    <div class="form-group row">
                                <div id="form-messages" class="alert" role="alert"></div>
                            </div>
                                    
                                </form>
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
