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
                                <li><a target="_blank" href="<?php echo FB_SOCIAL ?>"><i class="social_facebook"></i></a></li>
                                <!--<li><a href="#"><i class="social_twitter"></i></a></li>-->
                                <li><a target="_blank" href="<?php echo YOUTUBE_SOCIAL ?>"><i class="social_youtube"></i></a></li>
                                <li><a target="_blank" href="<?php echo INSTA_SOCIAL ?>"><i class="social_instagram"></i></a></li>
                                <!--<li><a href="#"><i class="social_linkedin"></i></a></li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 sm-padding">
                        <div class="footer_widget">
                            <h3>Headquarter</h3>
                            <p class="text-justify mt-5"><?php echo html_entity_decode(ADDRESS) ?></p>
                            <p><a class="mail_call" href="mailto:<?php echo EMAIL ?>"><?php echo EMAIL ?></a> <br><a class="mail_call" href="tel:<?php echo PHONE ?>"><?php echo PHONE ?></a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 sm-padding">
                        <div class="footer_widget">
                            <h3>Opening Hours</h3>
                            <?php
                                // Define opening times
                                $opening_times = [
                                    'Monday' => '10:30am to 7:30pm',
                                    'Tuesday' => 'Off',
                                    'Wednesday' => '10:30am to 7:30pm',
                                    'Thursday' => '10:30am to 7:30pm',
                                    'Friday' => '10:30am to 7:30pm',
                                    'Saturday' => '10:30am to 7:30pm',
                                    'Sunday' => '10:30am to 7:30pm'
                                ];

                                // Get the current day of the week (0 = Sunday, 6 = Saturday)
                                $current_day = date('l');

                                // Reorder the days array, placing the current day first
                                $days_of_week = array_keys($opening_times);
                                $days_of_week = array_merge(
                                    array_diff($days_of_week, [$current_day]), // Remove current day
                                    [$current_day] // Add current day at the end
                                );

                                // Generate the opening times HTML
                                echo '<ul class="opening_time mt-5">';

                                foreach ($days_of_week as $day) {
                                    $time = $opening_times[$day];
                                    echo "<li";
                                    if ($day == 'Tuesday' && $time == 'Off') {
                                        echo ' class="mail_call"'; // Special class for Tuesday "Off"
                                    }
                                    echo "><b>$day:</b> <span class=\"float-right\">$time</span></li>";
                                }

                                echo '</ul>';
                                ?>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 sm-padding">
                        <div class="footer_widget">
                            <h3>Connect on WhatsApp</h3>
                            <div class="subscribe_form mt-5">
                                <a target="_blank" href="<?php echo WHATSAPP_URL ?>"><img src="img/wa.link_tkepmx.png" class="img-fluid img-responsive" width="90%"></a>
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
		<script src="js/checkUser.js"></script>

                <script>
$(document).ready(function(){
    
    function enableCheckoutButton(){
        
        $("#book_checkout_btn").show().removeClass('disabled_btn');
        var a = $(".show_checkout").val();
        a++;
        $(".show_checkout").val(a);
        if (a && a >= 1) {
            $("#book_checkout_btn").removeClass("disabled_btn");
        }
        $("#book_checkout_btn").attr('href','checkout.php');
    }
    function disableCheckoutButton(){
        $("#book_checkout_btn").show().addClass('disabled_btn');
        var a = $(".show_checkout").val();
        a--;
        $(".show_checkout").val(a);
    }
    
    //display checkout button
    <?php if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])): ?>
