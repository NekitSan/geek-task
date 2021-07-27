<?php
    const HOST_DATABASE = "localhost";
    const LOGIN_DATABASE = "select";
    const PASS_DATABASE = "1234";

    const DATABASE_OPTIONS = "php_lvl_1";
    const DATABASE_ODRERS = "php_lvl_1_shop";

    if($truePass == true)
    {
        $connect = mysqli_connect(HOST_DATABASE, LOGIN_DATABASE, PASS_DATABASE, DATABASE_OPTIONS);
        $connect->query("SET NAMES 'utf8' ");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }
    if($truePass == false)
    {
        $connect = mysqli_connect(HOST_DATABASE, LOGIN_DATABASE, PASS_DATABASE, DATABASE_ODRERS);
        $connect->query("SET NAMES 'utf8' ");
        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    