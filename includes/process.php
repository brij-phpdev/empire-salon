<?php

include_once 'functions.php';

//echo "<pre>";
//print_r($_POST);
//print_r($_FILES);
//
//print_r($_SERVER);
//print_r($_SESSION);
//echo "</pre>";


//die;

if(!empty($_POST['ps_str_task']) && ($_SESSION['ps_str_task']==$_POST['ps_str_task'])){
    
    
    // switch in case of job or franchise to manage all requests
    $path = pathinfo($_SERVER['PHP_SELF']);
    
    $task = $path['filename'];
    var_dump($task);

    switch ($task) {
        case 'jobs':
            echo 'we are here';
            saveJobsForm($_POST);die;
            break;

        default:
            die('hack attempt!');
            break;
    }
}

// so that it won't get changed after post request..
$ps_str_task = $_SERVER['UNIQUE_ID'];
$_SESSION['ps_str_task'] = $ps_str_task;
