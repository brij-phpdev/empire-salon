<?php
include_once './includes/header.php';
include_once './includes/database.php';

// RUBY BLISS = 29
// EMERALD LIFE = 31
// SAPPHIRE PRADISE = 32

// INSERT INTO `servicetable` (`id`, `service_id`, `service_code`, `category_id`, `sub_category`, `title`, `description`, `offer_img_front`, `offer_img_back`, `search_name`, `price`, `member_price`, `starts_at`, `expires_at`, `servStart`, `servEnd`, `servDuration`, `servSpace`, `image`, `agentIds`, `status`) VALUES (NULL, NULL, NULL, '43', NULL, 'Bride Packages Jan 2025', 'Bride Packages Jan 2025 - RUBY BLISS, EMERALD LIFE, SAPPHIRE PARADISE', 'bride-offers-jn-2025.jpeg', 'bride-offers-jn-2025.jpeg', NULL, '21000', '2100', NULL, NULL, NULL, NULL, NULL, '1', 'bride-offers-jn-2025.jpeg', NULL, 'active');

// Existing logic for processing offer ID
if (isset($_GET['offer_id'])) {
    $hashed_id_from_url = $_GET['offer_id'];
    $salt = AUTH_SALT;
//    $static_id = 478; // 478 = 0032c8c763a7c0bf9477bc43eac16ffb7e43f4fa978c3613243c8d20a86ead1f
    $static_id = 479; // 479 = 22bf4b8f629b3638365a8b06cb116cc25dc5d5689c0b2773a8e3adb04aa2e985
    $expected_hash = generateHashedID($static_id, $salt);
//echo $expected_hash;die;
    if ($hashed_id_from_url === $expected_hash) {
        $package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `id`='".$static_id."' ORDER BY `id` DESC";
        if ($package_servicetable_res = @mysqli_query($link, $package_service_table_sql)) {
            if (@mysqli_num_rows($package_servicetable_res) > 0) {
                while ($package_servicetable_row = @mysqli_fetch_assoc($package_servicetable_res)) {
//                                print_r($package_servicetable_row);die;
                    $package_service = $package_servicetable_row;
                }
            } else {
                header('location: index.php');
            }
        }
        $price_to_pay = 1000;
    } else {
        echo "Invalid Offer ID";
        exit;
    }
} else {
    echo "No Offer ID provided or hack attempt!";
    exit;
}
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
            <img src="img/promo/<?php echo $package_service['image'] ?>" alt="<?php echo $package_service['title'] ?>" style="max-width: 100%; height: auto;">
        </div>

    </div>
</section>
<?php
$package_array = array();
$packagetable_sql = "SELECT * FROM `service_cat_table` WHERE id ='1' "; // fixed on 9th Nov to call only bride gallery

if ($packagetable_res = @mysqli_query($link, $packagetable_sql)) {

    if (@mysqli_num_rows($packagetable_res) > 0) {
        while ($packagetable_row = @mysqli_fetch_assoc($packagetable_res)) {
            $package_array[] = $packagetable_row;
        }
    }
}
?>
<?php if(!empty($package_array)):  ?>
<section class="pricing_section bg-grey bd-bottom padding" id="choose-one">
    <div class="container contact-form" id="">
        <div class="row">
            <!-- Tab Links (Package Service Titles) -->
            <div class="col-12">
                <ul class="nav nav-tabs" id="packageTabs" role="tablist">
                    <?php 
                    $activeClass = 'active'; // Variable to control the active tab class
                    foreach($package_array as $package): 
                        $package_services = array();
                        if (!empty($package)):
                            $package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `category_id`=".$package['id'];
                            if ($package_servicetable_res = @mysqli_query($link, $package_service_table_sql)) {
                                if (@mysqli_num_rows($package_servicetable_res) > 0) {
                                    while ($package_servicetable_row = @mysqli_fetch_assoc($package_servicetable_res)) {
                                        $package_services[] = $package_servicetable_row;
                                    }
                                }
                            }
                        endif;
                    ?>
                        <!-- Loop through each package service -->
                        <?php foreach($package_services as $package_service): ?>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link <?php echo $activeClass; ?>" id="tab-<?php echo $package_service['id']; ?>" data-toggle="tab" href="#content-<?php echo $package_service['id']; ?>" role="tab" aria-controls="content-<?php echo $package_service['id']; ?>" aria-selected="true" data-package-name="<?php echo strtoupper($package_service['title']); ?>" data-service-id="<?php echo $package_service['id']; ?>" data-price="<?php echo $package_service['price']; ?>">
                                    <h4 style="font-weight: bold;"><?php echo strtoupper($package_service['title']); ?></h4>
                                </a>
                            </li>
                        <?php 
                        $activeClass = ''; // Remove active class after the first tab
                        endforeach;
                    endforeach;
                    ?>
                </ul>
            </div>
        </div>

        <!-- Tab Content (Package Details) -->
        <div class="tab-content" id="packageTabsContent">
            <?php 
            $activeClass = 'show active'; // Variable for the first active tab content
            foreach($package_array as $package): 
                $package_services = array();
                if (!empty($package)):
                    $package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `category_id`=".$package['id'];
                    if ($package_servicetable_res = @mysqli_query($link, $package_service_table_sql)) {
                        if (@mysqli_num_rows($package_servicetable_res) > 0) {
                            while ($package_servicetable_row = @mysqli_fetch_assoc($package_servicetable_res)) {
                                $package_services[] = $package_servicetable_row;
                            }
                        }
                    }
                endif;
            ?>

            <!-- Loop through each package service for content -->
            <?php foreach($package_services as $package_service): ?>
                <div class="tab-pane fade <?php echo $activeClass; ?>" id="content-<?php echo $package_service['id']; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $package_service['id']; ?>">
                    <ul class="direct_price_list">
                        <li>
                            <span class="price" style="color: #9e8a78; font-weight: bold;">₹ <?php echo $package_service['price']; ?>/-</span>
                            <p>
                                <?php //var_dump(($package_service['description']));die;
                                echo (html_entity_decode($package_service['description'])); ?>
                            </p>
                            
                        </li>
