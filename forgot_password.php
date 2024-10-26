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
                        <div class="contact-form">
                            <p class="lead text-center">
                                <?php if (!empty($_GET)): ?>
                                <div class="row mb-20">
                                    <div class="col-12 text-<?php echo $_GET['type'] ?>">
                                        <?php echo htmlentities($_GET['msg']) ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            </p>

                            <form action="send_reset_link.php" method="POST">
                                <div class="form-group row">

                                    <div class="col-12">
                                        <!--        <label for="email">Enter your email:</label>-->
                                        <input type="email" id="email" class="form-control" placeholder="Enter your email" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <div class="col-sm-12">
                                        <button type="submit" class="default_btn" >Send Reset Link</button>
                                    </div>
                                </div>
                            </form>

                            

                            <div style="display: none;">
                                <h3 class="align-center">OR</h3>
                            <form action="send_otp.php" method="POST">
                                <!--<label for="phone">Enter your phone number:</label>-->
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control" placeholder="Enter your phone number" type="text" id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="submit" class="default_btn" >Send OTP</button>
                                    </div>
                                </div>
                            </form>
                            </div>

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
