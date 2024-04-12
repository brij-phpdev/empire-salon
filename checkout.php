<?php
include_once './includes/header.php';
include_once './includes/database.php';

//$_lastUrl='';
//print_r($_SERVER);
//echo $_lastUrl='';
//die;
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
$packagetable_sql = "SELECT * FROM `service_cat_table` WHERE id NOT IN (1,2,43) ORDER BY id DESC"; //WHERE id=3

if ($packagetable_res = @mysqli_query($link, $packagetable_sql)) {

    if (@mysqli_num_rows($packagetable_res) > 0) {
        while ($packagetable_row = @mysqli_fetch_assoc($packagetable_res)) {
            $package_array[$packagetable_row['id']] = $packagetable_row['cName'];
        }
    }
}
$last_visit = $_SERVER['HTTP_REFERER'] ?? '';
?>


<!--<section id="gallery" class="gallery_section bg-grey bd-bottom padding">

</section>-->
<!--<section class="service_section pricing_section bg-grey padding">-->
<section id="gallery" class="gallery_section bg-grey bd-bottom padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2>Book our Services</h2>

        </div>





        <div id="step-1" >



            <div class="contact-form">

                <?php if (isset($_GET['msg'])): ?>
                    <div class="row">
                        <div class="col-12 mb-20">
                            <div class="padding-10 bg-grey text-<?php echo isset($_GET['type']) ? $_GET['type'] : 'success' ?>">
                                <script type="text/javascript">
                                    alert("<?php echo isset($_GET['msg']) ? $_GET['msg'] : '' ?>");
                                </script>
                                <?php echo isset($_GET['msg']) ? $_GET['msg'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                <?php endif; ?>

                <form name="bookForm" id="ajax_form_1" class="form-horizontal" method="post" action="booking_post.php">



                    <?php
//                    if (isset($_GET['packageId']) && isset($_GET['packageName'])) {
                        ?>

                        <div class="price_wrap">
                            <!--<h3 class="s2">Selected Package/Services</h3>-->
<!--                            <div class="text-success bg-grey padding-10"><?php echo $_GET['packageName'] ?></div>-->
                            
                            
                           <div id="shopping-cart">
    <div class="txt-heading">Shopping Cart</div>

    <!--<a id="btnEmpty" href="index.php?action=empty">Empty Cart</a>-->
    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
        ?>	
        <div class="table-responsive">
            <table class="table-bordered table table-striped tbl-cart" cellpadding="10" cellspacing="1">
                <thead>
                    <tr>
                        <th style="text-align:left;">Serial #</th>
                        <th style="text-align:left;">Service</th>
                        <!--<th style="text-align:left;">Code</th>-->
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:right;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
                    </tr>	
                </thead>

                <tbody>

                    <?php
                    $i = 0;
//                    print_r($_SESSION["cart_item"]);
                    foreach ($_SESSION["cart_item"] as $item) {
                        $i++;
                        $quantity = isset($item["quantity"]) ? $item["quantity"] : 1;
                        $item_price = $quantity * $item["price"];
                        if (isset($item['member_price'])) {
                            // offer price
                            $item_price = $quantity * $item["member_price"];
                        }
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <?php
                                if (!empty($item['offer_img_front'])) {
                                    $file_path = SITE_BOOK_URL . 'application/uploads/package-offers/' . $item['offer_img_front'];
                                    if (is_file($file_path)):
                                        ?>
                                        <img src="<?php echo $file_path; ?>" class="thumbnail" />
                                    <?php endif;
                                }
                                ?>
                                <?php echo $item["title"]; ?></td>
                            <!--<td><?php echo $item["code"]; ?></td>-->
                            <td class="align-right"><?php echo $quantity; // fixing it to one $qty;  ?></td>
                            <td class="align-right"><?php echo CURRENCY . " " . $item_price; ?></td>
                            <td class="align-right"><?php echo CURRENCY . " " . number_format($item_price, 2); ?></td>
                            <td class="align-center">
                                <label data-pid="<?php echo base64_encode($item['id']) ?>" data-mid="<?php echo $item_price ?>" class="default_btn remove-service">Remove</label>
<!--                                <a href="cart.php?action=remove&code=<?php echo base64_encode($item["id"]); ?>" class="remove-service btn btn-danger">Remove</a>-->
                                <input type="hidden" name="serviceId[]" value="<?php echo base64_encode($item["id"]); ?>" />
                            </td>
                        </tr>
                        <?php
                        $total_quantity += $quantity;
                        $total_price += ($item_price * $quantity);
                    }
                    ?>

                <tfoot>
                    <tr>
                        <th colspan="2" class="align-left">Total:</th>
                        <th class="align-right"><?php echo $total_quantity; ?></th>
                        <th class="align-right" colspan="2"><strong><?php echo CURRENCY . " " . number_format($total_price, 2); ?></strong></th>
                        <td></td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
            <?php
                        // price logic
                        $amt = $total_price;
                        $price_to_pay = 5000;
                        if ($amt < 10000) {
                            // less than 10,000
                            $price_to_pay = ceil(($amt * 25 ) / 100);
                        }
                        if ($amt < 5000) {
                            $price_to_pay = $amt;
                        }
//                                $price_to_pay = $package_price;
//                                echo $price_to_pay;
                        ?>
            <table class="table-bordered table table-striped tbl-cart" cellpadding="10" cellspacing="1">
                <tr><td><small>Please pay a token amount to <i><u>secure your slot</u></i>: </small></td><td class="align-right"><?php echo CURRENCY . " " . number_format($price_to_pay, 2); ?></td></tr>
            </table>
            <input type="hidden" name="serviceId[]" value="<?php echo $_GET['packageId'] ?>" />
            <input type="hidden" name="rnId" value="<?php echo base64_encode($price_to_pay) ?>" />
            <?php if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])): ?>
            <input type="hidden" name="packageName" value="<?php echo $_SESSION['cart_item'][0]['title'] ?>" />
            <?php endif; ?>
        </div>
        <?php
    } else {
        ?>
    <div class="flex-wrap text-warning no-records">Your Cart is Empty. Checkout our running offers </div><a href="offer-packages.php" class="btn btn-success text-white">Click here</a>
        <?php
    }
    ?>
