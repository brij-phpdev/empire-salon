<?php
include_once( './includes/header.php' );
include_once( './includes/database.php' );
?>

<section class="page_header d-flex align-items-center">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>The Empire Salon</h3>
            <h2>Groom Packages</h2>

        </div>
    </div>
</section><!--/. page_header -->

<section id="gallery" class="gallery_section bg-grey bd-bottom padding d-none">
    <div class="container">
        
        <ul class="portfolio_items row">

            <li class="col-lg-6 col-sm-6 padding-15 single_item branding">
                <figure class="portfolio_item">
                    <img src="<?php echo convertImgToBase64('img/bridal-makeover/1-small.png') ?>" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="<?php echo convertImgToBase64('img/bridal-makeover/1.png') ?>') ?>" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>

            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="<?php echo convertImgToBase64('img/bridal-makeover/6-small.jpg') ?>" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="<?php echo convertImgToBase64('img/bridal-makeover/6.jpg') ?>" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="<?php echo convertImgToBase64('img/bridal-makeover/3-small.jpg') ?>" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="<?php echo convertImgToBase64('img/bridal-makeover/3.jpg') ?>" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="<?php echo convertImgToBase64('img/bridal-makeover/4-small.jpg') ?>" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="<?php echo convertImgToBase64('img/bridal-makeover/4.jpg') ?>" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-3 col-sm-6 padding-15 single_item photo">
                <figure class="portfolio_item">
                    <img src="<?php echo convertImgToBase64('img/bridal-makeover/5-small.jpg') ?>" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="<?php echo convertImgToBase64('img/bridal-makeover/5.jpg') ?>" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
            <li class="col-lg-6 col-sm-6 padding-15 single_item branding branding">
                <figure class="portfolio_item">
                    <img src="<?php echo convertImgToBase64('img/bridal-makeover/7-small.jpg') ?>" alt="Portfolio Item">
                    <figcaption class="overlay">
                        <a href="<?php echo convertImgToBase64('img/bridal-makeover/7.jpg') ?>" class="img_popup"></a>
                    </figcaption>
                </figure>
            </li>
        </ul><!-- /.portfolio_items -->
    </div>
</section><!-- /. gallery_section -->


<?php
$package_array = array();
$packagetable_sql = "SELECT * FROM `service_cat_table` WHERE id ='2' "; // fixed on 9th Nov to call only groom gallery

if ($packagetable_res = @mysqli_query($link, $packagetable_sql)) {

    if (@mysqli_num_rows($packagetable_res) > 0) {
        while ($packagetable_row = @mysqli_fetch_assoc($packagetable_res)) {
            $package_array[] = $packagetable_row;
        }
    }
}
?>

<section class="pricing_section bg-grey bd-bottom padding">
    <div class="container contact-form" id="">
        <div class="row">
            <?php if(!empty($package_array)): 
                
                foreach($package_array as $package):
                
                $package_services = array();
            
                if(!empty($package)):

                    $package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `category_id`=".$package['id'];
//                    echo $package_service_table_sql;
                    if ($package_servicetable_res = @mysqli_query($link, $package_service_table_sql)) {

                        if (@mysqli_num_rows($package_servicetable_res) > 0) {
                            while ($package_servicetable_row = @mysqli_fetch_assoc($package_servicetable_res)) {
                                $package_services[] = $package_servicetable_row;
                            }
                        }
                    }
                    endif;
                ?>
            
            
            <div class="col-lg-8 offset-2 col-md-6 sm-padding">
                <div class="price_wrap">
                    <h3><?php echo $package['cName'] ?></h3>
                    <ul class="price_list">
                        <?php 
                        foreach($package_services as $package_service):
                            
                        ?>
                        <li>
                            <h4><?php echo strtoupper($package_service['title']) ?></h4>
                            <p>
                                <?php echo html_entity_decode($package_service['description']) ?>
                            </p>
                            <span class="price">₹ <?php echo $package_service['price'] ?>/-</span>
                        </li>
                        <li>
                            <a href="book.php?packageId=<?php echo base64_encode($package_service['id']) ?>&packageName=<?php echo urlencode($package['cName']. ' :: ' .$package_service['title']) ?>" class="default_btn">Book an Appointment</a>
                        </li>
                        <?php 
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
            <?php 
            endforeach;
            endif; ?>
            
            
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