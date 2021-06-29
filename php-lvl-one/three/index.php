<?php
    $title = "Домашняя работа к уроку №3.";

    // Задание №1
    function divisionByThree()
    {
        $i = 0;
        while ($i <= 100)
        {
            if($i % 3 == 0)
                echo "$i / 3 = " . $i / 3 . "<br>";
            $i++;
        }
    }
    
    // Задание №2
    function EvenOdd()
    {
        $i = 0;
        do
        {
            if($i == 0)
                echo "i = $i; - Ноль <br>";
            if($i % 2 == 0)
                echo "i = $i; - Четное число<br>";
            if($i % 2 != 0)
                echo "i = $i; - Нечетное число<br>";
            $i++;
        }
        while ($i <= 100);
    }

    // Задание №3

    function arrArea()
    {
        $areaName = [
            "Московская область" => ["Москва", "Зеленоград", "Клин"],
            "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
            "Тульская область" => ["Тула", "Ефремов", "Щекино"],
            "Рязанская область" => ["Рязань", "Касимов", "Скопин", "Ряжск"],
        ];

        echo count($areaName);
        
        for($i = 0; $i <= count($areaName); $i++)
        { 
            echo $areaName[$i];
            // не работает
        }
    }
    

    // Задание №4
    

    
    // Задание №5
    

    // Задание №6
    

    // Задание №7
    
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
</head>
<body style="font-family: monospace; font-size: 16px;">
    <?php
        echo "<h2>Задание #1.</h2>"; 
        // divisionByThree();

        echo "<h2>Задание #2.</h2>";
        // EvenOdd();

        echo "<h2>Задание #3.</h2>";
        arrArea();

        echo "<h2>Задание #4.</h2>";

        echo "<h2>Задание #5.</h2> ";

        echo "<h2>Задание #6.</h2> ";

        echo "<h2>Задание #7.</h2> ";
    ?>
</body>
</html>