<?php
/**
 * Задание №1
 */
echo "<br><h2>Задание №1</h2><br>";
$name = 'Алексей';
$age = 38;
echo "Меня зовут: $name";
echo "<br>";
echo "Мне $age лет";
echo "<br>";
echo "\"!|\\/'\"\\";
echo "<br>";
/**
 * Задание №2
 */
echo "<br><h2>Задание №2</h2><br>";
define('DRAWINGS', 80);
define('MARKERS', 23);
define('PENCILS', 40);
echo "Всего рисунков на выставке:".DRAWINGS;
echo "<br>";
echo "Фломастерами:".MARKERS;
echo "<br>";
echo "Карандашами:".PENCILS;
echo "<br>";
echo "Красками:".(DRAWINGS - MARKERS - PENCILS);
echo "<br>";
/**
 * Задание №3
 */
echo "<br><h2>Задание №3</h2><br>";
$age = 34;
if (($age >= 18) & ($age <= 65)) {
    echo 'Вам еще работать и работать';
} elseif ($age > 65) {
    echo 'Вам пора на пенсию';
} elseif (($age >= 1) & ($age < 17)) {
    echo 'Вам еще рано работать';
} else {
    echo 'Неизвестный возраст';
}
/**
 * Задание №4
 */
echo "<br><h2>Задание №4</h2><br>";
$day = 3;
switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo 'Это рабочий день';
        break;
    case 6:
    case 7:
        echo 'Это выходной день';
        break;
    default:
        echo 'Неизвестный день';
        break;
}
/**
 * Задание №5
 */
echo "<br><h2>Задание №5</h2><br>";
$bmw = [
    'model' => 'X5',
    'speed' => 120,
    'doors' => 5,
    'year' => '2015'
];
$toyota = [
    'model' => 'LandCruiser',
    'speed' => 100,
    'doors' => 5,
    'year' => '2010'
];
$opel = [
    'model' => 'Astra GTS',
    'speed' => 150,
    'doors' => 3,
    'year' => '2017'
];
$cars ['bmw'] = $bmw;
$cars ['toyota'] = $toyota;
$cars ['opel'] = $opel;
foreach ($cars as $key => $car) {
    echo "CAR $key";
    echo "<br>";
    foreach ($car as $value) {
        echo "$value ";
    }
    echo "<br><br>";
}
/**
 * Задание №6
 */
echo "<br><h2>Задание №6</h2><br>";
echo '<table style="border-collapse: collapse; text-align: center">';
for ($i = 0; $i < 10; $i++) {
    echo '<tr>';
    for ($j = 0; $j < 10; $j++) {
        if ($i == 0) {
            echo "<th style='border: 1px solid black; font-weight: bold; width: 40px'>".$j."</th>";
        } elseif ($j == 0) {
            echo "<th style='border: 1px solid black; font-weight: bold; width: 40px'>".$i."</th>";
        } elseif ((($i % 2) == 0) & (($j % 2) == 0)) {
            echo "<td style='border: 1px solid black; width: 40px'>(".$i*$j.")</td>";
        } elseif ((($i % 2) == 1) & (($j % 2) == 1)) {
            echo "<td style='border: 1px solid black; width: 40px'>[".$i*$j."]</td>";
        } else {
            echo "<td style='border: 1px solid black; width: 40px'>".$i*$j."</td>";
        };
    }
    echo '</tr>';
}
echo '</table>';
