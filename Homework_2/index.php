<?php
require('src/functions.php');
//Задание 1
echo "<h2>Задание 1</h2>" . PHP_EOL;
$tmparr[] = 'This';
$tmparr[] = 'is';
$tmparr[] = 'test';
$tmparr[] = 'string';
task1($tmparr, false);
echo task1($tmparr, true) . PHP_EOL;
task1($tmparr);
//Задание 2
echo "<h2>Задание 2</h2>" . PHP_EOL;
task2("+", 10, 5, 4);
task2("-", 10, 5, 4);
task2("*", 10, 5, 4);
task2("/", 10, 5, 4);
task2("/", 10, 5, 4, 0, 1);
//Задание 3
echo "<h2>Задание 3</h2>" . PHP_EOL;
task3(7, 5);
task3(7.48, 5);
//Задание 4
echo "<h2>Задание 4</h2>" . PHP_EOL;
echo date('d.j.Y H:i') . '<br>' . PHP_EOL;
echo mktime(0, 0, 0, 2, 24, 2006) . '<br>' . PHP_EOL;
//Задание 5
echo "<h2>Задание 5</h2>" . PHP_EOL;
$str1 = "Карл у Клары украл Кораллы";
$str2 = "Две бутылки лимонада";
echo 'Оригинал строки: ' . $str1 . '<br>' . PHP_EOL;
echo 'Результат замены: ' . str_replace("К", "", $str1) . '<br>' . PHP_EOL;
echo 'Оригинал строки: ' . $str2 . '<br>' . PHP_EOL;
echo 'Результат замены: ' . str_replace("лимонада", "пива", str_replace("Две", "Три", $str2)) . '<br>' . PHP_EOL;
//Задание 6
echo "<h2>Задание 6</h2>" . PHP_EOL;
createFile('test.txt', 'Hello again!');
showFile('test.txt');
