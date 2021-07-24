<?php
    // Задумка в том, что для пользователей один уровень доступа, а у админ-панели другой
    $host = "localhost";
    $login = "select";
    $pass = "1234";
    $name_bd = "php_lvl_1";

    $connect = mysqli_connect($host, $login, $pass, $name_bd);
    
    $connect->query("SET NAMES 'utf8' ");
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }