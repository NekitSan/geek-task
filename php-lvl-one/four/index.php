<?php
    $title = "Домашняя работа №4.";
    const DIRECTORY = "assets/images/";

    function uploadImage()
    {
        if( !isset($_FILES['userimage']['name']) )
        {
            return "<script>alert('Файл не найден!');</script>";
        }
        if( !preg_filter("/image/", "", $_FILES['userimage']['type']) )
        {
            return "<script>alert('Файл не является изображением!');</script>";
        }
        if( ($_FILES['userimage']['size'] / 1048576) > 4.0 )
        {
            return "<script>alert('Файл слишком большой!');</script>";
        }
        if( $_FILES['userimage']['error'] !== 0 )
        {
            return "<script>alert('Ошибка при загрузке изображения!');</script>";
        }
        if (move_uploaded_file($_FILES['userimage']['tmp_name'], DIRECTORY . $_FILES['userimage']['name'] )) {
            return;
        }

        return "<script>alert('Не получилось сохранить изображение!');</script>";
    }

    function outputImages()
    {
        $listImages = scandir(DIRECTORY);

        $listImages = array_filter(
            $listImages, function($file) {
                return !in_array($file, [".", ".."]);
            }
        );

        foreach ($listImages as $img) {
            echo "<a href=" . DIRECTORY . $img . " target='_blank' class='image'><img src=" . DIRECTORY . $img . " alt='Картинка для галереи'></a>";
        }
        
    }

    echo uploadImage();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <form class="form" enctype="multipart/form-data" action="index.php" method="POST">
        <label class="form__choice">
            <span class="form__choice_text">Загрузить изображение в галерею: </span>
            <input class="fornm__choice_inp" name="userimage" type="file">
        </label>
        <input class="form--button" type="submit" value="Загрузить">
    </form>
    <div class="galary">
        <?php
            echo outputImages();
        ?>
    </div>
</body>
</html>