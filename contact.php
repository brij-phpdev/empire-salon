<?php 
include_once './includes/header.php';
?>
        
        <div class="mapouter"><div class="gmap_canvas">
                <iframe width="100%" height="350" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3548.53409146843!2d78.00055027445248!3d27.202376547584315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39747743f21aaaab%3A0xc9f4dadc5c470613!2sEmpire%20Salon!5e0!3m2!1sen!2sin!4v1701451862284!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><style>.mapouter{position:relative;text-align:right;height:350px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:100%;}</style></div>
		
		<section class="contact-section padding">
            <div class="map"></div>
		    <div class="container">
		        <div class="contact-wrap d-flex align-items-center row">
                    <div class="col-lg-12 sm-padding">
		                <div class="contact-info">
		                    <h2>Get in touch with us & <br>send us message today!</h2>
		                    <p></p>
		                    <h3><?php echo ADDRESS ?></h3>
		                    <h4><span>Email:</span> <a class="mail_call" href="mailto:<?php echo EMAIL ?>"><?php echo EMAIL ?></a>
                                        <br> <span>Phone:</span> <a class="mail_call" href="tel:<?php echo PHONE ?>"><?php echo PHONE ?></a> <br> </h4>
		                </div>
		            </div>
		            
		        </div>
		    </div>
		</section><!-- /.contact-section -->
       
<?php 
include_once './includes/footer.php';
?>