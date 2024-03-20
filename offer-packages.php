<?php
include_once( './includes/header.php' );
include_once( './includes/database.php' );
?>

<section class="page_header d-flex align-items-center">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>The Empire Salon</h3>
            <h2>Offer Packages</h2>

        </div>
    </div>
</section><!--/. page_header -->

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
<?php
$package_array = array();
$packagetable_sql = "SELECT * FROM `service_cat_table` WHERE id ='43' "; // fixed on 9th Nov to call only bride gallery

if ($packagetable_res = @mysqli_query($link, $packagetable_sql)) {

    if (@mysqli_num_rows($packagetable_res) > 0) {
        while ($packagetable_row = @mysqli_fetch_assoc($packagetable_res)) {
            $package_array[] = $packagetable_row;
        }
    }
}
?>

<section class="pricing_section bg-grey bd-bottom padding" style="display: none;">
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
                                <?php echo html_entity_decode(nl2br($package_service['description'])) ?>
                            </p>
                            <span class="price">₹ <?php echo $package_service['member_price'] ?>/-</span>
                            <b><i>Regular Price:</i></b> <span class="text-danger org-price">₹ <strike><?php echo $package_service['price'] ?></strike>/-</span>
                            
                        </li>
                        <li>
                            <a href="book.php?rndId=<?php echo base64_encode($package_service['member_price'])?>&packageId=<?php echo base64_encode($package_service['id']) ?>&packageName=<?php echo urlencode($package['cName']. ' - ' .$package_service['title']) ?>&rndId=<?php echo base64_encode(ceil($package_service['member_price']/2)) ?>" class="default_btn">Book an Appointment</a>
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

<section class="booking_term_condition padding single_item small" style="display: none;">
        <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h4>CONDITION & INFORMATION</h4>
        </div>
        <div class="row">
            <div class="col-12">
                
                    <strong>Valentine's Pampering</strong><br/>


                    <b>Offer:</b> 
                <p class="text-justify ">    Enjoy a luxurious pampering experience for you and your loved one at our salon, coupled with high-quality wellness products for grooming.
                </p>
<br/>
<b>Package Includes:</b>
                <ol class="text-small">
                     <li><b>⁠Pampering day :</b> Indulge in a relaxing scalp massage or facial treatment.</li>
                    <li><b>⁠Personalized Grooming Services:</b> Choose from a range of grooming services a tailored to your needs, including hair styling, manicure, pedicure, and more.</li>
                    <li><b>⁠Complimentary Gift:</b> Receive a complimentary luxury wellness product from our exclusive collection to continue your pampering experience.</li>
                </ol>
<br/>
<b>Discount Coupons:</b>
<ul style="list-style: inside;">
                        <li><i class="text-danger">20% off</i> the total price for the <span class="bg-danger text-white">Valentine's Day Pampering Package.</span></li>
                        <li>Additional <span class="text-danger">10% off</span> when purchasing any wellness product from our website.</li>
                    </ul>

<b>Validity:</b> 
<p class="text-justify">Offer valid for bookings made between <u>February 10<sup>th</sup></u> to <u>February 20<sup>th</sup>, 2024</u>.</p>

<b>How to Redeem:</b>
                    <ol class="text-justify">
                        <li>⁠Visit our website and book your appointment for the Valentine's Day Pampering Package.</li>
                        <li>Use the discount code <span class="text-capitalize text-white bg-success">"LOVE2024"</span> at checkout to avail the <span class="text-capitalize text-white bg-danger">20% discount</span>.</li>
                        <li>⁠Receive a unique discount coupon code via email to use for your wellness product purchase on our website.</li>
                    </ol>

<b>Terms and Conditions:</b>
<ul style="list-style: inside;">
                        <li>⁠Offer valid for new bookings only.</li>
                        <li>Cannot be combined with any other promotions or discounts.</li>
                        <li>Discount coupons for wellness products valid for one-time use only and must be redeemed by <u>February 28<sup>th</sup>, 2024</u></li>
                        <li>Subject to availability.</li>
                    </ul>
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