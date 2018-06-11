<?php
function task1($arr, $flag = false)
{
    if ($flag) {
        return implode($arr);
    } else {
        foreach ($arr as $value) {
            echo "<p>" . $value . "</p>" . PHP_EOL;
        }
    }
}

function task2($operator, ...$arguments)
{
    if (is_string($operator)) {
        $arg_count = count($arguments);
        $result = 0;
        switch ($operator) {
            case "+":
                for ($i = 0; $i < $arg_count; $i++) {
                    if ($i == 0) {
                        $result = $arguments[$i];
                    } else {
                        $result += $arguments[$i];
                    }
                }
                echo implode(" + ", $arguments) . " = " . $result . "<br>" . PHP_EOL;
                break;
            case "-":
                for ($i = 0; $i < $arg_count; $i++) {
                    if ($i == 0) {
                        $result = $arguments[$i];
                    } else {
                        $result -= $arguments[$i];
                    }
                }
                echo implode(" - ", $arguments) . " = " . $result . "<br>"  . PHP_EOL;
                break;
            case "*":
                for ($i = 0; $i < $arg_count; $i++) {
                    if ($i == 0) {
                        $result = $arguments[$i];
                    } else {
                        $result *= $arguments[$i];
                    }
                }
                echo implode(" * ", $arguments) . " = " . $result . "<br>"  . PHP_EOL;
                break;
            case "/":
                for ($i = 0; $i < $arg_count; $i++) {
                    if ($i == 0) {
                        $result = $arguments[$i];
                    } elseif ($arguments[$i] == 0) {
                        $result = "Делить на 0 нельзя!!!";
                        break;
                    } else {
                        $result /= $arguments[$i];
                    }
                }
                echo implode(" / ", $arguments) . " = " . $result . "<br>"  . PHP_EOL;
                break;
            default:
                echo "Ошибочный оператор" . "<br>"  . PHP_EOL;
        }
        return $result;
    }
}

function task3($x, $y)
{
    if (is_int($x) & is_int($y)) {
        echo '<table style="border-collapse: collapse; text-align: center">';
        for ($i = 0; $i < ($x+1); $i++) {
            echo '<tr>';
            for ($j = 0; $j < ($y+1); $j++) {
                if ($i == 0) {
                    echo "<th style='border: 1px solid black; font-weight: bold; width: 40px'>".$j."</th>";
                } elseif ($j == 0) {
                    echo "<th style='border: 1px solid black; font-weight: bold; width: 40px'>".$i."</th>";
                } else {
                    echo "<td style='border: 1px solid black; width: 40px'>".$i*$j."</td>";
                };
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "Неверно заданы значения!" . "<br>"  . PHP_EOL;
    }
}

function createFile($filename, $txt)
{
    if ($handler = fopen($filename, 'w')) {
        fwrite($handler, $txt);
    } else {
        echo "Ошибка при создании файла" . "<br>"  . PHP_EOL;
    }
}

function showFile($filename)
{
    if ($handler = fopen($filename, 'r')) {
        echo fgets($handler);
    } else {
        echo "Такого файла не существует" . "<br>"  . PHP_EOL;
    }
}
