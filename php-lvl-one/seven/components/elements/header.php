<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/css/nullstyle.css">
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li class="menu__item">
                    <a href="catalog.php" class="menu__link">Каталог товаров</a>
                </li>
                <?php if($_SESSION['role'] == "admin") {?>
                <li class="menu__item">
                    <a href="administration/admin-panel.php" class="menu__link">Админ папнель</a>
                </li>
                <?php }?>
                <?php if($_SESSION['id'] != "") {?>
                <li class="menu__item">
                    <a href="login.php?option=exit" class="menu__link">Выход</a>
                </li>
                <?php }?>
                <?php if($_SESSION['id'] == "") {?>
                <li class="menu__item">
                    <a href="login.php" class="menu__link">Вход</a>
                </li>
                <?php }?>
            </ul>
        </nav>
    </header>