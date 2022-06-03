<?php
    ob_start();
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL); 
    error_reporting(0);
    if(!isset($_SESSION)) {
        session_start();
    }
     $server = "localhost";
    $username = "farawayt_bpm";
    $password = "Bpm321$";
    $db_name = "farawayt_bpm";
    $port= "8888";
    $conn = new mysqli($server,$username,$password ,$db_name,$port);
    if($conn -> connect_error) {
        die("not able to connect to the data base with error" . $conn->connect_error);
    }
?>