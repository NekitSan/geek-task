<?php
    const HOST_DATABASE = "localhost";
    const LOGIN_DATABASE = "select";
    const PASS_DATABASE = "1234";
    const NAME_DATABASE = "php_lvl_1";

    $connect = mysqli_connect(HOST_DATABASE, LOGIN_DATABASE, PASS_DATABASE, NAME_DATABASE);
    
    $connect->query("SET NAMES 'utf8' ");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }