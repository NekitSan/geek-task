<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="../assets/css/nullstyle.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul class="menu">
                <li class="menu__item">
                    <a href="admin-panel.php" class="menu__link">Главная</a>
                </li>
                <li class="menu__item">
                    <a href="admin-panel.php?page=admin-panel--add" class="menu__link">Добавить товар</a>
                </li>
                <li class="menu__item">
                    <a href="../catalog.php" class="menu__link">>>Каталог товаров<< </a>
                </li>
                <li class="menu__item">
                    <a href="../login.php?option=exit" class="menu__link">Выход</a>
                </li>
            </ul>
        </nav>
    </header>

    