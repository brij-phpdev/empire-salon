        <div class="sponsor_section bg-grey padding">
            <div class="container">
                <ul id="sponsor_carousel" class="sponsor_items owl-carousel">
                    <li class="sponsor_item">
                        <img src="img/sponsors/NATURICA.png" alt="sponsor-image">
                    </li>
                    <li class="sponsor_item">
                        <img src="img/sponsors/RICA-wax.jpeg" alt="sponsor-image">
                    </li>
                    <li class="sponsor_item">
                        <img src="img/sponsors/sebastian.png" alt="sponsor-image">
                    </li>
                    <li class="sponsor_item">
                        <img src="img/sponsors/system.jpeg" alt="sponsor-image">
                    </li>
                    <li class="sponsor_item">
                        <img src="img/sponsors/janssen.png" alt="sponsor-image">
                    </li>
                    <li class="sponsor_item">
                        <img src="img/sponsors/skeyndor.jpeg" alt="sponsor-image">
                    </li>
                    <li class="sponsor_item">
                        <img src="img/sponsors/wella.png" alt="sponsor-image">
                    </li>
                    <li class="sponsor_item">
                        <img src="img/sponsors/3.jpg" alt="sponsor-image">
                    </li>
                </ul>
            </div>
        </div><!-- ./sponsor_section -->


        
<section class="widget_section padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 sm-padding">
                        <div class="footer_widget">
                            <img class="mb-15" src="img/logo.png" class="footer_logo" alt="Brand">
                            <p class="text-justify">With a legacy since 1928, Empire Salon, Agra, is your go-to for timeless beauty. Experience our exceptional services to emerge as your best self. Contact us now for a pampering transformation!</p>
                            <ul class="widget_social">
                                <li><a href="<?php echo FB_SOCIAL ?>"><i class="social_facebook"></i></a></li>
                                <!--<li><a href="#"><i class="social_twitter"></i></a></li>-->
                                <li><a href="<?php echo YOUTUBE_SOCIAL ?>"><i class="social_youtube"></i></a></li>
                                <li><a href="<?php echo INSTA_SOCIAL ?>"><i class="social_instagram"></i></a></li>
                                <!--<li><a href="#"><i class="social_linkedin"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 sm-padding">
                        <div class="footer_widget">
                            <h3>Headquater</h3>
                            <p class="text-justify mt-5"><?php echo html_entity_decode(ADDRESS) ?></p>
                            <p><?php echo EMAIL ?> <br><?php echo PHONE ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 sm-padding">
                        <div class="footer_widget">
                            <h3>Opening Hours</h3>
                            <ul class="opening_time mt-5">
                                <li>Monday - Friday <br/>11:30am - 2:008pm</li>
                                <li>Saturday – Monday:<br/> 9am – 8pm</li>
                                <li>Monday - Friday<br/> 5:30am - 11:008pm</li>
                                <li>Saturday - Sunday <br/>4:30am - 1:00pm</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 sm-padding">
                        <div class="footer_widget">
                            <h3>Connect on WhatsApp</h3>
                            <div class="subscribe_form mt-5">
                                <a target="_blank" href="<?php echo WHATSAPP_URL ?>"><img src="img/wa.link.png" class="img-fluid img-responsive" width="60%"></a>
                            </div><!-- Subscribe Form -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /.widget_section -->

        <footer class="footer_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 xs-padding">
                        <div class="copyright">&copy; <script type="text/javascript"> document.write(new Date().getFullYear())</script> The Empire Salon Powered by TheRoyal</div>
                    </div>
                    <div class="col-md-6 xs-padding">
                        <ul class="footer_social">
                            <li><a href="jobs.php">Careers</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Become a Brand Ambassador</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer><!-- /.footer_section -->
        
        
        
        
        
        

		<a data-scroll href="#header" id="scroll-to-top"><i class="arrow_up"></i></a>

                
                
                
                
                
                
                
             
                
		<!-- jQuery Lib -->
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/vendor/bootstrap.min.js"></script>
        <!-- Imagesloaded JS -->
        <script src="js/vendor/imagesloaded.pkgd.min.js"></script>
		<!-- OWL-Carousel JS -->
		<script src="js/vendor/owl.carousel.min.js"></script>
		<!--<script src="js/owl.carousel.js"></script>-->
		<!-- isotope JS -->
		<script src="js/vendor/jquery.isotope.v3.0.2.js"></script>
		<!-- Smooth Scroll JS -->
		<script src="js/vendor/smooth-scroll.min.js"></script>
		<!-- venobox JS -->
		<script src="js/vendor/venobox.min.js"></script>
        <!-- ajaxchimp JS -->
        <script src="js/vendor/jquery.ajaxchimp.min.js"></script>
        <!--Slicknav-->
		<script src="js/vendor/jquery.slicknav.min.js"></script>
		<!--Nice Select-->
		<script src="js/vendor/jquery.nice-select.min.js"></script>
        <!-- YTPlayer JS -->
	    <script src="js/vendor/jquery.mb.YTPlayer.min.js"></script>
	    <!-- Wow JS -->
	    <script src="js/vendor/wow.min.js"></script>
		<!-- Contact JS -->
		<script src="js/contact.js"></script>
		<!-- Appointment JS -->
		<script src="js/appointment.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>
                
		<!--<script src="js/custom-marquee.js"></script>-->
		
                <script src="js/plugins.js"></script>
                
		<script src="js/callSendSMS.js"></script>

                <script>
$(document).ready(function(){
	$('#main-video-slider').owlCarousel({
		items:1,
		merge:true,
		loop:true,
                nav:false,
                navText: ['<i class="arrow_carrot-left"></i>', '<i class="arrow_carrot-right"></i>'],
//		margin:10,
                autoplay:true,
                autoplayTimeout:10000,
                autoplayHoverPause:true,
		video:true,
		lazyLoad:true,
		center:true,
		responsive:{
			480:{
				items:1
			},
			600:{
				items:1
			}
		}
	});
})
</script>
                
    </body>
</html>
<?php // COUCH::invoke();
if(isset($link)):
    @mysqli_close($link);
endif;
?>