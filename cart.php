<?php
session_start();
include_once './includes/config.php';
include_once './includes/database.php';

//$packagetable_sql = "SELECT * FROM `service_cat_table` WHERE id NOT IN (1,2,43) ORDER BY id DESC"; //WHERE id=3
//
// ($packagetable_res = @mysqli_query($link, $packagetable_sql)) 
//echo "<pre>";
if(isset($_GET['action']) && !empty($_GET['action'])){
    
    $action = $_GET['action'];
    
//    var_dump($_GET);
//    print_r($_GET);
//    print_r($action);
//    print_r($_SESSION);  
//    die;
    if($action=='remove'){
//        $remove_code = base64_decode($_GET['packageId']);
        // remove items from cart..
        if(!empty($_SESSION["cart_item"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
//                    echo base64_decode($_GET["code"]);
//                    echo ($k);
//                    print_r($v);die;
			if(base64_decode($_GET["code"]) == $v['code'])
				unset($_SESSION["cart_item"][$k]);
			if(empty($_SESSION["cart_item"]))
				unset($_SESSION["cart_item"]);
                        $status = 'success';
                        $msg = "Item removed from the cart successfully!";
		}
	}
    }elseif($action=='add'){
        
    

//if (isset($_GET['packageId']) && isset($_GET['packageName'])) {
        
        $productByCodeQry = "SELECT id, id as code,service_id, service_code, category_id, sub_category, title, offer_img_front, image, price, member_price FROM servicetable WHERE id='" . base64_decode($_GET["packageId"]) . "'";
//        echo $productByCodeQry;
//        die;
        $package_array = array();
        if($package_servicetable_res = @mysqli_query($link, $productByCodeQry)){
            // allow only if service id exists..
            while ($package_servicetable_row = @mysqli_fetch_assoc($package_servicetable_res)) {

                $package_array[] = $package_servicetable_row;
            }
        }
//        print_r($package_array);
//        die;
        $cart_code_arr = array_column($_SESSION['cart_item'],'code');
//        print_r($cart_code_arr);
//        print_r($_SESSION["cart_item"]);
//        die;

        if(!empty($_SESSION["cart_item"])) {
                if(in_array($package_array["code"],$cart_code_arr)) {
                    echo "in case of existing";
                        foreach($_SESSION["cart_item"] as $k => $v) {
//                            echo $k;
//                            var_dump($v);
//                            print_r($package_array);die;
                                        if($package_array["code"] == $v['code']) {
                                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                                    $_SESSION["cart_item"][$k]["quantity"] ++;
//                                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
//                                                }else{
//                                                    $_SESSION["cart_item"][$k]["quantity"] = 1;
                                                }
                                                
                                        }
                        }
                } else {
//                    echo 'adding';die;
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$package_array);
                }
        } else {
            
                $_SESSION["cart_item"] = $package_array;
        }
//        print_r($_SESSION);
//        die;
        $status = 'success';
        $msg = "Item added to the cart successfully!";
    }
}
//echo "</pre>";
if(!empty($_GET['ajax']) && $_GET['ajax']=="true"){
//    die('yes we are here brok.. where we are returning ajax response');
    echo json_encode(array('status'=>$status,'msg'=>$msg));
    die;
}
header("location: checkout.php");

?>