<!--                        <li>
                            <a href="#" class="default_btn book-now" data-package-name="<?php echo strtoupper($package_service['title']); ?>" data-service-id="<?php echo $package_service['id']; ?>" data-price="<?php echo $package_service['price']; ?>">Book an Appointment</a>
                        </li>
                        <li>
                            <a href="#" class="default_btn buy-now" data-package-name="<?php echo strtoupper($package_service['title']); ?>" data-service-id="<?php echo $package_service['id']; ?>" data-price="<?php echo $package_service['price']; ?>">Buy Now</a>
                        </li>-->
                    </ul>
                </div>
            <?php 
            $activeClass = ''; // Remove active class after the first content
            endforeach;
            endforeach;
            ?>
        </div>
    </div>
    <div id="countdown-timer" style="font-size: 20px; margin: 50px 0;"></div>
        <a href="#booking-form" class="default_btn">Book Now</a>
</section><!-- /. pricing_section -->


<?php endif; ?>
<script>
    // Get the offer_id from the URL query parameters
    const urlParams = new URLSearchParams(window.location.search);
    const offerId = urlParams.get('offer_id');
    
    if (offerId) {
        // If the offer_id is present in the URL, log it or use it as needed
        console.log("Offer ID:", offerId);

        // Check if the start time for this offer is already stored in localStorage
        let startTime = localStorage.getItem(`timerStartTime_${offerId}`);
        
        // If not, set it to the current time and store it for this offer
        if (!startTime) {
            startTime = new Date().getTime();
            localStorage.setItem(`timerStartTime_${offerId}`, startTime);
        }

        // Countdown Timer: 24 hours (86400000 milliseconds) from the start time
        const endTime = parseInt(startTime) + (24 * 60 * 60 * 1000); // 24 hours from the start time
        
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
    } else {
        // If no offer_id is present in the URL, display a message
        document.getElementById('countdown-timer').innerText = 'No offer found.';
    }
</script>






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
        <div class="booking-form contact-form">
            <form method="post" action="booking_post.php">
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" 
                           pattern="^\d{10}$" 
                           placeholder="Enter Phone Number without 0" 
                           required maxlength="10" 
                           oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                </div>
                <!--SMS implementation start--> 


                        
                                    <div class="form-group row">
                                
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
                
<!--                <div class="form-group">
                    <button type="submit" class="default_btn">Book & Pay</button>
                </div>-->
            
            <div class="terms-and-conditions mt-10">
                <br/>
                <br/>
                <h3>Terms and Conditions</h3>
                <ul>
                    <li>In case of cancellation, you will be charged the transaction fees.</li>
                    <li>This form is for appointment confirmation purposes. Booking will be confirmed once our representative contacts you and finalizes the appointment.</li>
                </ul>

                <!-- Token Amount Information Highlighted -->
                <div class="highlight-token-amount">
                    <p><strong>Important:</strong> A token amount of <span class="highlight-amount">₹1000.00</span> is required to confirm your appointment. This amount will be adjusted in the final bill.</p>
                </div>

                <br/>
            </div>

            <div class="form-group">
                    <input type="submit" class="default_btn" value="Secure My Spot" />
                </div>
                <div class="form-group hidden-md">
                    <input type="hidden" name="csrf_token" id="csrf_token" value="<?php echo $_SESSION['csrf_token'] ?>" />
                    <input type="hidden" name="direct_serviceId" id="serviceId" value="<?php echo 29 ?>" />
                    <input type="hidden" name="serviceAdult" id="serviceAdult" value="1" />
                    <input type="hidden" name="serviceChildren" id="serviceChildren" value="0" />
                    <input type="hidden" name="packageName" id="packageName" value="<?php echo 'RUBY BLISS' ?>" />
                    <input type="hidden" name="rnId" value="<?php echo base64_encode(base64_encode($price_to_pay)) ?>" />
                    <input type="hidden" name="reg_user" id="reg_user" value="" />
                </div>
            </form>
        </div>
        
</section>

<section id="featured-videos" class="videos_section bg-grey padding">
    <div class="container">
        <div class="section_heading text-center mb-40">
            <h2>Our Featured Services</h2>
            <p>Watch the magic happen!</p>
        </div>
        <div class="row about_video">
            <div class="col-md-12">
                <iframe 
                    src="https://www.youtube.com/embed/z7mLHrf91DY" 
                    style="width:100%; height:450px; border:0;" 
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>
</section>

<section id="google-reviews" class="reviews_section bg-grey padding d-none">
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
