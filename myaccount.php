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
                   <h3>My Account</h3>
<!--                   <h2>Career at Empire</h2>-->
                   
                </div>
		    </div>
		</section><!--/. page_header -->


    
    <section class=" jarallax">
                <div class="de-gradient-edge-top"></div>
                
                <div class="container position-relative z1000">
                    <div class="row gx-5">

<!--                        <div class="col-lg-4">
                            
                        </div>-->
                        <div class="col-lg-12">

                            
                            <div class="d-sch-table">
                                <!--<h2 class="wow fadeIn text-center">Login</h2>-->
                                <h2 class="wow fadeIn text-center" style="font-size: 22px!important;">Welcome!</h2>
                                <div class="de-separator"></div>
                                <p class="lead text-center">

                                </p>
                                <div class="contact-form row">
                                    
                                <div class="right_user_menu col-lg-4">
                                    <ul class="right_user_nav">
                                    <li class="<?php echo ($_SERVER["REQUEST_URI"]=='/myaccount.php') ? 'active' : '' ?>"><a id="<?php //echo ($_SERVER["REQUEST_URI"]) ?>" class="mail_call" href="myaccount.php">My Account</a></li>
                                    <li><a class="mail_call" href="myorders.php">My Orders</a></li>
                                    <li><a class="mail_call" href="logout.php">Logout</a></li>
                            </ul>
                            </div>
                                    
                                    <div class="account-info  col-lg-8">
                                        <?php
                                        $user_info=$_SESSION['user_info'];
                                        ?>
    <h3>My Account</h3>
    <p><strong>Mobile:</strong> <?php echo htmlspecialchars($user_info['phone']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user_info['email']); ?></p>
    <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user_info['fullName']); ?></p>
</div>

<!-- You can add more account management features here -->
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
