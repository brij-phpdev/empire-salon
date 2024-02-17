<?php
include_once './includes/config.php';

$_lastUrl=$_SERVER['REQUEST_URI'];
if(empty($_lastUrl))
{
    echo 'Hack Attempt!';
    die();
}
//die;
//print_r($_GET);die;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../assets/css/style.css">
        <title>Initiate Payment API</title>
    </head>
    <body style="display: none;">

        <form method="POST" id="initiate_payment" action="easebuzz.php?api_name=initiate_payment">
                    <div class="main-form">
                        <h3>Mandatory Parameters</h3>
                        <hr>
                        <div class="mandatory-data">
                            <div class="form-field">
                                <label for="txnid">Transaction ID<sup>*</sup></label>
                                <input id="txnid" class="txnid" name="txnid" value="<?php echo generatePassword(10) ?>">
                            </div>

                            <div class="form-field">
                                <label for="amount">Amount<sup>(should be float)*</sup></label>
                                <input id="amount" class="amount" name="amount" value="<?php echo number_format( (float)base64_decode($_GET['rnAmt']) ,2, '.', ''); ?>">
                            </div>  

                            <div class="form-field">
                                <label for="firstname">First Name<sup>*</sup></label>
                                <input id="firstname" class="firstname" name="firstname" value="<?php echo $_GET['firstname'] ?>" >
                            </div>
                    
                            <div class="form-field">
                                <label for="email">Email ID<sup>*</sup></label>
                                <input id="email" class="email" name="email" value="<?php echo $_GET['email'] ?>">
                            </div>
                    
                            <div class="form-field">
                                <label for="phone">Phone<sup>*</sup></label>
                                <input id="phone" class="phone" name="phone" value="<?php echo $_GET['phone'] ?>">
                            </div>
                            
                            <div class="form-field">
                                <label for="productinfo">Product Information<sup>*</sup></label>
                                <input id="productinfo" class="productinfo" name="productinfo" value="<?php echo preg_replace('/[^a-z0-9]/i', ' ', $_GET['packageName']) ?>">
                            </div>
                    
                            <div class="form-field">
                                <label for="surl">Success URL<sup>*</sup></label>
                                <input id="surl" class="surl" name="surl" value="<?php echo SITE_URL ?>response.php">
                            </div>
                            
                            <div class="form-field">
                                <label for="furl">Failure URL<sup>*</sup></label>
                                <input id="furl" class="furl" name="furl" value="<?php echo SITE_URL ?>response.php">
                            </div>

                        </div>

                        <h3>Optional Parameters</h3>
                        <hr>
                        <div class="optional-data">

                            <div class="form-field">
                                <label for="udf1">UDF1</label>
                                <input id="udf1" class="udf1" name="udf1" value="<?php echo $_GET['booking'] ?>" placeholder="User description1">
                            </div>
                        
                            <div class="form-field">
                                <label for="udf2">UDF2</label>
                                <input id="udf2" class="udf2" name="udf2" value="<?php //echo $_GET['other_services'] ?>" placeholder="User description2">
                            </div>
                    
                            <div class="form-field">
                                <label for="udf3">UDF3</label>
                                <input id="udf3" class="udf3" name="udf3" value="" placeholder="User description3">
                            </div>
                    
                            <div class="form-field">
                                <label for="udf4">UDF4</label>
                                <input id="udf4" class="udf4" name="udf4" value="" placeholder="User description4">
                            </div>
                    
                            <div class="form-field">
                                <label for="udf5">UDF5</label>
                                <input id="udf5" class="udf5" name="udf5" value="" placeholder="User description5">
                            </div>
                            
                            <div class="form-field">
                                <label for="address1">Address 1</label>
                                <input id="address1" class="address1" name="address1" value="" 
                                placeholder="#250, Main 5th cross,">
                            </div>
                    
                            <div class="form-field">
                                <label for="address2">Address 2</label>
                                <input id="address2" class="address2" name="address2" value="" 
                                placeholder="Saket nagar, Pune">
                            </div>
                            
                            <div class="form-field">
                                <label for="city">City</label>
                                <input id="city" class="city" name="city" value="" placeholder="Pune">
                            </div>
                    
                            <div class="form-field">
                                <label for="state">State</label>
                                <input id="state" class="state" name="state" value="" placeholder="Maharashtra">
                            </div>
                    
                            <div class="form-field">
                                <label for="country">Country</label>
                                <input id="country" class="country" name="country" value="" placeholder="India">
                            </div>
                            
                            <div class="form-field">
                                <label for="zipcode">Zip-Code</label>
                                <input id="zipcode" class="zipcode" name="zipcode" value="" placeholder="123456">
                            </div>

                               <!-- <div class="form-field">
                                <label for="sub_merchant_id">Sub-Merchant ID</label>
                                <input id="sub_merchant_id" class="sub_merchant_id" name="sub_merchant_id" value="" placeholder="123456">
                            </div>

                             <div class="form-field">
                                <label for="unique_id">Unique Id</label>
                                <input id="unique_id" class="unique_id" name="unique_id" value="" placeholder="Customer unique Id">
                            </div>

                             <div class="form-field">
                                <label for="split_payments">Split payment</label>
                                <input id="split_payments" class="split_payments" name="split_payments" value="" placeholder='{ "axisaccount" : 100, "hdfcaccount" : 100}'>
                            </div> 

                              <div class="form-field">
                                <label for="show_payment_mode">Show Payment Mode</label>
                                <input id="show_payment_mode" class="show_payment_mode" name="show_payment_mode" value="" placeholder='NB,DC,CC,Debit+ATM Pin,MW,UPI,OM,EMI'>
                            </div> -->


                        </div>
                
                        <div class="btn-submit">
                            <button type="submit">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        <script type="text/javascript">
    document.getElementById('initiate_payment').submit(); // SUBMIT FORM
</script>
    </body>
    </html>
    <?php
    
    function generatePassword($length = 8) {
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $count = mb_strlen($chars);

    for ($i = 0, $result = ''; $i < $length; $i++) {
        $index = rand(0, $count - 1);
        $result .= mb_substr($chars, $index, 1);
    }
    return $result;
}