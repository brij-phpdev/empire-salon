<?php

include_once 'database.php';

function getServicesAndTotalAmount($other_services, $link, $only_amount = false) {
    /**
     * getting total price of selected services..
     */
    $services_amount_list = array();

    $other_services_array = unserialize($other_services);
    $service_str = '';
    foreach ($other_services_array as $other_services_arr):
        if(!empty($other_services_arr))
        $service_str .= (base64_decode($other_services_arr)) . ",";
    endforeach;

    $service_str = substr($service_str, 0, -1);

    $service_amount_qry = "SELECT title, service_id, service_code, price, member_price FROM `servicetable` WHERE `id` IN ($service_str) ORDER BY `id` DESC";
//    echo $service_amount_qry;die;
    $res = mysqli_query($link, $service_amount_qry);
//    echo $service_amount_qry;echo "<br/>";var_dump($res);die;
    if ($res = mysqli_query($link, $service_amount_qry)) {
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $services_amount_list[] = $row;
            }
        }
    }

    if ($only_amount == true) {
//        echo "<pre>";print_r($services_amount_list);echo "</pre>";
        $member_price_total = array_sum(array_column($services_amount_list, 'member_price'));
        $price_total = array_sum(array_column($services_amount_list, 'price'));
        // for now we are applying simple logic which means.. if the offer price is present.. then total will be offer price otherwise actual price
        if ($member_price_total < $price_total) {
            return $member_price_total;
        } else {
            return $price_total;
        }
    }

    return $services_amount_list;
}