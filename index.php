<?php
include_once( './includes/header.php' );
include_once './includes/database.php';
?>


<section class="hero_section d-flex align-items-center">
    <div class="video_bg" data-property="{videoURL:'3pFH7FQu5so',containment:'self',autoPlay:true, mute:true, startAt:0, opacity:1, showControls:false, ratio:'16/9', quality: 'hd720', showYTLogo: false }"></div>
    <div class="container">
        
        <div class="hero_content align-center">
            <div class="col-12">
            <h3>Its Not Just a Haircut, Its an Experience.</h3>
            <div class="col-lg-6 offset-lg-3">
            </div>
            <a href="book.php" class="default_btn ">Make Appointment</a>
        </div>
    </div>
    <div class="wm wm-carousel">
        <div class="wow fadeInRight">CUT & STYLE <span class="s1">Signature Cut</span> Afro Textured Hair <span class="s1">Signature Colour</span></div>
    </div>
</section><!-- hero_Section -->

<section class="about_section bd-bottom padding">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-md-6 xs-padding">
                <div class="section_heading">
                    <h3>Mordern & Trending</h3>
                    <h2>Where Style Meets<br/> Sustainability and Innovation<br/> in Agra </h2>
                    <p>Where Hair Meets Artistry - Unveil Your Unique Beauty Narrative with Us</p>
                    <a href="about-us.php" class="default_btn">More About Us</a>
                </div>
            </div>
            <div class="col-md-6 xs-padding">
                <div class="about_video">
                    <video width="500" height="290"  loop="loop" autoplay="autoplay">
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

<section class="service_section bg-grey bd-bottom padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>Save 10% On your Next</h3>
            <h2>Our Trending Services</h2>
            <div class="heading-line"></div>
        </div>
        <div id="trending_cuts_carousel" class="row ">
            <div class="col-lg-12 col-md-8 sm-padding">
                <div class="service_content align-center wow fadeInUp" data-wow-delay="200ms">
                    <img src="img/hairstyles/1.jpg" alt="Services">
                    <h3>Cut & Style</h3>
                    <P class="text-justify">Experience the uniqueness of hair cutting & styling in Agra. Our expert team uses signature techniques to craft a personalized style that perfectly matches your personality, lifestyle, and hair type.</P>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 sm-padding wow fadeInUp" data-wow-delay="300ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/2.jpg" alt="Services">
                    <h3>Signature Cut</h3>
                    <P class="text-justify">Elevate your style with our skilled hair artisans, crafting the flawless EMPIRE signature cut, tailored just for you. Indulge in a stunning blow-dry, enriched by our premium label. haircare range.</P>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 sm-padding wow fadeInUp" data-wow-delay="400ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/3.jpg" alt="Services">
                    <h3>Barbering</h3>
                    <P class="text-justify">For a swift, customized EMPIRE signature barbered cut, trust our experts. A quick and simple finish, perfectly suited to you, enriched with the finesse of our professional label. haircare products.</P>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/4.jpg" alt="Services">
                    <h3>Afro Textured Hair</h3>
                    <P class="text-justify">Celebrate your unique natural textures or opt for a relaxing transformation. Our artistry creates exquisite, edgy yet practical shapes, enriched with colors that nourish, fortify, and enhance those beautiful curls.</P>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/5.jpg" alt="Services">
                    <h3>COLORING</h3>
                    <P class="text-justify">Our color specialist will tune in to your color aspirations and requirements, all while evaluating your skin tone, eye shade, and hair texture. This personalized approach leads to the ideal EMPIRE signature hue for you in Agra.</P>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/6.jpg" alt="Services">
                    <h3>Signature Colour</h3>
                    <P class="text-justify">Experience an EMPIRE full head color transformation, spanning from roots to ends. Whether you desire enhanced shine, lightening, darkening, tone alteration, or white hair coverage, our color experts have the perfect solution for you.</P>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 sm-padding wow fadeInUp" data-wow-delay="500ms">
                <div class="service_content align-center">
                    <img src="img/hairstyles/7.jpg" alt="Services">
                    <h3>Signature Balayage</h3>
                    <P class="text-justify">Indulge in an EMPIRE custom, full head application of freehand balayage. Achieve the natural, sun-kissed look or opt for striking, face-framing highlights to suit your style.</P>
                </div>
            </div>
            <div class="col-lg-12 col-md-8 sm-padding wow fadeInUp" data-wow-delay="500ms">
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
            <h3>Trendy Salon &amp; Spa</h3>
            <h2>Portfolio Gallery</h2>
            <div class="heading-line"></div>
        </div>
        <ul class="portfolio_items row">

            <li class="col-lg-6 col-sm-6 padding-15 single_item branding">
                <figure class="portfolio_item">
                    <img src="img/portfolio/1.JPG" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/portfolio/1.JPG" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>

            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="img/portfolio/2.JPG" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/portfolio/2.JPG" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item print branding">
                <figure class="portfolio_item">
                    <img src="img/portfolio/3.JPG" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/portfolio/3.JPG" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item website photo">
                <figure class="portfolio_item">
                    <img src="img/portfolio/4.JPG" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/portfolio/4.JPG" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item print photo">
                <figure class="portfolio_item">
                    <img src="img/portfolio/5.JPG" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/portfolio/5.JPG" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-6 col-sm-6 padding-15 single_item branding website">
                <figure class="portfolio_item">
                    <img src="img/portfolio/6.JPG" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="img/portfolio/6.JPG" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
        </ul><!-- /.portfolio_items -->
    </div>
