<?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'emploeers');
    $connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//    if (!$connect) {
//        echo "something went wrong";
//    } else {
//        echo "all 200";
//    }
?>