//        enableCheckoutButton();
    <?php endif; ?>
    
    $(".portfolio_items").hide();
    
	$('#main-video-slider').owlCarousel({
		items:1,
		merge:true,
		loop:true,
                nav:false,
//                navText: ['<i class="arrow_carrot-left"></i>', '<i class="arrow_carrot-right"></i>'],
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
        
  function removeFromCart(data_id,ajax){
      // remove from cart..
//      alert(ajax);
            $.ajax({
                    dataType: "text",
                    data: {'action':'remove','ajax':ajax,'code':data_id},
                    url: 'cart.php'
                }).done(function( data ) {
//                    alert(data);
                    var json_obj = JSON.parse(data);
                    
//                    alert(json_obj.status);
                    if( json_obj.status == "success" ){
                        alert(json_obj.msg);
                        $(".checkout_btn_div").show();
                        updateCart();
                        if(ajax==="false"){
                            window.location.href = window.location.href;
                        }
                    }
                    else{
                        alert(data.msg);
                    }
                });
                disableCheckoutButton();
  }
   
   
   $(".cart_div").on("click", 'label',function(){
       //
       if (confirm('Are you sure you want to delete this item? This action cannot be undone.')){
            removeFromCart($(this).attr('data-pid'),true);
        }
       
   });
//    $(".cart_div").on("click", 'label.',function(){
//       //
//       if (confirm('Are you sure you want to delete this item? This action cannot be undone.')){
//            removeFromCart($(this).attr('data-pid'),false);
//        }
//       
//   });
   $(".book-service").on("click",function(e){
       e.preventDefault();
       //
       var btn_text = $(this).first().text();
       var rnKId = $("#rnKId").val();
//       alert(rnKId);
       
       $(this).addClass('selected_service_btn');
       if(btn_text== 'Service Selected'){
           $(this).text('Book Service');
           $(this).removeClass('selected_service_btn');
           $(".cart_div").html();
           removeFromCart($(this).attr('data-pid'),true);
       }
       else{
            $(this).text('Service Selected');
            
//            alert($(this).attr('data-mid'));
            $("#rnIdVal").val( btoa($(this).attr('data-mid')));
            $("#rnKId").val( $(this).attr('data-mid'));
            $("#packageName").val( $(this).attr('data-package'));
//            $("#rnIdVal").val(rnKId+$(this).attr('data-mid'));
//            console.log($(this).attr('data-mid'));
            enableCheckoutButton();
            // add it to cart..
            $(".cart_div").html();
            $.ajax({
                    dataType: "text",
                    data: {'action':'add','ajax':true,'packageId':$(this).attr('data-pid')},
                    url: 'cart.php'
                }).done(function( data ) {
                    console.log(data);
                    var json_obj = JSON.parse(data);
//                    alert(json_obj.status);
                    if( json_obj.status == "success" ){
//                        alert(json_obj.msg);
                        $(".checkout_btn_div").show();
                        updateCart();
                    }
                    else{
                        alert(data.msg);
                    }
                });
        }
        
        
        
        
   });
        
});
function updateCart(){
$.ajax({
                    url: 'ajax_cart.php'
                }).done(function( data ) {
                    $(".cart_div").html(data);
//                    alert('updated cart');
                });
}
</script>
                
<!-- <script type="text/javascript">

            

            $('body').on('click', '#validate_email', function (e) {
                $('.success-email-update').html('');
                $('.error-email-update').html('');
                var student_mobile = $("#mobile").val();
                var student_email = $("#email").val();
                if (student_mobile == '') {
                    alert('Mobile cannot be empty!');
                    $("#mobile").focus();
                    return false;
                }
                if (student_email == '') {
                    alert('Kindly enter your email first!');
                    $("#email").focus();
                    return false;
                } else {
                    //send OTP
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: "{{url('/')}}/sendMailOTP",
                        data: {"student_email": student_email, "student_mobile": student_mobile},
                    }).done(function (json) {
                        var msg = jQuery.parseJSON(json);
                        console.log(msg);
                        console.log(msg.status_code);
                        console.log(msg.message);
                        if (msg.status_code == 'success') {
                            $('.success-email-update').addClass('text-' + msg.status_code).html(msg.message);
//                            alert(msg.message);
                            // now open textbox to validate..
                            $("#validate_email").addClass('disabled');
                            $("#validate_email").hide();
                            $("#mail_otp").show();
                            $("#validate_mail_otp").show();
                            $("#validate_mail_otp").on('click', function () {
                                $('.success-email-update').html('');
                                $('.error-email-update').html('');
                                var email_otp = $("#mail_otp").val();
                                if (email_otp == "") {
                                    $("#mail_otp").focus();
                                    return false;
                                }
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    method: "POST",
                                    url: "{{url('/')}}/validateMailOTP",
                                    data: {"student_email": student_email, "email_otp": email_otp},
                                }).done(function (json) {
                                    var msg = jQuery.parseJSON(json);
                                    console.log(msg);
                                    if (msg.status_code == 'success') {
                                        $('.success-email-update').addClass('text-' + msg.status_code).html(msg.message);
                                        alert(msg.message);
                                        // now open textbox to validate..
                                        $("#mail_otp").hide();
                                        $("#validate_email").addClass('disabled');
                                        $("#validate_mail_otp").hide();
                                        $("#email").prop("readonly", true);
                                        $("#is_email_verified").val('1');


                                    } else {
//                                        alert(msg.message);
                                        $('.error-email-update').addClass('text-' + msg.status_code).html(msg.message);
                                    }
                                });
                            });


                        } else {

//                            alert(msg.status_code);
//                            alert(msg.message);

                            $('.error-email-update').addClass('text-' + msg.status_code).html(msg.message);
                        }
                    });
                }
            });
        </script>-->

    </body>
</html>
<?php // COUCH::invoke();
if(isset($link)):
    @mysqli_close($link);
endif;
?>