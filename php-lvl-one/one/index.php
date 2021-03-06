<?php
    $title = "Домашняя работа к уроку №1.";
    $date = date('Y');
    $h1 = $title . " Сегодня " . $date . " год.";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
</head>
<body style="font-family: monospace; font-size: 16px;">
    <?php
    $a = 5;
    $b = '05';
    echo "<div>";
    echo "<h1>$h1</h1>";
    echo "<h2>1. Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP. Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных.</h2>";
    echo "</div>";
    echo "<h2>2. *Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось: a = 2, b = 1. Дополнительные переменные использовать нельзя.</h2>";
    echo "<div>";
        $a = 1;
        $b = 2;
        echo "a = $a; b = $b | " . "[a, b] = [b, a] <br>";
        [$a, $b] = [$b, $a];
        echo "a = $a; b = $b | " . "[$a, $b] = [$b, $a] <br>";
    echo "</div>";
    echo "<div>";
        echo "<h2>3. Объяснить, как работает данный код:</h2>";
        echo "a = $a; b = $b <br>";
        echo 'var_dump($a == $b); // Почему true? <br>';
        echo "<strong>- Потому что мы сравниваем только по значению. Ноль перед числом не учитывается в десятиричной системе исчисления, а так же не учитывается тип данных</strong> <hr>";

        echo "var_dump((int)'012345'); // Почему 12345? <br>";
        echo "<strong>- Потому что ноль в начале не учитывается в десятиричной системе исчисления</strong> <hr>";

        echo "var_dump((float)123.0 === (int)123.0); // Почему false? <br>";
        echo "<strong>- Потому что мы сравниваем не только значение, но и два разных типа данных</strong> <hr>";

        echo "var_dump((int)0 === (int)'hello, world'); // Почему true? <br>";
        echo "<strong>- Потому что мы переобразовываем string в int, если в string нет никаких числовых значений, то будет ноль</strong>";
    echo "</div>";
    ?>
</body>
</html>