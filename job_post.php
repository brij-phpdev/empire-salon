<?php
//error_reporting(E_ALL);
include_once './common/inc/config.php';
include_once './common/inc/database.php';

//print_r($_POST);
//die;

// lets check if user exists if not then create user first... to pick the id

    $cadidate_resume = $_FILES['cadidate_resume'];
//    var_dump($cadidate_resume['tmp_name']);
    $file_location = '/../public/resumes/'.date('Y-m-d-H-i-s-').$cadidate_resume['name'];
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



    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $experience_year = trim($_POST['experience_year']);
    $experience_month = trim($_POST['experience_month']);
    $expertise = trim($_POST['expertise']);
    $reference = trim($_POST['reference']);
    $source = trim($_POST['source']);
    $cadidate_resume = $file_location;
    
    // now insert into job_applications table..
    $insert_job_application_sql = "INSERT INTO `job_applications` "
            . "(`id`, `name`, `email`, `phone`, `experience_year`, `experience_month`, `expertise`, "
            . "`reference`, `source`, `cadidate_resume`, `created_at`) "
            . "VALUES (NULL, '$name', '$email', '$phone', '$experience_year', '$experience_month', '$expertise',"
            . " '$reference', '$source', '$cadidate_resume', current_timestamp());";
         
        
    $exe = mysqli_query($link,$insert_job_application_sql);
    if($exe){
    
        $bookingId = mysqli_insert_id($link);
    }else{
        echo "ERROR: Some error occured while booking. "
                                .mysqli_error($link); 
    }
    if($bookingId){
        echo json_encode(['result'=>'success']);
        die;
    }

     
    
?>