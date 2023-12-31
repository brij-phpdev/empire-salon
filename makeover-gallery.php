<?php
include_once './includes/header.php';
?>
		
		<section class="page_header d-flex align-items-center">
		    <div class="container">
		        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                   <h3>The Empire Salon</h3>
                   <h2>Makeover Gallery</h2>
                   
                </div>
		    </div>
		</section><!--/. page_header -->
        
        <section id="gallery" class="gallery_section bg-grey bd-bottom padding">
			<div class="container">
                <ul class="gallery_filter mb-30 d-none">
                    <li class="active" data-filter="*">All</li>
                    <li data-filter=".branding">Pre Wedding</li>
                    <li data-filter=".website">Face Treatment</li>
                    <li data-filter=".print">Threading Eyebrows</li>
                    <li data-filter=".photo">Make UP</li>
                </ul><!-- /.portfolio_filter -->
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
        
       <section class="cta_section padding">
           <div class="container">
               <div class="display-table">
                   <div class="table-cel">
                       <div class="cta_content align-center wow fadeInUp" data-wow-delay="300ms">
                           <h2>Making You Look Good <br> Is In Our Haritage.</h2>
                           <p>We take pride in providing top-notch grooming services that blend classic techniques with modern trends. Step into our warm and inviting space, where you'll find a team of skilled barbers dedicated to enhancing your style and confidence.</p>
                           <a href="book.php" class="default_btn">Make Appointment</a>
                       </div>
                   </div>
               </div>
           </div>
       </section><!-- /.cta_section -->
         
<?php
include_once './includes/footer.php';
?>