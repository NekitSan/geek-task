<?php
    $title = "Домашняя работа №5";

    $host = "localhost";
    $login = "root";
    $pass = "1236";
    $name_bd = "php_lvl_1";

    $connect = mysqli_connect($host, $login, $pass, $name_bd);
    
    $connect->query("SET NAMES 'utf8' ");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }