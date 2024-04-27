<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include_once './includes/header.php';
include_once 'includes/database.php';

//$_lastUrl='';
//print_r($_SERVER);
//echo $_lastUrl='';
//die;
?>
<section class="page_header d-flex align-items-center">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h3>The Empire Salon</h3>
            <h2>Make an appointment</h2>

        </div>
    </div>
</section><!--/. page_header -->

<?php
$package_array = array();
$packagetable_sql = "SELECT * FROM `service_cat_table` WHERE id NOT IN (1,2,43) ORDER BY id DESC"; //WHERE id=3

if ($packagetable_res = @mysqli_query($link, $packagetable_sql)) {

    if (@mysqli_num_rows($packagetable_res) > 0) {
        while ($packagetable_row = @mysqli_fetch_assoc($packagetable_res)) {
            $package_array[$packagetable_row['id']] = $packagetable_row['cName'];
        }
    }
}
$last_visit = $_SERVER['HTTP_REFERER'] ?? '';
?>


<!--<section id="gallery" class="gallery_section bg-grey bd-bottom padding">

</section>-->
<!--<section class="service_section pricing_section bg-grey padding">-->
<section id="gallery" class="gallery_section bg-grey bd-bottom padding">
    <div class="container">
        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
            <h2>Book our Services</h2>

        </div>





        <div id="step-1" >



            <div class="contact-form">

                <?php if (isset($_GET['msg'])): ?>
                    <div class="row">
                        <div class="col-12 mb-20">
                            <div class="padding-10 bg-grey text-<?php echo isset($_GET['type']) ? $_GET['type'] : 'success' ?>">
                                <script type="text/javascript">
                                    alert("<?php echo isset($_GET['msg']) ? $_GET['msg'] : '' ?>");
                                </script>
                                <?php echo isset($_GET['msg']) ? $_GET['msg'] : '' ?>
                            </div>
                        </div>
                    </div>
                    <hr/>
                <?php endif; ?>

                <form name="bookForm" id="ajax_form_1" class="form-horizontal" method="post" action="booking_post.php">



                    <?php
                    if (isset($_GET['packageId']) && isset($_GET['packageName'])) {
                        ?>

                        <div class="price_wrap">
                            <!--<h3 class="s2">Selected Package/Services</h3>-->
<!--                            <div class="text-success bg-grey padding-10"><?php echo $_GET['packageName'] ?></div>-->
                            
                            
                           <?php 
//                                include_once 'cart.php';
                           ?> 
                            
                            <br>
                        </div>
                        <?php
                        // price logic
//                        $amt = base64_decode($_GET['rndId']);
//                        $price_to_pay = 5000;
//                        if ($amt < 10000) {
//                            // less than 10,000
//                            $price_to_pay = ceil(($amt * 25 ) / 100);
//                        }
//                        if ($amt < 5000) {
//                            $price_to_pay = $amt;
//                        }
////                                $price_to_pay = $package_price;
////                                echo $price_to_pay;
                        ?>
                    <!--<p><small>Please pay a token amount to <i><u>secure your slot</u></i>: </small>₹ <?php echo $price_to_pay ?>.00/-</p>-->
                        <?php
                    } else {
                        ?>
                        <input type="hidden" id="rnIdVal" name="rnId" value="" />
                        <input type="hidden" id="rnKId" name="rnKId" value="0" />
                        <input type="hidden" name="packageName" id="packageName" value="" />
                        <div class="row" style="display: none;">
                            <h3>Shopping Cart</h3>
                            <div class="col-12">
                                <?php 
//                                                        print_r($_SESSION['cart_item']);
//                                if(!empty($_SESSION['cart_item']) && count($_SESSION['cart_item'])): ?>
                                <div class="cart_div">
                                    <?php // include_once './ajax_cart.php'; ?>
                                </div>
                    <?php if(!empty($_SESSION['cart_item'])): ?>
<!--                                <p>Your cart is empty</p>
                                <hr class="padding-10" width="100%">    -->
                    <?php // endif; ?>
                            </div>
                                </div>
                            <?php // if(isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])): ?>
                                <br/>
                                <div class="row" style="display: none;">
                                    <div class="col-12">
                                        <div class="checkout_btn_div float-right">

                                            <a href="checkout.php" class="default_btn">Proceed to checkout</a>

                                        </div>
                                    </div>
                                </div>
                                <!--<hr class="padding-10" width="100%">-->    
                    <?php endif; ?>

                                
                        
                        <div class="price_wrap_">
                            <h3 class="s2">Choose Services</h3>
                            
                            <div class="row">
                                <?php if (!empty($package_array)):
                                    ?>




                                    <div class="container pricing_section" >
                                        <ul class="gallery_filter mb-30">
                                            <!--<li class="active" data-filter="*">All</li>-->
                                            <?php
                                            foreach ($package_array as $p => $package):
//                    print_r(reset($package_array));
                                                $package_services = array();

                                                if (!empty($package)):
                                                    ?>
                                                    <li id="<?php echo str_replace(" ", "_", strtolower($package)) ?>" <?php echo (reset($package_array) == $package) ? 'class="active"' : '' ?> data-filter=".<?php echo str_replace(" ", "_", strtolower($package)) ?>"><?php echo $package ?></li>
                                                    <?php
                                                endif;
                                            endforeach;
                                            ?>

                                        </ul><!-- /.portfolio_filter -->

                                        <div class="price_wrap">

                                            <ul class="sub_category_gallery_filter gallery_filter mb-30">
        <?php
        if (!empty($package_array)):
            $service_order = 0;
//                         print_r(reset($package_array));
//                                    print_r($package_array);
            foreach ($package_array as $p => $package):

                $package_service_table_sql = "SELECT `servicetable`.`sub_category` FROM `servicetable` WHERE `category_id`=" . $p . ' GROUP BY `servicetable`.`sub_category` ASC;';
//                    echo $package_service_table_sql;die;
                if ($package_servicetable_res = @mysqli_query($link, $package_service_table_sql)) {

                    if (@mysqli_num_rows($package_servicetable_res) > 0) {
                        while ($package_service = @mysqli_fetch_assoc($package_servicetable_res)) {
                            $service_order++;
//                                    print_r($package_service);
                            $category_name = $package_array[$p];
                            $sub_category_name = $package_service['sub_category'];
//                                    echo $package;
                            if (reset($package_array) == $package):
                                ?>
                                                                        <li data-parent="<?php echo str_replace(" ", "_", strtolower($package)) ?>" class="<?php  echo ($service_order == 1) ? 'active ': ' '; echo str_replace(" ", "_", strtolower($package)) ?>" data-filter=".<?php echo str_replace(" ", "_", strtolower($sub_category_name)) ?>"><?php echo $sub_category_name ?></li>

                                                                        <?php
                                                                    else:
                                                                        ?>
                                                                        <li style="display: none;" data-parent="<?php echo str_replace(" ", "_", strtolower($package)) ?>" class="<?php echo str_replace(" ", "_", strtolower($package)) ?>" data-filter=".<?php echo str_replace(" ", "_", strtolower($sub_category_name)) ?>"><?php echo $sub_category_name ?></li>
                                                                    <?php
                                                                    endif;
                                                                }
                                                            }
                                                        }
                                                    endforeach;
                                                endif;
                                                ?>
                                            </ul>

                                            <ul class="portfolio_items price_list row">

                                                <?php
                                                if (!empty($package_array)):


                                                    foreach ($package_array as $p => $package):


                                                        $package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `category_id`=" . $p . ' ORDER BY id desc';
//                    echo $package_service_table_sql;
                                                        if ($package_servicetable_res = @mysqli_query($link, $package_service_table_sql)) {

                                                            if (@mysqli_num_rows($package_servicetable_res) > 0) {
                                                                while ($package_service = @mysqli_fetch_assoc($package_servicetable_res)) {

                                                                    $category_name = $package_array[$p];
                                                                    $sub_category_name = $package_service['sub_category'];
                                                                    ?>
                                                                    <li class="col-lg-4 col-md-4 padding-15 offset-1 single_item <?php echo str_replace(" ", "_", strtolower($sub_category_name)) ?>">

                                                                        <h5><?php echo html_entity_decode($package_service['title']) ?></h5>
                                                                        <p class="padding-10"></p>
                                                                        <!--<p><?php echo html_entity_decode($package_service['description']) ?></p>-->

                                                                        <span class="price">₹ <?php echo $package_service['price'] ?>/-</span>

                                                                        <div class="radio-img">

                            <?php
                            // price logic

                            $price_to_pay = 5000;
                            if ($package_service['price'] < 10000) {
                                // less than 10,000
                                $price_to_pay = ceil(($package_service['price'] * 25 ) / 100);
                            }
                            if ($package_service['price'] < 5000) {
                                $price_to_pay = $package_service['price'];
                            }
//                                $price_to_pay = $package_price;
//                                echo $price_to_pay;
                            ?>

                                                                            <input class="d-none" id="radio-1a-<?php echo $package_service['id'] ?>" name="serviceId[]" type="checkbox" value="<?php echo base64_encode($package_service['id']) ?>">
                                                                            <label style="" for="radio-1a-<?php echo $package_service['id'] ?>" data-pid="<?php echo base64_encode($package_service['id']) ?>" data-mid="<?php echo $price_to_pay ?>" data-package="<?php echo html_entity_decode($package_service['title']) ?>" class="default_btn book-service">Book Service</label>
                                                                            <!--<a class="default_btn" href="cart.php?action=add&packageId=<?php echo base64_encode($package_service['id']) ?>" title="Click to reveal" >Book Service</a>-->
                                                                        </div>
                                                                    </li>

                                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            endforeach;

                                                        endif;
                                                        ?>
                                            </ul>
                                        </div>
                                    </div>



                                                <?php
//            endforeach;
                                            endif;
                                            ?>


                            </div>
                        </div>
                            <?php } ?>

                    <div class="spacer-single"></div>

                    <!-- step 2 -->

                    <!--<div class="row" >-->
                    <!--                                        <div class="col-lg-6 ">
                                                                <h3 class="s2">Choose Staff</h3>
                    
                                                                <div class="de_form de_radio">
                                                                    <div class="radio-img">
                                                                        <input id="radio-1a" name="Staff" type="radio" value="Steven" checked="checked">
                                                                        <label for="radio-1a"><img src="images/team/1.jpg" alt="">Steven</label>
                                                                    </div>
                    
                                                                    <div class="radio-img">
                                                                        <input id="radio-1b" name="Staff" type="radio" value="Huey">
                                                                        <label for="radio-1b"><img src="images/team/2.jpg" alt="">Huey</label>
                                                                    </div>
                    
                                                                    <div class="radio-img">
                                                                        <input id="radio-1c" name="Staff" type="radio" value="Harry">
                                                                        <label for="radio-1c"><img src="images/team/3.jpg" alt="">Harry</label>
                                                                    </div>
                    
                                                                    <div class="radio-img">
                                                                        <input id="radio-1d" name="Staff" type="radio" value="Axe">
                                                                        <label for="radio-1d"><img src="images/team/4.jpg" alt="">Axe</label>
                                                                    </div>
                                                                </div>
                                                            </div>-->

                    <hr class="padding-10" width="100%">
                    
                    
                    
                    
                    

                    <!--</div>-->

                    

                    
<!--                    <div class="form-group row" >
                        <div class="col-md-12">
                            <label for="adultsVal">Apply Coupon</label>
                            <a id="getCoupons" class="default_btn">Find Coupons</a>
                            <div id="coupons_applied" class=""></div>
                            <div id="coupons_data" class="table-responsive"></div>
                        </div>

                    </div>-->

                    


                </form>
            </div>





        </div>






    </div>
</section>


<!-- content close -->
<?php
include_once './includes/footer.php';
?>
