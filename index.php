<?php
include_once( './includes/header.php' );
include_once './includes/database.php';
?>

<section class="slider_section">
            <ul id="main-video-slider" class="owl-carousel main_slider">
                <li class="main_slide d-flex align-items-center">
                    <video class="background-video" muted loop="loop" autoplay="autoplay" poster="img/headers/service.jpg">
                        <source src="videos/salon-services.mp4" type="video/mp4">
                        <source src="videos/salon-services.webm" type="video/webm">
<!--                        <source src="movie.ogg" type="video/ogg">-->
                        Your browser does not support the video tag.
                    </video>
                    <div class="container">
                        <div class="slider_content">
                            <h3>Discover modern, trending beauty services for all your unique needs.</h3>
                            <h1>The modern universe of beauty.</h1>
                            <p>Dive into a dynamic cosmos of cutting-edge beauty services, where trends <br>converge with innovation to redefine your allure. Explore today!</p>
                            <a href="book.php" class="default_btn">Book an Appointment</a>
                        </div>
                    </div>
                </li>
                <li class="main_slide d-flex align-items-center">
                    <video class="background-video" muted loop="loop" autoplay="autoplay" poster="img/headers/bride-makeup.jpg">
                        <source src="videos/Bride-Getting-Ready.mp4" type="video/mp4">
                        <source src="videos/Bride-Getting-Ready.webm" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                    <div class="container">
                        
                        <div class="slider_content">
                            <h3>Elevating beauty for brides, creating timeless moments with flawless artistry.</h3>
                            <h1>Exquisite bridal beauty,<br>makeup services par excellence.</h1>
                            <p>Elevate your bridal beauty with our expert makeup artists and beauty services. <br>Radiate confidence on your special day. Book now!</p>
                            <a href="bride-packages.php" class="default_btn">Explore Bridal Packages</a>
                        </div>
                    </div>
                </li>
                <li class="main_slide d-flex align-items-center">
                    <video class="background-video" muted loop="loop" autoplay="autoplay" poster="img/headers/bride-makeup.jpg">
                        <source src="videos/groom.mp4" type="video/mp4">
                        <source src="videos/groom.webm" type="video/webm">
<!--                        <source src="movie.ogg" type="video/ogg">-->
                        Your browser does not support the video tag.
                    </video>
                    <div class="container">
                        <div class="slider_content">
                            <h3>Elevating weddings with unparalleled groom services, our salon fosters timeless elegance.</h3>
                            <h1>Top-notch groom's services<br>for exceptional elegance</h1>
                            <p>Experience the finest Indian groom services at our salon, expert grooming, <br>traditional attire styling, and a touch of luxury for your special day.</p>
                            <a href="groom-packages.php" class="default_btn">Explore Groom Packages</a>
                        </div>
                    </div>
                </li>
                
            </ul>
        </section><!-- /.slider_section -->
        
        <section class="about_section bd-bottom padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 xs-padding">
                <div class="section_heading">
                    <h3>Mordern & Trending</h3>
                    <h2>Where Style Meets<br>Sustainability and<br/> Innovation in Agra </h2>
                    <p>Where Hair Meets Artistry - Unveil Your Unique Beauty Narrative with Us</p>
                    <a href="about-us.php" class="default_btn">More About Us</a>
                </div>
            </div>
            <div class="col-md-6 xs-padding">
                <div class="about_video">
                    <video loop="loop" class="img-fluid" autoplay="autoplay" style="width: 100%;height: auto;">
                        <source src="videos/close-up-of-female-hairdresser-makes-hairstyle.mp4" type="video/mp4">
                        <source src="videos/close-up-of-female-hairdresser-makes-hairstyle.webm" type="video/webm">
                        <source src="movie.ogg" type="video/ogg">
                        Your browser does not support the video tag.
                    </video>
                    <!--<div class="play-icon"><a href="#"><i class="ti-control-play"></i></a></div>-->
                </div>
            </div>
        </div>
    </div>
</section><!--/. about_section -->

<?php

$coupons = array();
$coupontable_sql = "SELECT * FROM `coupons`";

if ($coupontable_res = @mysqli_query($link, $coupontable_sql)) {

    if (@mysqli_num_rows($coupontable_res) > 0) {
        while ($coupontable_row = @mysqli_fetch_assoc($coupontable_res)) {
            $coupons[] = $coupontable_row;
        }
    }
}
if(!empty($coupons)):
?>
    <section id="section-trending" class="why_section padding bg-grey">
                <div class="container-fluid">
