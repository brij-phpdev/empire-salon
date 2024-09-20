<?php
include_once './includes/header.php';
include_once './includes/process.php';
include_once './includes/functions.php';
?>

<style>
    .sent-otp-fastsms_submit, .mobile_otp_input {
    display: block;
}
</style>
<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <section class="page_header d-flex align-items-center">
        <div class="container">
            <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                <h3>Forgot Password</h3>

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
                            Forgot Password</h2>
                        <div class="de-separator"></div>
                        <p class="lead text-center">

                        </p>
                        <div class="contact-form">
                            
                            <form class="form-border form-horizontal position-relative z1000" method="post" action="#">
                                
                                <div class="form-group row">
                                
                                <div class="col-sm-12">
                                    <input type="text" class="mobile_otp_input form-control" value="" placeholder="Mobile Number" name="mobile_otp" id="mobile_otp">
                                    <div class="success-mobile-update"></div>
                                    <div class="error-mobile-update"></div>
                                </div>
                            </div>
                                
                                    
                            <div class="form-group row">
                                <div class="col-sm-12">
                                <p class="sent-otp-fastsms_submit">
                                    <a id="sent-otp-fastsms" class="default_btn" value="Get OTP">Get OTP</a>
                                </p>
                                </div>
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
