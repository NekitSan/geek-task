<?php
    include('functions/config.php');
    $id_image = $_GET['id'];
    $sql_image = "SELECT * FROM `galary` WHERE id = $id_image";

    $output_sql_image = mysqli_query($connect, $sql_image);
    $row_image = mysqli_fetch_array($output_sql_image);
    
    $view = $row_image['view'] + 1; 

    $upd = "UPDATE `galary` SET view = $view WHERE id = $id_image";
    mysqli_query($connect, $upd);
?>  
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="wrapper--image">
        <div class="preview">
            <img src="<?php echo $row_image['URL'] . $row_image['name']; ?>" alt="Картинка для галерее">
        </div>
        <div class="wrapper">
            <div class="panel">
                <div class="panel--text">
                    <div class="panel__back">
                        <a href="index.php">На главную >></a>
                    </div>
                    <div class="panel__view">
                        Всего просмотров: <?php echo $view ?>
                    </div>
                </div>
                <div class="panel__popular">
                    <span>Популярные сейча:</span>
                    <div class="popular__list">
                        <?php require_once('functions/popular.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>