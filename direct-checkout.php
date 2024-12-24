<?php
include_once './includes/header.php';
include_once './includes/database.php';
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
        <p>Use Promo Code <strong>EMPIRE20</strong> to get 20% off your first appointment.</p>
        
        <!-- Promo Image -->
        <img src="img/promo/bliss-offer.jpeg" alt="Promo Banner" style="max-width: 100%; height: auto; margin: 20px 0;">

        <div id="countdown-timer" style="font-size: 20px; margin: 10px 0;"></div>
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


<!--<section id="reviews" class="reviews_section bg-grey padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2>Customer Reviews</h2>
        </div>
        <div class="google-reviews">
            <script src="https://platform.google.com/reviews/embed.js"></script>
            

        </div>
    </div>
</section>-->
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

<section id="instagram-feed" class="instagram_section bg-white padding">
    <div class="container">
        <div class="section_heading text-center mb-40">
            <h2>Follow Us on Instagram</h2>
            <p>See our latest updates, offers, and transformations!</p>
        </div>
        <div class="row">
            <!-- Embed Instagram posts using iframe or dynamic fetching -->
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

<section id="first-time-user" class="user_section bg-white padding">
    <div class="container">
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
</section>

<section id="booking" class="booking_section padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2>Book Your Appointment</h2>
        </div>
        <div class="booking-form">
            <form method="post" action="booking_post.php">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" required />
                </div>
                <div class="form-group">
                    <label for="date">Preferred Date</label>
                    <input type="date" id="date" name="date" class="form-control" min="<?php echo date('Y-m-d') ?>" required />
                </div>
                <div class="form-group">
                    <label for="time">Preferred Time</label>
                    <select id="time" name="time" class="form-control" required>
                        <option value="11:00 AM">11:00 AM</option>
                        <option value="12:00 PM">12:00 PM</option>
                        <option value="1:00 PM">1:00 PM</option>
                        <option value="2:00 PM">2:00 PM</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" class="default_btn" value="Book & Pay" />
                </div>
<!--                <div class="form-group">
                    <button type="submit" class="default_btn">Book & Pay</button>
                </div>-->
            </form>
        </div>
    </div>
</section>
<section id="featured-videos" class="videos_section bg-grey padding">
    <div class="container">
        <div class="section_heading text-center mb-40">
            <h2>Our Featured Services</h2>
            <p>Watch the magic happen!</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <iframe src="https://www.instagram.com/reel/CODE/embed" 
                        style="width:100%; height:300px; border:0;" allowfullscreen></iframe>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.instagram.com/reel/ANOTHER_CODE/embed" 
                        style="width:100%; height:300px; border:0;" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>

<?php
include_once './includes/footer.php';
?>
