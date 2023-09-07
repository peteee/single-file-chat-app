<?php 
    //// Displaying errors
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);

    $host = "localhost";
    $user = "dbuser";
    $password = "dbpass";
    $db_name = "chat_app";

    $db = mysqli_connect($host, $user, $password, $db_name);

    // Turn on extended character sets for Emoji support
    $db->set_charset("utf8mb4");

    if($db->connect_error) {
        die('Connection Error ('.$db->connect_errno.') '.$db->connect_error);
    }
    // else {
    //     echo "YAY";
    // }

?>
