<?php
include_once './includes/header.php';
include_once './includes/database.php';
?>
<section class="page_header d-flex align-items-center">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>The Empire Salon</h3>
            <h2>Make an appointment</h2>
            
        </div>
    </div>
</section><!--/. page_header -->

<?php
$package_array = array();
$packagetable_sql = "SELECT * FROM `service_cat_table` WHERE id=3 ORDER BY id DESC";

if ($packagetable_res = @mysqli_query($link, $packagetable_sql)) {

    if (@mysqli_num_rows($packagetable_res) > 0) {
        while ($packagetable_row = @mysqli_fetch_assoc($packagetable_res)) {
            $package_array[] = $packagetable_row;
        }
    }
}
$last_visit = $_SERVER['HTTP_REFERER'] ?? '';
?>

<section class="service_section pricing_section bg-grey padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2>Book our Services</h2>
            
        </div>


        <div id="step-1" >



            <div class="contact-form">
                <form name="bookForm" id="ajax_form" class="form-horizontal" method="post" action="booking_post.php">

                    <?php 
                    if(isset($_GET['packageId']) && isset($_GET['packageName'])){
                        ?>
                    
                    <div class="price_wrap">
                        <h3 class="s2">Choosen Package/Services</h3>
                        <div class="text-success bg-grey padding-10"><?php echo $_GET['packageName'] ?></div>
                        <input type="hidden" name="serviceId[]" value="<?php echo $_GET['packageId'] ?>" />
                    <br>
                    </div>
                    <?php
                    }else{
                     ?>
                    <div class="price_wrap_">
                    <h3 class="s2">Choose Services</h3>
                    <div class="row">
            <?php if(!empty($package_array)): 

                foreach($package_array as $package):

                $package_services = array();

                if(!empty($package)):

                    $package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `category_id`=".$package['id'];
//                    echo $package_service_table_sql;
                    if ($package_servicetable_res = @mysqli_query($link, $package_service_table_sql)) {

                        if (@mysqli_num_rows($package_servicetable_res) > 0) {
                            while ($package_servicetable_row = @mysqli_fetch_assoc($package_servicetable_res)) {
                                $package_services[] = $package_servicetable_row;
                            }
                        }
                    }
                    endif;
                ?>
            
            <div class="col-lg-6 col-md-6 sm-padding">
                <div class="price_wrap">
                    <h3><?php echo $package['cName'] ?></h3>
                    <ul class="price_list">
                        <?php 
                        foreach($package_services as $package_service):
                            
                        ?>
                        <li>
                            <h4><?php echo strtoupper($package_service['title']) ?></h4>
                            <p>
                                <?php echo html_entity_decode($package_service['description']) ?>
                            </p>
                            <span class="price">₹ <?php echo $package_service['price'] ?>/-</span>
                        </li>
                        <li>
                            <div class="radio-img">
                                <input class="d-none" id="radio-1a-<?php echo $package_service['id'] ?>" name="serviceId[]" type="checkbox" value="<?php echo base64_encode($package_service['id']) ?>">
                                <label style="" for="radio-1a-<?php echo $package_service['id'] ?>" class="default_btn book-service">Book Service</label>
                            </div>
                        </li>
                        <?php 
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <?php 
            endforeach;
            endif; ?>
            
            
<!--            <div class="col-lg-4 col-md-12 sm-padding">
                <div class="price_wrap">
                    <h3>Face Masking</h3>
                    <ul class="price_list">
                        <li>
                            <h4>White Facial</h4>
                            <p>Barber is a person whose occupation is mainly to cut dress groom style and shave men.</p>
                            <span class="price">$8</span>
                        </li>
                        <li>
                            <h4>Face Cleaning</h4>
                            <p>Barber is a person whose occupation is mainly to cut dress groom style and shave men.</p>
                            <span class="price">$9</span>
                        </li>
                        <li>
                            <h4>Bright Tuning</h4>
                            <p>Barber is a person whose occupation is mainly to cut dress groom style and shave men.</p>
                            <span class="price">$10</span>
                        </li>
                    </ul>
                </div> 
            </div>-->
        </div>
                    </div>
                    <?php } ?>
                    
                    <div class="spacer-single"></div>

                    <!-- step 2 -->

                    <!--<div class="row" >-->
                    <!--                                        <div class="col-lg-6 ">
                                                                <h3 class="s2">Choose Staff</h3>
                    
                                                                <div class="de_form de_radio">
                                                                    <div class="radio-img">
                                                                        <input id="radio-1a" name="Staff" type="radio" value="Steven" checked="checked">
                                                                        <label for="radio-1a"><img src="images/team/1.jpg" alt="">Steven</label>
                                                                    </div>
                    
                                                                    <div class="radio-img">
                                                                        <input id="radio-1b" name="Staff" type="radio" value="Huey">
                                                                        <label for="radio-1b"><img src="images/team/2.jpg" alt="">Huey</label>
                                                                    </div>
                    
                                                                    <div class="radio-img">
                                                                        <input id="radio-1c" name="Staff" type="radio" value="Harry">
                                                                        <label for="radio-1c"><img src="images/team/3.jpg" alt="">Harry</label>
                                                                    </div>
                    
                                                                    <div class="radio-img">
                                                                        <input id="radio-1d" name="Staff" type="radio" value="Axe">
                                                                        <label for="radio-1d"><img src="images/team/4.jpg" alt="">Axe</label>
                                                                    </div>
                                                                </div>
                                                            </div>-->

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <h3 class="s2">Select Date</h3>
                            <input type="date" name="date" id="date" class="form-control" min="<?php echo date('Y-m-d') ?>" required />
                            <div class="spacer-single"></div>
                        </div>

                        <div class="col-lg-6">
                            <h3 class="s2">Select Time</h3>

                            <div class="custom_radio">
                                <div class="row">
                                    <div class="col-6">
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_8AM" value="8:00 AM" name="select_time" checked><label for="choose_8AM">8:00 AM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_9AM" value="9:00 AM" name="select_time"><label for="choose_9AM">9:00 AM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_10AM" value="10:00 AM" name="select_time"><label for="choose_10AM">10:00 AM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_11AM" value="11:00 AM" name="select_time"><label for="choose_11AM">11:00 AM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_12AM" value="12:00 AM" name="select_time"><label for="choose_12AM">12:00 AM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_1PM" value="1:00 PM" name="select_time"><label for="choose_1PM">1:00 PM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_2PM" value="2:00 PM" name="select_time"><label for="choose_2PM">2:00 PM</label>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_3PM" value="2:00 PM" name="select_time"><label for="choose_3PM">2:00 PM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_4PM" value="3:00 PM" name="select_time"><label for="choose_4PM">3:00 PM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_5PM" value="4:00 PM" name="select_time"><label for="choose_5PM">4:00 PM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_6PM" value="5:00 PM" name="select_time"><label for="choose_6PM">5:00 PM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_7PM" value="6:00 PM" name="select_time"><label for="choose_7PM">6:00 PM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_8PM" value="7:00 PM" name="select_time"><label for="choose_8PM">7:00 PM</label>
                                    </div>
                                    <div class="radio-opt">
                                        <input type="radio" id="choose_9PM" value="8:00 PM" name="select_time"><label for="choose_9PM">8:00 PM</label>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--</div>-->

                    <div class="spacer-single"></div>

                    <div class="form-group row">
                            <div class="col-md-6">
                                <label for="adultsVal">Adults</label>
                                <input id="adultsVal" class="form-control" type="number" value="0" min="1" step="1" name="serviceAdult" >
                            </div>
                            <div class="col-md-6">
                                    <label for="childVal">Childrens</label>
                                    <input id="childVal" class="form-control" type="number" value="0" min="0" step="1" name="serviceChildren" >
                            </div>
                        </div>
                    <div class="form-group row">
                            <div class="col-md-12">
                                <!--<label for="adultsVal">Apply Coupon</label>-->
                                <a id="getCoupons" class="default_btn">Find Coupons</a>
                                <div id="coupons_applied" class=""></div>
                                <div id="coupons_data" class="table-responsive"></div>
                            </div>
                            
                        </div>

                    <h3 class="s2">Your details</h3>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <div id='phone_error' class='error'>Please enter your phone number.</div>
                            <div class="mb25">
                                <input type='text' name='phone' id='phone' class="form-control" placeholder="Your Phone" required>
                            </div>
                            <div id='name_error' class='error'>Please enter your name.</div>
                            <div class="mb25">
                                <input type='text' name='name' id='name' class="form-control" placeholder="Your Name" required>
                            </div>

                            <div id='email_error' class='error'>Please enter your valid E-mail ID.</div>
                            <div class="mb25">
                                <input type='email' name='email' id='email' class="form-control" placeholder="Your Email" required>
                            </div>

                            
                        </div>
                        <div class="col-lg-6">
                            <div id='message_error' class='error'>Please enter your message.</div>
                            <div>
                                <textarea name='message' id='message' class="form-control" placeholder="Your Message"></textarea>
                            </div>
                            <div class="d-none">
                                    <input name="last_visit" id="last_visit" type="hidden" value="<?php echo base64_encode($last_visit) ?>" />
                                    <input name="is_email_verified" id="is_email_verified" type="hidden" value="0" />
                                    <input name="is_mobile_verified" id="is_mobile_verified" type="hidden" value="0" />
                                    <input name="unique_id" id="unique_id" type="hidden" value="0" />
                                    <input name="couponId" id="couponId" type="hidden" value="0" />
                                </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="form-group row">
                                    <!--SMS implementation start--> 
    
    
    <div class="html-code overlay">

        <div id="test-popup" class="login_popup_ white-popup mfp-hide " style="display: none;">
   <div id="sms-popup"  >

            <div class='waitSpinner'> </div>
            <p style="display: block;" class="fancy_msg  alert">

            </p>
            <div id="mobile_otp_error" class="error"></div>
            <div class="row">
            <div class="col-md-12 col-md-offset-4">
            <div id="popuplogincontainer" >
                <div class="white-popup" id="divsendmobileotp">

                    <h3>Enter your mobile to get OTP</h3>
                    <!--<p id="plsreghere"class="title_block">No account yet ? Please enter your mobile here!</p><br />-->

                    <div class="form-group row">
                        <!--<label for="mobile_otp" class="col-sm-4 hidden control-label" id="mobile_otp" >Mobile Number : </label>-->
                        <div class="col-sm-12">
                            <input type="text" class="mobile_otp_input form-control" value="" placeholder="Mobile Number" name="mobile_otp" id="mobile_otp">
                            <div class="success-mobile-update"></div>
                            <div class="error-mobile-update"></div>
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
                            <button id="verify-otp-fastsms" class="button btn btn-success" value="Verify OTP">Verify OTP</button>
                        </div>
                    </div>    

                </div><br />
                <div class="clearfix"></div>

            </div>                
            </div>                
            </div>  
            <span class="align-bottom align-right btn-danger" id="close_sms_popup">x</span>
        <div class="clearfix"></div>
    </div>
</div>
        
   
    </div>
    
    <!--SMS implementation close-->

                
                    </div>
                    <div class="form-group row">
                        <div id="form-messages" class="alert" role="alert"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                                <!--<div class="g-recaptcha" data-sitekey="<?php echo RECAPTCHA_SITE_KEY ?>"></div>-->
                            <p id='submit' class="mt20">
                                <input type='submit' id='send_message' value='Book' class="default_btn">
                            </p>
                        </div>
                    </div>

                    <div id="success_message" class='success'>
                        Your message has been sent successfully. Refresh this page if you want to send more messages.
                    </div>
                    <div id="error_message" class='error'>
                        Sorry there was an error sending your form.
                    </div>
                </form>
            </div>





        </div>






    </div>
</section>


<!-- content close -->
<?php
include_once './includes/footer.php';
?>
