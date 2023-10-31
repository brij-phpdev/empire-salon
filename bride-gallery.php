<<?php
include_once( './includes/header.php' );
//include_once( './includes/database.php' );
?>

<section class="page_header d-flex align-items-center">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>The Empire Salon</h3>
            <h2>Bride Groom Packages</h2>

        </div>
    </div>
</section><!--/. page_header -->

<section id="gallery" class="gallery_section bg-grey bd-bottom padding">
    <div class="container">
        <ul class="gallery_filter mb-30">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".branding">Bride Packages</li>
            <li data-filter=".photo">Groom Packages</li>
<!--            <li data-filter=".print"></li>
            <li data-filter=".website">Hair Color</li>-->
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
            <li class="col-lg-6 col-sm-6 padding-15 single_item branding branding">
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

<section class="pricing_section bg-grey bd-bottom padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 sm-padding">
                <div class="price_wrap">
                    <h3>Bride Packages</h3>
                    <ul class="price_list">
                        <li>
                            <h4>RUBY BLISS</h4>
                            <p>
                                <?php echo nl2br('Pre Wedding first Session
                                Hair Shape Up / Threading Eye Brows / Root Hair
                                Colour Enhancement / Enrich Hair Spa
                                Pre Wedding Second Session
                                Tan Removal Treatment /
                                Perfection Brightening Face
                                Treatments / Liposoluble
                                Flavoured Wax / Pedipei
                                Manicure & Pedicure
                                On Wedding Makeup') ?>
                            </p>
                            <span class="price">₹ 21000/-</span>
                        </li>
                        <li>
                            <h4>EMERALD LIFE</h4>
                            <p>
                                <?php echo nl2br('Pre Wedding first Session
                                Hair Shape Up & Rescue Repair / Threading Eye
                                Brows / Root Hair Colour Enhancement /
                                Liposoluble Flavoured Wax
                                Pre Wedding Second Session
                                Tan Removal Treatment /
                                Moroccanoil Hair Spa
                                Treatment / Power
                                Essencious Face Mask /
                                Hydra Face Treatment
                                Pre Wedding Third Session
                                Stem Cellogist Face
                                Treatment Intenso
                                Cocoa Body Polishing /
                                Alga Manicure & Pedicure
                                On Wedding MakeUP') ?></p>
                            <span class="price">₹ 31000/-</span>
                        </li>
                        <li>
                            <h4>SAPPHIRE PRADISE</h4>
                            <p><?php echo nl2br('Pre Wedding first Session
                                Hair Shape Up & Liss Ten Treatments / Threading
                                Eye Brows / Root Hair Colour Enhancement / Alga
                                Manicure & Pedicure
                                Pre Wedding Second Session
                                Tan Removal Treatment /
                                Intense Alchemy Moroccanoil
                                Hair S p a Treatment / P o w e r
                                Essencious Face Mask /
                                Express Glow Face Treatment
                                with Gold Mask
                                Pre Wedding Third Session
                                Perfection Brightening
                                Face Treatment /
                                Liposoluble Flavoured
                                Wax / B - Wax
                                Pre Wedding Fourth Session
                                Signature Treatment
                                (German) / Intenso
                                Cocoa Body Polishing
                                On Wedding Makeup') ?></p>
                            <span class="price">₹ 41000/-</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 sm-padding">
                <div class="price_wrap">
                    <h3>Groom Packages</h3>
                    <ul class="price_list">
                        <li>
                            <h4>FINER LIFE</h4>
                            <p>
                                <?php echo nl2br('Pre Wedding first Session
                                Hair Styling / Royal Shave or
                                Beard Trim / Root Hair Colour
                                Enhancement / Pedipei
                                Manicure & Pedicure / Tan
                                Removal Treatment / Enrich
                                Hair Spa / Perfection
                                Brightening Face
                                Treatments
                                On Wedding Makeup') ?>
                            </p>
                            <span class="price">₹ 6999/-</span>
                        </li>
                        <li>
                            <h4>LUXE LIVING</h4>
                            <p>
                                <?php echo nl2br('Pre Wedding first Session
                                Hair styling / root hair colour
                                enhancement / alga manicure
                                & pedicure / tan removal
                                treatment / Moroccanoil hair
                                spa treatment / stem cellogist
                                facetreatment
                                Pre Wedding Second Session
                                Royal shave or beard trim /
                                Power essencious face mask / hydra face
                                treatment
                                On Wedding MakeUP') ?></p>
                            <span class="price">₹ 9999/-</span>
                        </li>
                        <li>
                            <h4>LUXE LIVING</h4>
                            <p><?php echo nl2br('Pre Wedding First Session
                                Hair styling & Rescue Repair
                                Treatment / Root Hair Colour
                                Enhancement / Perfection
                                Brightening Face Treatment
                                Pre Wedding Second Session
                                Royal Shave or Beard Trim /
                                Tan Removal Treatment /
                                Intense Alchemy Moroccanoil Hair Sp \a
                                Treatment / Express
                                Glow Face Treatment
                                With Gold Mask
                                Pre Wedding Third Session
                                Signature Treatment
                                (German) / Alga Manicure
                                & Pedicure / Tan Removal Treatment
                                On Wedding
                                Power essencious face Mask / Makeup') ?>
                            </p>
                            <span class="price">₹ 14999/-</span>
                        </li>
                    </ul>
                </div>
            </div>
            
<!--            <div class="col-lg-4 col-md-12 sm-padding">
                <div class="price_wrap">
                    <h3>Face Masking</h3>
                    <ul class="price_list">
                        <li>
                            <h4>White Facial</h4>
                            <p>Barber is a person whose occupation is mainly to cut dress groom style and shave men.</p>
                            <span class="price">$8</span>
                        </li>
                        <li>
                            <h4>Face Cleaning</h4>
                            <p>Barber is a person whose occupation is mainly to cut dress groom style and shave men.</p>
                            <span class="price">$9</span>
                        </li>
                        <li>
                            <h4>Bright Tuning</h4>
                            <p>Barber is a person whose occupation is mainly to cut dress groom style and shave men.</p>
                            <span class="price">$10</span>
                        </li>
                    </ul>
                </div> 
            </div>-->
        </div>
    </div>
</section><!-- /. pricing_section -->

<section class="booking_term_condition padding single_item">
        <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h4>CONDITION & INFORMATION</h4>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="text-justify small">
                    <strong>Advance Booking</strong><br/>
We enthusiastically suggest book your services in advance so that the services could accessible at your favored time.
<br/>
Salon Arrival<br/>
We suggest that you arrive at the salon reception 15 minutes before on your planned appointment for a short consultation about your services / treatments.
<br/>
Health Conditions<br/>
Please tell us always about your health condition so that things like allergies, infections or injuries etc. could not affect the delivery of our service.
<br/>
Salon Treatment Products<br/>
Full range of all items are accessible at the reception area of Empire, it would be ideal if you inquire at reception regarding your necessity.
                </p>
            </div>
        </div>
    </div>
</section>



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