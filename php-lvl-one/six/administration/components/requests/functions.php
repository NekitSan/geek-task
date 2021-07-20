<?php
function joinContent($body)
{
    $default_dir = "components/elements/";

    switch ($body) {
        case 'header':
            $title = "Админ панель";

            if($_GET['page'] == 'admin-panel--add')
                $title = "Админ панель - добавление товаров";
            if($_GET['page'] == 'admin-panel--edit')
                $title = "Админ панель - изменение данных товара";
            if($_GET['page'] == 'admin-panel--tovar')
                $title = "Админ панель - данные товара";

            $req = require_once($default_dir . "header.php");
        break;
        case 'footer':
            $req = require_once($default_dir . "footer.php");
        break;
    }
}

function insertInDataBase($sql)
{
    global $connect;

    if (!mysqli_query($connect, $sql))
        echo "Error: " . $sql . "<br>" . mysqli_error($connect);
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

function breakingImage($nameFile, $typeFile)
{
    $directory = "assets/images/";

    function formatsImage($default_type)
    {
        $type = preg_filter("/image\//", "", $default_type);

        if ($type == "jpeg")
            return "jpg";
        if ($type == "x-icon")
            return "ico";
        if ($type == "svg+xml")
            return "svg";

        return $type;
    }

    function nameImage($default_name, $default_type)
    {
        $type = formatsImage($default_type);
        $name = preg_filter("/.$type/", "", $default_name);

        return $name;
    }
    
    return ["name" => nameImage($nameFile, $typeFile), "type" => formatsImage($typeFile), "url" => $directory];
}

function uploadImage($imageInfo)
{
    if( !isset($imageInfo['name']) )
    {
        $true = false;
        return "<script>alert('Файл не найден!');</script>";
    }
    if( !preg_filter("/image/", "", $_FILES['image']['type']) )
    {
        $true = false;
        return "<script>alert('Файл не является изображением!');</script>";
    }
    if( ($_FILES['image']['size'] / 1048576) > 2.5 )
    {
        $true = false;
        return "<script>alert('Файл слишком большой!');</script>";
    }
    if( $_FILES['image']['error'] !== 0 )
    {
        $true = false;
        return "<script>alert('Ошибка при загрузке изображения!');</script>";
    }
    return $true = true;;
}

function abbreiatTxtAddTeg($text)
{
    if (count(preg_split('//u', $text)) > 16)
        return "<td class='text__hidden'><span>$text</span></td>";
    else
        return "<td>$text</td>";
}