<!--                    <div class="row hide">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <h2 class="wow fadeIn text-white">Trending Offers</h2>
                            <div class="de-separator"></div>
                            <div class="spacer-single"></div>
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="spacer-single"></div>
                        <?php 
                        foreach($coupons as $coupon):
                        ?>
                        <?php 
//                            echo $coupon['offer_img_front'];
                        
                        // check if coupon is expirin or not..
                        $today = date('Y-m-d');
                        $start_date = $coupon['starts_at'];
                        $start_date = date('Y-m-d', strtotime($start_date));
                        
                        $end_date = $coupon['expires_at'];
                        $end_date = date('Y-m-d', strtotime($end_date));
                        
                        if (($start_date <= $today) && ($end_date >= $today)){
                            // than only show because the offer has expired.
                            
                             $file_path = SITE_BOOK_URL . 'application/uploads/coupons/' . $coupon['offer_img_front'];
                            $file_img_back_path = SITE_BOOK_URL . 'application/uploads/coupons/' . $coupon['offer_img_back'];
//                            echo $file_path;
//                            var_dump(is_file($file_path));
//                            var_dump(file_exists($file_path));
                            ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-xl-6">
                        <!--<div class="col-6">-->
                        
                            <div class="flip-box">
                                <div class="flip-box-inner">
                                  <div class="flip-box-front">
                                      <img class="img-fluid" src="<?php echo $file_path ?>" alt="Offer <?php echo $coupon['name'] ?>">
                                  </div>
                                  <div class="flip-box-back">
                                    <img class="img-fluid" src="<?php echo $file_img_back_path ?>" alt="Offer <?php echo $coupon['name'] ?>">
                                  </div>
                                </div>
                            </div>
                            
                            
                            <?php
                            
                        }
                        
                        
                           
//                            if (!empty($coupon['offer_img_front']) && is_file($file_path)):
//                                echo 'here';
//                                $path = $file_path;
//                                $type = pathinfo($path, PATHINFO_EXTENSION);
//                                $data = file_get_contents($path);
//                                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                                ?>
<!--                            <img class="border" src="<?php // echo $base64 ?>" alt="Offer <?php // echo $coupon['name'] ?>">-->
                            <?php
//                            endif;

                            
                            ?>
                            
                        </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </section>
<?php endif; ?>
<section class="service_section bg-grey bd-bottom padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>Save 10% On your Next</h3>
            <h2>Our Trending Services</h2>
            
        </div>
        <div id="trending_cuts_carousel_od" class="row ">
            <div class="col-lg-3 col-md-4 sm-padding">
                <div class="service_content align-center wow fadeInUp" data-wow-delay="200ms">
                    <img src="img/hairstyles/1.jpg" alt="Services">
                    <h3>Cut & Style</h3>
                    <P class="text-justify">Experience the uniqueness of hair cutting & styling in Agra. Our expert team uses signature techniques to craft a personalized style that perfectly matches your personality, lifestyle, and hair type.</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 sm-padding wow fadeInUp" data-wow-delay="300ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/2.jpg" alt="Services">
                    <h3>Signature Cut</h3>
                    <P class="text-justify">Elevate your style with our skilled hair artisans, crafting the flawless EMPIRE signature cut, tailored just for you. Indulge in a stunning blow-dry, enriched by our premium label. haircare range.</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 sm-padding wow fadeInUp" data-wow-delay="400ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/3.jpg" alt="Services">
                    <h3>Barbering</h3>
                    <P class="text-justify">For a swift, customized EMPIRE signature barbered cut, trust our experts. A quick and simple finish, perfectly suited to you, enriched with the finesse of our professional label. haircare products.</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/4.jpg" alt="Services">
                    <h3>Afro Textured Hair</h3>
                    <P class="text-justify">Celebrate your unique natural textures or opt for a relaxing transformation. Our artistry creates exquisite, edgy yet practical shapes, enriched with colors that nourish, fortify, and enhance those beautiful curls.</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/5.jpg" alt="Services">
                    <h3>Coloring</h3>
                    <P class="text-justify">Our color specialist will tune in to your color aspirations and requirements, all while evaluating your skin tone, eye shade, and hair texture. This personalized approach leads to the ideal EMPIRE signature hue for you in Agra.</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/6.jpg" alt="Services">
                    <h3>Signature Colour</h3>
                    <P class="text-justify">Experience an EMPIRE full head color transformation, spanning from roots to ends. Whether you desire enhanced shine, lightening, darkening, tone alteration, or white hair coverage, our color experts have the perfect solution for you.</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/7.jpg" alt="Services">
                    <h3>Signature Balayage</h3>
                    <P class="text-justify">Indulge in an EMPIRE custom, full head application of freehand balayage. Achieve the natural, sun-kissed look or opt for striking, face-framing highlights to suit your style.</P>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/8.jpeg" alt="Services">
                    <h3>Signature Highlights</h3>
                    <P class="text-justify">EMPIRE's timeless highlights cascade through your hair, illuminating it with a multi-tonal effect. They can be natural, textured, or boldly vibrant, making them an excellent choice for blending white hair.</P>
                </div>
            </div>
        </div>
    </div>
