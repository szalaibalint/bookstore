<?php
    $db_server = "localhost";
    $db_user = "bms";
    $db_pass = "";
    $db_name = "bms";
    $conn = "";

    try{
        $conn = mysqli_connect($db_server, 
        $db_user, 
        $db_pass, 
        $db_name);
    }
    catch(mysqli_sql_exception){
        echo"error";
    }
?>