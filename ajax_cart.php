<?php
session_start();
include_once './includes/config.php';
include_once './includes/database.php';

if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
        ?>	
        <div class="table-responsive">
            <table class="table-bordered table table-striped tbl-cart" cellpadding="10" cellspacing="1">
                <thead>
                    <tr>
                        <th style="text-align:left;">Serial #</th>
                        <th style="text-align:left;">Service</th>
                        <!--<th style="text-align:left;">Code</th>-->
                        <th style="text-align:right;" width="5%">Quantity</th>
                        <th style="text-align:right;" width="10%">Unit Price</th>
                        <th style="text-align:right;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
                    </tr>	
                </thead>

                <tbody>

                    <?php
                    $i = 0;
                   
                    foreach ($_SESSION["cart_item"] as $item) {
                        $i++;
                        $quantity = isset($item["quantity"]) ? $item["quantity"] : 1;
                        $item_price = $quantity * $item["price"];
                        if (isset($item['member_price'])) {
                            // offer price
                            $item_price = $quantity * $item["member_price"];
                        }
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td>
                                <?php
                                if (!empty($item['offer_img_front'])) {
                                    $file_path = SITE_BOOK_URL . 'application/uploads/package-offers/' . $item['offer_img_front'];
                                    if (is_file($file_path)):
                                        ?>
                                        <img src="<?php echo $file_path; ?>" class="thumbnail" />
                                    <?php endif;
                                }
                                ?>
                                <?php echo $item["title"]; ?></td>
                            <!--<td><?php echo $item["code"]; ?></td>-->
                            <td class="align-right"><?php echo $quantity; // fixing it to one $qty;  ?></td>
                            <td class="align-right"><?php echo CURRENCY . " " . $item_price; ?></td>
                            <td class="align-right"><?php echo CURRENCY . " " . number_format($item_price, 2); ?></td>
                            <td class="align-center">
                                <label data-pid="<?php echo base64_encode($item['id']) ?>" data-mid="<?php echo $item_price ?>" class="default_btn remove-service">Remove</label>
                                <!--<a href="cart.php?action=remove&code=<?php echo base64_encode($item["id"]); ?>" class="remove-service btn btn-danger">Remove</a>-->
                            </td>
                        </tr>
                        <?php
                        $total_quantity += $quantity;
                        $total_price += ($item_price * $quantity);
                    }
                    ?>

                <tfoot>
                    <tr>
                        <th colspan="2" class="align-left">Total:</th>
                        <th class="align-right"><?php echo $total_quantity; ?></th>
                        <th class="align-right" colspan="2"><strong><?php echo CURRENCY . " " . number_format($total_price, 2); ?></strong></th>
                        <td></td>
                    </tr>
                </tfoot>
                </tbody>
            </table>
            <?php
                        // price logic
                        $amt = $total_price;
                        $price_to_pay = 5000;
                        if ($amt < 10000) {
                            // less than 10,000
                            $price_to_pay = ceil(($amt * 25 ) / 100);
                        }
                        if ($amt < 5000) {
                            $price_to_pay = $amt;
                        }
//                                $price_to_pay = $package_price;
//                                echo $price_to_pay;
                        ?>
            <table class="table-bordered table table-striped tbl-cart" cellpadding="10" cellspacing="1">
                <tr><td><small>Please pay a token amount to <i><u>secure your slot</u></i>: </small></td><td class="align-right"><?php echo CURRENCY . " " . number_format($price_to_pay, 2); ?></td></tr>
            </table>
            <input type="hidden" name="serviceId[]" value="<?php echo $_GET['packageId'] ?>" />
            <input type="hidden" name="rnId" value="<?php echo ($_GET['rndId']) ?>" />
            <input type="hidden" name="packageName" value="<?php echo $_GET['packageName'] ?>" />
        </div>
<hr class="padding-10" width="100%">
        <?php
    }