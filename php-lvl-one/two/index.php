<?php
    $title = "Домашняя работа к уроку №2.";

    // Задание №1
    function randomNumber($a, $b)
    {
        // ноль можно считать положительным числом
        if($a >= 0 && $b <= -1 || $a <= -1 && $b >= 0)
            return "$a + $b = " . ($a + $b);
        if($a >= 0 && $b >= 0)
            return "$a - $b = " . ($a - $b);
        if($a <= -1 && $b <= -1)
            return "$a * $b = " . ($a * $b);
    }

    // Задание №2
    function outNumber($a)
    {
        $arr = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];

        switch($a)
        {
            case 0:
                echo $arr[0] . " ";
            case 1:
                echo $arr[1] . " ";
            case 2:
                echo $arr[2] . " ";
            case 3:
                echo $arr[3] . " ";
            case 4:
                echo $arr[4] . " ";
            case 5:
                echo $arr[5] . " ";
            case 6:
                echo $arr[6] . " ";
            case 7:
                echo $arr[7] . " ";
            case 8:
                echo $arr[8] . " ";
            case 9:
                echo $arr[9] . " ";
            case 10:
                echo $arr[10] . " ";
            case 11:
                echo $arr[11] . " ";
            case 12:
                echo $arr[12] . " ";
            case 13:
                echo $arr[13] . " ";
            case 14:
                echo $arr[14] . " ";
            case 15:
                echo $arr[15];
            break;
        }
    }

    // Задание №3
    function mathOperationAddition($a, $b)
    {
        return $a + $b;
    }
    function mathOperationDeduction($a, $b)
    {
        return $a - $b;
    }
    function mathOperationMultiplication($a, $b)
    {
        return $a * $b;
    }
    function mathOperationDivision($a, $b)
    {
        return ($b != 0) ? $a / $b : "На ноль делить нельзя!";
    }

    // Задание №4
    function mathOperation($arg1, $arg2, $operation)
    {
        switch($operation)
        {
            case '+':
                return $arg1 + $arg2;
            case '-':
                return $arg1 - $arg2;
            case '*':
                return $arg1 * $arg2;
            case '/':
                return ($arg2 != 0) ? $arg1 / $arg2 : "На ноль делить нельзя!";
        }
    }

    
    // Задание №5
    function getYear()
    {
        echo "Сегодняшняя дата: " . getdate()["year"] . " или " . date('Y') . " или " . date('y');
    }

    // Задание №6
    function power($val, $pow)
    {
        if($pow > 0)
            return ($pow == 1) ? $val : $val * power($val, $pow - 1); 
        else if($pow == 0)
            return $val = 1; 
        else
        {
            $pow *= -1;
            if($val == 0)
                return "<span style='display: inline-block; font-size: 20px; transform: rotate(90deg);'>8</span> или бесконечность";
            return ($pow == 1) ? 1 / $val : 1 / ($val * power($val, $pow - 1)); 
        } 

	}

    // Задание №7
    function currentTime()
    {
        $wordHour = " час";
        $wordMinute = " минут";

        $currentHour = date('H');
        $currentMinute = date('i');

        switch($currentHour)
        {
            case 0:
            case 5:
            case 6:
            case 7:
            case 8:
            case 9:
            case 10:
            case 11:
            case 12:
            case 13:
            case 14:
            case 15:
            case 16:
            case 17:
            case 18:
            case 19:
            case 20:
                $wordHour .= "ов";
            break;
            case 2:
            case 3:
            case 4:
            case 22:
            case 23:
                $wordHour .= "а";
            break;
        }

        if($currentMinute != 11 && $currentMinute != 12 && $currentMinute != 13 && $currentMinute != 14)
        {
            $tempArray = str_split($currentMinute);
            
            switch($tempArray[1])
            {
                case 1:
                    $wordMinute .= "а";
                break;
                case 2:
                case 3:
                case 4:
                    $wordMinute .= "ы";
                break;
            }
        }
        
        echo "Текущее время: " . $currentHour . $wordHour . " " . $currentMinute . $wordMinute;
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
</head>
<body style="font-family: monospace; font-size: 16px;">
    <?php
        $a = rand(-99, 99); $b = rand(-99, 99);
        echo "<h2>Задание #1.</h2>" . "a = $a; b = $b; <br>" . randomNumber($a, $b);

        $a = rand(0, 15);
        echo "<h2>Задание #2.</h2>" . "a = $a; <br>";
        outNumber($a) . "<br>";

        $a = 5; $b = 5;
        echo "<h2>Задание #3.</h2>" . 
            "Операция сложение: $a + $b = " . mathOperationAddition($a, $b) . "<br>" .
            "Операция вычитание: $a - $b = " . mathOperationDeduction($a, $b) . "<br>" . 
            "Операция умножение: $a * $b = " . mathOperationMultiplication($a, $b) . "<br>" . 
            "Операция деление: $a / $b = " . mathOperationDivision($a, $b);

        $a = 30; $b = 15; $oper = "/";
        echo "<h2>Задание #4.</h2> $a $oper $b = " . mathOperation($a, $b, $oper);

        echo "<h2>Задание #5.</h2> ";
        getYear();

        echo "<h2>Задание #6.</h2> ";
        $val = 2; $pow = -2;
        echo "$val<sup>$pow</sup> = " . power($val, $pow);

        echo "<h2>Задание #7.</h2> ";
        currentTime();
    ?>
</body>
</html>