<?php
include_once './includes/header.php';
include_once './includes/process.php';
include_once './includes/functions.php';

?>


<!-- content begin -->
<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <section class="page_header d-flex align-items-center">
		    <div class="container">
		        <div class="section_heading text-center mb-40 wow fadeInUp" data-wow-delay="300ms">
                   <h3>My Orders</h3>
<!--                   <h2>Career at Empire</h2>-->
                   
                </div>
		    </div>
		</section><!--/. page_header -->


    
    <section class=" jarallax">
                <div class="de-gradient-edge-top"></div>
                
                <div class="container position-relative z1000">
                    <div class="row gx-5">

<!--                        <div class="col-lg-4">
                            
                        </div>-->
                        <div class="col-lg-12">

                            
                            <div class="d-sch-table">
                                <!--<h2 class="wow fadeIn text-center">Login</h2>-->
                                <h2 class="wow fadeIn text-center" style="font-size: 22px!important;">Welcome!</h2>
                                <div class="de-separator"></div>
                                <p class="lead text-center">

                                </p>
                                <div class="contact-form row">
                                    
                                <div class="right_user_menu col-lg-4">
                                    <ul class="right_user_nav">
                                    <li><a class="mail_call" href="myaccount.php">My Account</a></li>
                                    <li><a class="mail_call" href="myorders.php">My Orders</a></li>
                                    <li><a class="mail_call" href="logout.php">Logout</a></li>
                            </ul>
                            </div>
                                    <div class="account-info">
                                        <?php
                                        $user_info=$_SESSION['user_info'];

$ordertable_sql = "SELECT bt.*, st.title, st.member_price FROM `bookingtbl` as bt, servicetable as st WHERE bt.`userId` = 163 AND st.id = bt.serviceId ORDER BY bt.`userId` DESC;";

if ($ordertable_res = @mysqli_query($link, $ordertable_sql)) {

    if (@mysqli_num_rows($ordertable_res) > 0) {
        while ($ordertable_row = @mysqli_fetch_assoc($ordertable_res)) {
            $orders_array[] = $ordertable_row;
        }
    }
}            
//print_r($orders_array);die;
                                        ?>
    <h3>My Orders</h3>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Serial No</th>
                    <th>Order Number</th>
                    <th>Service</th>
                    <th>Date</th>
                    <th>Bill Amount</th>
                    <th>Amount paid</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($orders_array) && count($orders_array)): ?>
                <?php 
                $i=0;
                foreach($orders_array as $order_array): ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $order_array['id']; ?></td>
                    <td><?php echo $order_array['title']; ?></td>
                    <td><?php echo $order_array['date']; ?></td>
                    <td><?php echo CURRENCY . ' ' . number_format($order_array['serviceBill'],2); ?></td>
                    <td><?php echo CURRENCY . ' ' . number_format($order_array['booking_amount'],2); ?></td>
                </tr>
                <?php endforeach;
                endif;
                ?>
            </tbody>
            
        </table>
    </div>
</div>

<!-- You can add more account management features here -->
                                </div>
                                <div class="d-deco"></div>
                            </div>
                            </div>
                    </div>
                </div>
                <div class="de-gradient-edge-bottom"></div>
            </section>
    
    
   
 
</div>
<div class="spacer-double padding-15"></div>
<!-- content close -->

<!-- footer begin -->
<?php
include_once './includes/footer.php';
?>
