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
        while ($i <= 10);
    }

    // Задание №3
    function outputAreaNamesCities()
    {
        $arrayAreaNames = [
            "Московская область" => ["Москва", "Зеленоград", "Клин"],
            "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
            "Тульская область" => ["Тула", "Ефремов", "Киреевск"],
            "Рязанская область" => ["Рязань", "Касимов", "Скопин", "Ряжск"],
        ];
        
        foreach($arrayAreaNames as $areaNames => $citiesKeys)
        {
            echo $areaNames . ": <br>";
            foreach($citiesKeys  as  $cities)
            {
                if($cities != end($citiesKeys))
                    echo $cities . ", ";
                else
                    echo $cities;
            }
            echo "<br>";
        }
    }
    
    // Задание №4
    function formattingWords($str)
    {
        $lettersRusInLat = [
            "а" => "a", 
            "б" => "b", 
            "в" => "v", 
            "г" => "g", 
            "д" => "d", 
            "е" => "e", 
            "ё" => "yo",
            "ж" => "zh", 
            "з" => "z", 
            "и" => "i", 
            "й" => "y", 
            "к" => "k", 
            "л" => "l", 
            "м" => "m",
            "н" => "n", 
            "о" => "o", 
            "п" => "p", 
            "р" => "r", 
            "с" => "s", 
            "т" => "t", 
            "у" => "u",
            "ф" => "f", 
            "х" => "h", 
            "ц" => "ts", 
            "ч" => "ch", 
            "ш" => "sh", 
            "щ" => "s'h", 
            "ъ" => "",
            "ы" => "i", 
            "ь" => "", 
            "э" => "e", 
            "ю" => "yu", 
            "я" => "ya", 
        ];

        $word = strtr($str, $lettersRusInLat);
	    return $word;	
    }
    
    // Задание №5
    function replacingSpaces($str)
    {
        return str_replace(" ", "_", $str);
    }

    // Задание №6
    function dynamicMenu()
    {
        $menu = [
            "Главаная" => "index.php",
            "Категории" => ["Фрукты" => "fruits.php",
                            "Овощи" => "veggies.php",
                            "Ягоды" => "berries.php",],
            "О нас" => ["Кто мы" => "aboutus.php",
                        "Контакты" => "contacts.php",],
            "Доставка" => "delivery.php",
            "Гарантии" => "guarantes.php",
        ];

        echo "<ul>";
        foreach($menu as $menuItem => $submenu)
        {
            if(is_array($submenu))
            {
                echo "<li> <a>$menuItem</a> <ul>";
                foreach($submenu as $submenuItem => $item)
                {
                    echo "<li> <a href='$item'>$submenuItem</a> </li>";
                }
                echo "</li> </ul>";
            }
            else
                echo "<li> <a href='$submenu'>$menuItem</a> </li>";
        }
        echo "</ul>";
    }

    // Задание №7
    function zeroToNine()
    {
        for ($i = 0; $i < 10; print $i++ . " ") {};
    }

    // Задание №8
    function searchByLetter()
    {
        $arrayAreaNames = [
            "Московская область" => ["Москва", "Зеленоград", "Клин"],
            "Ленинградская область" => ["Санкт-Петербург", "Всеволожск", "Павловск", "Кронштадт"],
            "Тульская область" => ["Тула", "Ефремов", "Киреевск"],
            "Рязанская область" => ["Рязань", "Касимов", "Скопин", "Ряжск"],
        ];
        
        foreach($arrayAreaNames as $areaNames => $citiesKeys)
        {
            $i = 0;
            echo $areaNames . ": <br>";

            foreach($citiesKeys as $cities)
            {
                if (mb_substr($cities, 0, 1) == 'К')
                    $citiesFilter[$i++] = $cities;
            }
            
            foreach($citiesFilter as $selectCities)
            {
                echo "- " . $selectCities . "<br>";
            }
        }
    }
    
    // Задание №9
    function formattingWordsReplacingSpaces($str)
    {
        return replacingSpaces( formattingWords($str) );
    }
    
    // Задание №10

    # Variant #1
    function pyramid()
    {
        $numberSymbols = 11;
        echo "<div style='text-align: center;'>";
        for($i = 0; $i < $numberSymbols; $i++)
        {
            for($k = 0; $k < $numberSymbols - $i; $k++)
            {
                echo "*";
            }
            echo '<br/>';
        }
        echo "</div>";
    }
    # Variant #2
    function pyramid2()
    {
        $numberSymbols = 11;

        for($i = 0; $i < $numberSymbols; $i++)
        {
            for($k = 0; $k < $numberSymbols + $i; $k++)
            {
                echo "&nbsp;";
            }
            for($k = 0; $k < $numberSymbols - $i; $k++)
            {
                echo "*";
            }
            for($k = 0; $k < $numberSymbols - $i - 1; $k++)
            {
                echo "*";
            }
            echo '<br/>';
        }
    }
    # Variant #3
    function pyramid3()
    {
        $numberSymbols = 11;
        
        echo '<pre>';
        for($i = 0; $i < $numberSymbols; ++$i)
        {
            echo str_repeat(" ", $numberSymbols + $i);
            echo str_repeat("*", $numberSymbols - $i);
            echo str_repeat("*", $numberSymbols - $i - 1);
            echo '<br/>';
        }
        echo '</pre>';
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
</head>
<body style="font-family: monospace; font-size: 16px; margin: 0 10px;">
    <?php
        echo "<h2>Задание #1.</h2>"; 
        divisionByThree();

        echo "<h2>Задание #2.</h2>";
        EvenOdd();

        echo "<h2>Задание #3.</h2>";
        outputAreaNamesCities();

        echo "<h2>Задание #4.</h2>";
        echo formattingWords("Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания");

        echo "<h2>Задание #5.</h2> ";
        echo replacingSpaces("Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.");

        echo "<h2>Задание #6.</h2> ";
        dynamicMenu();

        echo "<h2>Задание #7.</h2> ";
        zeroToNine();

        echo "<h2>Задание #8.</h2> ";
        searchByLetter();

        echo "<h2>Задание #9.</h2> ";
        echo formattingWordsReplacingSpaces("Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания");

        echo "<h2>Задание #10.</h2> ";
        echo "<h3>Пример №1.</h3> ";
        pyramid();
        echo "<h3>Пример №2.</h3> ";
        pyramid2();
        echo "<h3>Пример №3.</h3> ";
        pyramid3();
    ?>
</body>
</html>