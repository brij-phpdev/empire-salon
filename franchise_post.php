<?php
//error_reporting(E_ALL);
include_once './includes/config.php';
include_once './includes/database.php';

//print_r($_POST);
//die;

// lets check if user exists if not then create user first... to pick the id

////    $cadidate_resume = $_FILES['cadidate_resume'];
////    var_dump($cadidate_resume['tmp_name']);
//    $file_location = '/../public/resumes/'.date('Y-m-d-H-i-s-').$cadidate_resume['name'];
//    echo '<br/>File location: '.($file_location);
//    echo '<br/>Dir: '. __DIR__;
//    echo '<br/>FILE: '. __FILE__;
//    echo 'tmp file: '.$cadidate_resume['tmp_name'];
//    try {
//        $upload_file = move_uploaded_file($cadidate_resume['tmp_name'], $file_location);
//        var_dump($upload_file);
////        if (move_uploaded_file($cadidate_resume['tmp'], $file_location)) {
////            echo 'file_moved';
////        }
//    } catch (Exception $exc) {
//        echo $exc->getMessage();
//    }



    $type = trim($_POST['type']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $team_size = trim($_POST['team_size']);
    $area = trim($_POST['area']);
    $property_type = trim($_POST['property_type']);
    $experience = trim($_POST['experience']);
    $other_business = trim($_POST['other_business']);
    $need_products = trim($_POST['need_products']);
    $required_training = trim($_POST['required_training']);
    $hiring_stylist = trim($_POST['hiring_stylist']);
    $your_budget = trim($_POST['your_budget']);
    $message = trim($_POST['message']);
    
    // now insert into job_applications table..
    $insert_job_application_sql = "INSERT INTO `franchise_enquiry` "
            . "(`id`, `name`, `email`, `phone`, `experience_year`, `experience_month`, `expertise`, "
            . "`reference`, `source`, `cadidate_resume`, `created_at`) "
            . "VALUES (NULL, '$name', '$email', '$phone', '$experience_year', '$experience_month', '$expertise',"
            . " '$reference', '$source', '$cadidate_resume', current_timestamp());";
         
        
    $exe = mysqli_query($link,$insert_job_application_sql);
    if($exe){
    
        $bookingId = mysqli_insert_id($link);
        mysqli_close($link);
    }else{
        echo "ERROR: Some error occured while booking. "
                                .mysqli_error($link); 
    }
    if($bookingId){
        echo "Successfully applied for the job";
//        echo json_encode(['result'=>'success']);
        die;
    }

     
    
?>