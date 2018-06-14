<?php
require ('src/functions.php');

echo 'Задание №1 <br><br>' . PHP_EOL;
task1();
echo '<br>Задание №2 <br><br>' . PHP_EOL;
task2();
echo '<br>Задание №3 <br><br>' . PHP_EOL;
task3();
echo '<br>Задание №4 <br><br>' . PHP_EOL;

$data = curl('https://en.wikipedia.org/w/api.php','action=query&titles=Main Page&prop=revisions&rvprop=content&format=json');

$parsed_data = json_decode($data, true);
foreach ($parsed_data['query']['pages'] as $page) {
    echo 'Page ID: ' . $page['pageid'] . '<br>';
    echo 'Title: ' . $page['title'] . '<br>';
}
