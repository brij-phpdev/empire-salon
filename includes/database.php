<?php
//error_reporting(E_ALL);
require_once (dirname(__DIR__)).'/config.php';

$link = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME); 
$GLOBALS['db_link'] = $link;
if ($link === false) { 
    die("ERROR: Could not connect. "
                .mysqli_connect_error()); 
} 

//echo DB_HOST, DB_USER_NAME, DB_USER_PASSWORD, DB_NAME;
//die('we are in db file');