</section><!-- /. gallery_section -->


<section id="reviews" class="testimonial_section padding">
    <div class="container">
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



<section class="content_section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="content_wrap">
                    <img src="img/promo/1.png" alt="img">
                    <div class="content_info">
                        <div class="content_inner">
                            <h2>Haircuts</h2>
                            <h3>Trendy Salon & Spa</h3>
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
                            <h3>Trendy Salon & Spa</h3>
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
                            <h3>Trendy Salon & Spa</h3>
                            <a href="book.php">Make Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/.content_section -->

<section class="blog-section bd-bottom padding">
    <div class="container">
        <div class="section-heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>From Blog</h3>
            <h2>A Good Newspaper Is A <br> Nation Talking To Itself</h2>
        </div><!--/.section-heading-->
        <div class="row blog-wrap">
            <div class="col-lg-4 col-sm-6 sm-padding wow fadeInUp" data-wow-delay="200ms">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="img/post-1.jpg" alt="post">
                        <span class="category"><a href="#">interior</a></span>
                    </div>
                    <div class="blog-content">
                        <h3><a href="#">Minimalist trending in modern architecture 2019</a></h3>
                        <p>Building first evolved out dynamics between needs means available building materials attendant skills.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 sm-padding wow fadeInUp" data-wow-delay="300ms">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="img/post-2.jpg" alt="post">
                        <span class="category"><a href="#">Architecture</a></span>
                    </div>
                    <div class="blog-content">
                        <h3><a href="#">Terrace in the town yamazaki kentaro design workshop.</a></h3>
                        <p>Building first evolved out dynamics between needs means available building materials attendant skills.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 sm-padding wow fadeInUp" data-wow-delay="400ms">
                <div class="blog-item">
                    <div class="blog-thumb">
                        <img src="img/post-3.jpg" alt="post">
                        <span class="category"><a href="#">Design</a></span>
                    </div>
                    <div class="blog-content">
                        <h3><a href="#">W270 house são paulo arquitetos fabio jorge architeqture.</a></h3>
                        <p>Building first evolved out dynamics between needs means available building materials attendant skills.</p>
                        <a href="#" class="read-more">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/.blog-section-->



<?php include_once( './includes/footer.php' ); ?>