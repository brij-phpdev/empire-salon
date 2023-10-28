<?php 
include_once './includes/header.php';
?>
        
        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q=Empire%20Salon%20Agra&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.emojilib.com"></a></div><style>.mapouter{position:relative;text-align:right;height:350px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:100%;}</style></div>
		
		<section class="contact-section padding">
            <div class="map"></div>
		    <div class="container">
		        <div class="contact-wrap d-flex align-items-center row">
                    <div class="col-lg-6 sm-padding">
		                <div class="contact-info">
		                    <h2>Get in touch with us & <br>send us message today!</h2>
		                    <p></p>
		                    <h3><?php echo ADDRESS ?></h3>
		                    <h4><span>Email:</span> <?php echo EMAIL ?> <br> <span>Phone:</span> <?php echo PHONE ?> <br> </h4>
		                </div>
		            </div>
		            <div class="col-lg-6 sm-padding">
		                <div class="contact-form">
                                    <form action="contact_post.php" method="post" id="ajax_form" class="form-horizontal">
                                <div class="form-group colum-row row">
                                    <div class="col-sm-6">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <button id="submit" class="default_btn" type="submit">Send Message</button>
                                    </div>
                                </div>
                                <div id="form-messages" class="alert" role="alert"></div>
                            </form>
                        </div>
		            </div>
		        </div>
		    </div>
		</section><!-- /.contact-section -->
       
<?php 
include_once './includes/footer.php';
?>