</div>
                            
                           

                    <div class="spacer-single"></div>

                    <hr class="padding-10" width="100%">
                    <div class="mt-10 form-group row">
                        <!--<legend >Preferred time</legend>-->
                        <div class="col-lg-6">
                            <h3 class="s2">Preferred Date</h3>
                            <input type="date" name="date" id="date" class="form-control" min="<?php echo date('Y-m-d') ?>" required />
                            <div class="spacer-single"></div>
                        </div>

                        <div class="col-lg-6">
                            <h3 class="s2">Select Time</h3>

                            <div class="custom_radio">
                                <div class="row">
                                    <div class="col-6">
                                        <!--                                    <div class="radio-opt">
                                                                                <input type="radio" id="choose_8AM" value="8:00 AM" name="select_time" checked><label for="choose_8AM">8:00 AM</label>
                                                                            </div>
                                                                            <div class="radio-opt">
                                                                                <input type="radio" id="choose_9AM" value="9:00 AM" name="select_time"><label for="choose_9AM">9:00 AM</label>
                                                                            </div>
                                                                            <div class="radio-opt">
                                                                                <input type="radio" id="choose_10AM" value="10:00 AM" name="select_time"><label for="choose_10AM">10:00 AM</label>
                                                                            </div>-->
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

                                        <div class="radio-opt">
                                            <input type="radio" id="choose_3PM" value="2:00 PM" name="select_time"><label for="choose_3PM">2:00 PM</label>
                                        </div>
                                        <div class="radio-opt">
                                            <input type="radio" id="choose_4PM" value="3:00 PM" name="select_time"><label for="choose_4PM">3:00 PM</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
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
                            <input id="adultsVal" class="form-control" type="number" value="1" min="1" step="1" name="serviceAdult" >
                        </div>
                        <div class="col-md-6">
                            <label for="childVal">Childrens</label>
                            <input id="childVal" class="form-control" type="number" value="0" min="0" step="1" name="serviceChildren" >
                        </div>
                    </div>
                    <div class="form-group row" >
                        <div class="col-md-12">
                            <!--<label for="adultsVal">Apply Coupon</label>-->
                            <a id="getCoupons" class="default_btn" style="cursor: pointer; color: #fff;">Find Coupons</a>
                            <div id="coupons_applied" class=""></div>
                            <div id="coupons_data" class="table-responsive"></div>
                        </div>

                    </div>

                    <h3 class="s2">Your details</h3>

                    <div class="form-group row">

                        <div class="col-lg-6">
                            <div id='phone_error' class='error'>Please enter your phone number.</div>
                            <div class="mb25">
                                <input type='number' name='phone' id='phone' class="form-control" placeholder="Your Phone" required>
                            </div>



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
                                    <a id="verify-otp-fastsms" class="default_btn" value="Verify OTP">Verify OTP</a>
                                </div>
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

                            <div id="test-popup" class="login_popup white-popup mfp-hide " style="display: none;">
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
                                                            <a id="verify-otp-fastsms" class="default_btn" value="Verify OTP">Verify OTP</a>
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
<!--                            <p><small>Please pay a token amount to secure your slot: </small>₹ <?php echo $price_to_pay ?>.00/-</p>-->
                            <p id='submit' class="mt20">
                                <input type='submit' id='send_message' value='Book & Pay' class="default_btn">
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
