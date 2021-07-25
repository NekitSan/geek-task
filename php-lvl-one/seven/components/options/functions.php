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
                    case 'log':
                        $title = "Авторизацмя";
                    break;
                    case 'reg':
                        $title = "Регистрация";
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
        $result = mysqli_query($connect, $sql); 
    
        if (!$result)
            echo "Error: " . $sql . "<br>" . mysqli_error($connect);
        else
            return $result; 
    } 

    function processingLines($requie)
    {
        global $connect;
    
        return mysqli_real_escape_string($connect, htmlspecialchars(strip_tags($requie)));
    }

    function echoScript($text)
    {
        return "<script>alert('$text');</script>";
    }
    function trueLogin($input)
    {
        $input = $input ?? null;
        if($input != null && $_GET['option'] == "")
            exit("<meta http-equiv='refresh' content='0; url= catalog.php'>");
    }


    function addTocartAction()
    {
        $itemId = isset($_GET['id']) ? $_GET['id'] : null;
        if(!$itemId)
            return false;

        if( isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false )
        {
            $_SESSION['cart'][] = $itemId;
            $_SESSION['count'] = count($_SESSION['cart']);
        }
    }
?>