<?php
    include('functions/config.php');
    require_once('functions/upload.php');
    
    echo uploadImage($connect);
    # Поля таблици в бд - id, name, URL, view
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper wrapper--galary">
        <form class="form" enctype="multipart/form-data" action="index.php" method="POST">
            <label class="form__choice">
                <span class="form__choice_text">Загрузить изображение в галерею: </span>
                <input class="fornm__choice_inp" name="userimage" type="file">
            </label>
            <input class="form--button" type="submit" value="Загрузить">
        </form>
        <div class="galary">
            <?php
                echo outputImages($connect);
            ?>
        </div>
    </div>
</body>
</html>