<?php
require_once ('login.php');

//Подключаемся к БД
try {
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_password);
    //Получаем список зарегистрированных пользователей
    $users = $pdo->query('SELECT * FROM users');
    while ($row = $users->fetch()) {
        echo 'id: ' . $row['user_id'] . ' name: ' . $row['user_name'] . ' email: ' . $row['email'] . '<br>';
    }
    //Получаем список заказов
    $users = $pdo->query('SELECT * FROM orders');
    while ($row = $users->fetch()) {
        $address = 'Улица: ' . $row['street'] . ', дом: ' . $row['home'] . ', строение: ' . $row['part'] . ', квартира: ' . $row['appt'] . ', этаж:' . $row['floor'];
        echo 'id: ' . $row['order_id'] . ' address: ' . $address . '<br>';
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
