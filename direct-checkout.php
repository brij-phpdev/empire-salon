<?php
include_once './includes/header.php';
include_once './includes/database.php';
$static_id = 478;
$package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `id`='".$static_id. "'  ORDER BY `id` DESC";
//$package_service = array();
//                    echo $package_service_table_sql;
                    if ($package_servicetable_res = @mysqli_query($link, $package_service_table_sql)) {

                        if (@mysqli_num_rows($package_servicetable_res) > 0) {
                            while ($package_servicetable_row = @mysqli_fetch_assoc($package_servicetable_res)) {
//                                print_r($package_servicetable_row);die;
                                $package_service = $package_servicetable_row;
                            }
                        }
                    }
//                    print_r($package_service);
                    $price_to_pay = 20;
?>
<section class="page_header d-flex align-items-center">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>The Empire Salon</h3>
            <h2>Exclusive Offers Just for You!</h2>
        </div>
    </div>
</section>


<section id="promo-banner" class="promo_section bg-promo padding text-center">
    <div class="container">
        <h2>Limited Time Offer!</h2>
        <!--<p>Use Promo Code <strong>EMPIRE20</strong> to get 20% off your first appointment.</p>-->
        
        <!-- Promo Image -->
        <div class="about_video">
            <img src="img/promo/bliss-offer.jpeg" alt="Promo Banner" style="max-width: 100%; height: auto;">
        </div>

        <div id="countdown-timer" style="font-size: 20px; margin: 50px 0;"></div>
        <a href="#booking-form" class="default_btn">Book Now</a>
    </div>
</section>


<script>
    // Countdown Timer
    const endTime = new Date().getTime() + (24 * 60 * 60 * 1000); // 24 hours from now
    const timer = setInterval(function () {
        const now = new Date().getTime();
        const distance = endTime - now;
        
        if (distance <= 0) {
            clearInterval(timer);
            document.getElementById('countdown-timer').innerText = 'Offer expired!';
        } else {
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById('countdown-timer').innerText = `${hours}h ${minutes}m ${seconds}s remaining`;
        }
    }, 1000);
</script>

<section id="featured-videos" class="videos_section bg-grey padding">
    <div class="container">
        <div class="section_heading text-center mb-40">
            <h2>Our Featured Services</h2>
            <p>Watch the magic happen!</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <iframe 
                    src="https://www.youtube.com/embed/z7mLHrf91DY" 
                    style="width:100%; height:300px; border:0;" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.instagram.com/reel/ANOTHER_CODE/embed" 
                        style="width:100%; height:300px; border:0;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<section id="google-reviews" class="reviews_section bg-grey padding">
    <div class="container">
        <div class="section_heading text-center mb-40">
            <h2>What Our Customers Say</h2>
            <p>Don't just take our word for it, hear from our happy clients!</p>
        </div>
        <div class="row">
            <?php
            // Replace with your Google My Business API key and place ID
            $api_key = 'YOUR_GOOGLE_API_KEY';
            $place_id = 'YOUR_PLACE_ID';
            $reviews_url = "https://maps.googleapis.com/maps/api/place/details/json?place_id=$place_id&fields=reviews&key=$api_key";

            $reviews_response = file_get_contents($reviews_url);
            $reviews_data = json_decode($reviews_response, true);

            if (!empty($reviews_data['result']['reviews'])) {
                foreach ($reviews_data['result']['reviews'] as $review) {
                    echo '<div class="col-md-4">';
                    echo '<div class="review-box">';
                    echo '<p><strong>' . htmlspecialchars($review['author_name']) . '</strong></p>';
                    echo '<p>' . htmlspecialchars($review['text']) . '</p>';
                    echo '<p>Rating: ' . htmlspecialchars($review['rating']) . ' / 5</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No reviews available at the moment.</p>';
            }
            ?>
        </div>
    </div>
</section>



<!--<section id="first-time-user" class="user_section bg-white padding">
    <div class="container contact-form">
        <h2>Book Your First Appointment</h2>
        <p>Fill in your details to proceed.</p>
        <form method="post" action="save_user.php" id="firstTimeUserForm">
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Your Name" required />
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Your Email" required />
            </div>
            <div class="form-group">
                <input type="tel" name="phone" class="form-control" placeholder="Your Phone" required />
            </div>
            <div class="form-group">
                <input type="submit" class="default_btn" value="Proceed to Booking" />
            </div>
        </form>
    </div>
</section>-->

<section id="booking-form" class="booking_section padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2>Book Your Appointment</h2>
            <p>Fill in your details to proceed.</p>
        </div>
        <div class="obooking-form contact-form">
            <form method="post" action="booking_post.php">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" required />
                </div>
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

                <div class="form-group">
                    <label for="name">Name</label>&nbsp;&nbsp;<span id="name_label"></span>
                    <input type="text" id="name" name="name" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>&nbsp;&nbsp;<span id="email_label"></span>
                    <input type="email" id="email" name="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="date">Preferred Date</label>
                    <input type="date" id="date" name="date" class="form-control" min="<?php echo date('Y-m-d') ?>" required />
                </div>
                <div class="form-group">
                    <label for="time">Preferred Time</label>
                    <select id="time" name="select_time" class="form-control" required>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                        <option value="4:00 PM">4:00 PM</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="default_btn" value="Book & Pay" />
                </div>
                <div class="form-group hidden-md">
                    <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>" />
                    <input type="hidden" name="direct_serviceId" id="serviceId" value="<?php echo $static_id ?>" />
                    <input type="hidden" name="serviceAdult" id="serviceAdult" value="1" />
                    <input type="hidden" name="serviceChildren" id="serviceChildren" value="0" />
                    <input type="hidden" name="packageName" id="packageName" value="<?php echo 'Bridal Package' ?>" />
                    <input type="hidden" name="rnId" value="<?php echo base64_encode(base64_encode($price_to_pay)) ?>" />
                </div>
<!--                <div class="form-group">
                    <button type="submit" class="default_btn">Book & Pay</button>
                </div>-->
            </form>
        </div>
    </div>
</section>

<section id="instagram-feed" class="instagram_section bg-white padding">
    <div class="container">
        <div class="section_heading text-center mb-40">
            <h2>Follow Us on Instagram</h2>
            <p>See our latest updates, offers, and transformations!</p>
        </div>
        <div class="row about_video">
<!--             Embed Instagram posts using iframe or dynamic fetching -->
            <div class="col-12">
                <div class="instagram-widget">
                    <iframe src="https://www.instagram.com/empiresalonofficial/embed" 
                            style="border:0; width:100%; height:500px;" 
                            scrolling="no" 
                            allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>




<?php
include_once './includes/footer.php';
?>
