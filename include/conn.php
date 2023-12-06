<?php
    session_start();
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "codeOnline";

   //1. create connection with Database
   $connection = mysqli_connect($db_server, $db_user,$db_pass,$db_name);
    // if(!$connection){
    //     die("Connection failed".mysqli_connect_error());
    // }
    
    //2. Select the database
    // $db_select = mysqli_select_db($connection,$db_name);
    // if(!$db_select){
    //     die("connection failed".mysqli_connect_error());
    // }

?>
