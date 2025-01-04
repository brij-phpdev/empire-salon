<?php
    include 'config.php';
    include './includes/functions.php';
    include './includes/database.php';
    
    require './vendor/autoload.php';
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$package_info_id =478;
 $package_service_table_sql = "SELECT `servicetable`.* FROM `servicetable` WHERE `id`='".$package_info_id. "'  ORDER BY `id` DESC";
$package_info_title = 'Offer Package';
                    if ($res2 = mysqli_query($link, $package_service_table_sql)) {
                        if (mysqli_num_rows($res2) > 0) {
                            while ($row_ser = mysqli_fetch_assoc($res2)) {
//                                print_r($row_ser);die;
                                $package_info_title = $row_ser['title'];
                                $total_to_be_paid = $row_ser['member_price'];

                            }
                        }
                    }
echo $package_info_title;
echo $total_to_be_paid;