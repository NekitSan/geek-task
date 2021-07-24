<?php
    function joinContent($body, $key)
    {
        $default_dir = "components/elements/";
        $modify_dir = $default_dir . "content/";

        switch($body)
        {
            case 'header':
                switch($key)
                {
                    case 'catalog':
                        $title = "Каталог товаров";
                    break;
                    case 'tovar':
                        $nameProduct = ($_GET['nametovar']!="") ? processingLines( $_GET['nametovar'] ) : "не задан";
                        $title = "Товар - " . $nameProduct;
                    break;
                    default:
                        $title = "Домашняя работа №6";
                    break;
                }

                $req = require_once($default_dir. "header.php");
            break;
            case 'footer':
                $req = require_once($default_dir. "footer.php");
            break;
            case 'catalog':
                $req = require_once($modify_dir . "catalog.php");
            break;
            case 'product':
                $req = require_once($modify_dir . "product.php");
            break;
        }
    }
    function requestInDataBase($sql)
    {
        global $connect;
    
        if (!mysqli_query($connect, $sql))
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        else
            return mysqli_query($connect, $sql); 
    } 

    function processingLines($requie)
    {
        global $connect;
    
        return mysqli_real_escape_string($connect, htmlspecialchars(strip_tags($requie)));
    }

?>