</section><!--/. service_section -->

<section class="book_section padding">
    <div class="book_bg"></div>
    <div class="map_pattern"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-8">
                <form action="#" method="post" id="appointment_form" class="form-horizontal appointment_form">
                    <div class="book_content">
                        <h2>Make an appointment</h2>
                        <p class="text-justify">We take pride in providing top-notch grooming services that blend classic techniques with modern trends. Step into our warm and inviting space, where you'll find a team of skilled barbers dedicated to enhancing your style and confidence.</p>
                    </div>
                    <a class="default_btn" href="book.php">Make Appointment</a>
                    <div id="msg-status" class="alert" role="alert"></div>
            </form>
                </div>
        </div>
    </div>
</section><!--/. book_section -->

                
<section id="gallery" class="gallery_section bg-grey bd-bottom padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2>Gallery</h2>
            
        </div>
        
        <ul class="portfolio_items row">

            <li class="col-lg-6 col-sm-6 padding-15 single_item branding">
                <figure class="portfolio_item">
                    <img src="<?php echo convertImgToBase64('img/bridal-makeover/1-small.png') ?>" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/bridal-makeover/1.png" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>

            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="img/bridal-makeover/6-small.jpg" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/bridal-makeover/6.jpg" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="img/bridal-makeover/3-small.jpg" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/bridal-makeover/3.jpg" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="img/bridal-makeover/4-small.jpg" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/bridal-makeover/4.jpg" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="img/bridal-makeover/5-small.jpg" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/bridal-makeover/5.jpg" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-6 col-sm-6 padding-15 single_item branding website">
                		<figure class="portfolio_item">
                			<img src="img/bridal-makeover/7-small.jpg" class="img-fluid" alt="Portfolio Item">
                			<figcaption class="overlay">
                				<a href="img/bridal-makeover/7.jpg" class="img_popup"></a>
                			</figcaption>
                		</figure>
                	</li>
        </ul><!-- /.portfolio_items -->
    </div>
</section><!-- /. gallery_section -->

<section class="product_cta padding">
           <div class="container">
               <div class="row d-flex align-items-center">
                   <div class="col-md-6 xs-padding wow fadeInLeft" data-wow-delay="300ms">
                       <div class="pro_cta_content">
                           <h2>Fashions fade, <br>style is eternal.</h2>
                           <p>product content goes here</p>
                           
                           <a class="default_btn" href="<?php echo SHOP_URL ?>">Purchase Now</a>
                       </div>
                   </div>
                   <div class="col-md-6 xs-padding wow fadeInRight" data-wow-delay="300ms">
                       <img src="img/product.png" alt="img">
                   </div>
               </div>
           </div>
       </section><!--/. product_cta -->


<!--       <section id="reviews_head" class="testimonial_section_heading padding-15">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2>Customer Stories: Experiences Shared</h2>
        </div>
    </div>
       </section>-->
<section id="reviews" class="testimonial_section padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2 class="text-white">Customer Stories: Experiences Shared</h2>
        </div>
        <ul id="testimonial_carousel" class="testimonial_items owl-carousel">
            <li class="testimonial_item">
                <p>"It was amazing visiting Empire salon in my home town. all the services were amazing. Shama was superb in massage , manicure, pedicure, foot massage in all ways . can’t wait to come again . amazing team of people so coordinated together to make your experience worth."</p>
                <h4 class="text-white">Neetu Gosain</h4>
            </li>
            <li class="testimonial_item">
                <p>"I had my pedicure and spa services from Shama. She is very nice in her field and gave her 100%.. I am totally satisfied by her work. Regards, Shipra"</p>
                <h4 class="text-white">Shipra Agarwal</h4>
            </li>
            <li class="testimonial_item">
                <p>"Very efficient staff.. I always have a very good experience.. for facial you can ask for khushi or shiza. And for pedicure and spa undoubtedly Ram..."</p>
                <h4 class="text-white">Veenu Arora</h4>
            </li>
            <li class="testimonial_item">
                <p>"Shama and Shiza were Amazinggg in providing me with their grooming services at Empire Salon! They gave their 100% :)"</p>
                <h4 class="text-white">Esha Agrawal</h4>
            </li>
            <li class="testimonial_item">
                <p>"I am using this Damon's service since last 15 yrs...Their work is always appreciable"</p>
                <h4 class="text-white">Archana Rana</h4>
            </li>
            <li class="testimonial_item">
                <p>"Shama did excellent pedicure Shiza massage was superb Khushi facial was very relaxing Jeetu as usual perfect in his job Excellent Sevice by all Thanks to all"</p>
                <h4 class="text-white">Rashi Garg</h4>
            </li>
        </ul>
    </div>
</section><!-- /.testimonial_section -->


<!--<section class="product_cta padding">
           <div class="container">
               <div class="row d-flex align-items-center">
                   <div class="col-md-6 xs-padding wow fadeInLeft" data-wow-delay="300ms">
                       <div class="pro_cta_content">
                           <h2>Fashions fade, <br>style is eternal.</h2>
                           <p>product content goes here</p>
                           
                           <a class="default_btn" href="<?php echo SHOP_URL ?>">Purchase Now</a>
                       </div>
                   </div>
                   <div class="col-md-6 xs-padding wow fadeInRight" data-wow-delay="300ms">
                       <img src="img/product.png" alt="img">
                   </div>
               </div>
           </div>
       </section>/. product_cta -->


<section class="content_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="content_wrap">
                    <img src="img/promo/1.png" alt="img">
                    <div class="content_info">
                        <div class="content_inner">
                            <h2>Haircuts</h2>
                            <h3>Revamp Your Look Today!</h3>
                            <a href="book.php">Make Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="content_wrap">
                    <img src="img/promo/2.png" alt="img">
                    <div class="content_info">
                        <div class="content_inner">
                            <h2>Facials</h2>
                            <h3>Glow with Us Today!</h3>
                            <a href="book.php">Make Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="content_wrap">
                    <img src="img/promo/3.png" alt="img">
                    <div class="content_info">
                        <div class="content_inner">
                            <h2>Makeups</h2>
                            <h3>Glam Up Your Look!</h3>
                            <a href="book.php">Make Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/.content_section -->

<?php

$blogs = array();
$blogtable_sql = "SELECT * FROM `blog` WHERE status=1";

if ($blogtable_res = @mysqli_query($link, $blogtable_sql)) {

    if (@mysqli_num_rows($blogtable_res) > 0) {
        while ($blogtable_row = @mysqli_fetch_assoc($blogtable_res)) {
            $blogs[] = $blogtable_row;
        }
    }
}
if(!empty($blogs)):
?>
<section class="blog-section bd-bottom padding">
    <div class="container">
        <div class="section-heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>From Blog</h3>
            <h2>A Good Newspaper Is A <br> Nation Talking To Itself</h2>
        </div><!--/.section-heading-->
        <div class="row blog-wrap">
            <?php 
            foreach($blogs as $blog):
                $blog_img = SITE_BOOK_URL . 'application/uploads/img/blog/'.$blog['image'];
            ?>
            <div class="col-lg-4 col-sm-6 sm-padding wow fadeInUp" data-wow-delay="200ms">
                <div class="blog-item">
                    <div class="blog-thumb">
                        
                        <img src="<?php echo $blog_img ?>" alt="<?php echo $blog['title'] ?>">
                        <span class="category"><a href="blog-single.php?title=<?php echo $blog['permalink'] ?>">Saloon</a></span>
                    </div>
                    <div class="blog-content">
                        <h3><a href="blog-single.php?title=<?php echo $blog['permalink'] ?>"><?php echo $blog['title'] ?></a></h3>
                        <p><?php echo substr(html_entity_decode($blog['description']),0,150) ?>...</p>
                        <a href="blog-single.php?title=<?php echo $blog['permalink'] ?>" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section><!--/.blog-section-->
<?php
endif;
?>

<?php include_once( './includes/footer.php' ); ?>