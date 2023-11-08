<?php
error_reporting(E_ALL);
include_once './includes/config.php';
include_once './includes/database.php';
/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */


                $page_id = $_SERVER['HTTP_REFERER'];
                $last_visit = base64_decode($_POST['last_visit']);

                // ========================================================
                // get all coupons that suits this user
                // ========================================================


                $check_coupons_sql = "SELECT * from coupons"; 
$count = 1;
$coupon_table = '<table class="table table-bordered table-striped">'
        . '<thead>'
        . '<tr>'
        . '<th>#</th>'
        . '<th>Name</th>'
        . '<th>Code</th>'
        . '<th>Description</th>'
        . '<th>Apply</th>'
        . '</tr>'
        . '</thead>'
        . '<tbody>'
        
        ;
                $coupons = array();
if ($res = mysqli_query($link, $check_coupons_sql)) {
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $coupons[] = $row;
            $coupon_table .= '<tr>'
        . '<td>'.$count++.'</td>'
        . '<td>'.$row['name'].'</td>'
        . '<td>'.$row['code'].'</td>'
        . '<td>'.$row['description'].'</td>'
        . '<td><a class="default_btn applyCoupon" data-amount="'.$row['discount_amount'].'" id="'. base64_encode($row['id']).'" >Apply Coupon</a></td>'
        . '</tr>';
        }
        
        $coupon_table .=  '</tbody>';
        
        echo
            json_encode([
                'success' => true,
                'coupon_details' => $coupon_table,
                'msg' => 'Hooray! Coupons found.',
            ]);
        
    } else {
        // Send OTP... 
        echo
            json_encode([
                'success' => false,
                'msg' => 'No Coupons found!',
            ]);
        

    }
}

                


              
            
            
