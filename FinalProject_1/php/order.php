<?php
require_once ('login.php');
require_once ('mail.php');

//Инициализируем переменные
$email = $_POST['email'];
$name = $_POST['name'];
$street = $_POST['street'];
$home = $_POST['home'];
$part = $_POST['part'];
$appt = $_POST['appt'];
$floor = $_POST['floor'];
$comment = $_POST['comment'];
$need_change = ($_POST['payment'] == 'change') ? true : false;
$card_pay = ($_POST['payment'] == 'card') ? true : false;
$callback = isset($_POST['callback']) ? true : false;
$order = 'DarkBeefBurger - 1 шт - 500 рублей';
$address = 'Улица: ' . $street . ', дом: ' . $home . ', строение: ' . $part . ', квартира: ' . $appt . ', этаж:' . $floor;

//Подключаемся к БД
try {
    $dsn = "mysql:host=$db_hostname;dbname=$db_database;charset=utf8";
    $pdo = new PDO($dsn, $db_user, $db_password);
    //Проверяем наличие пользователя с таким почтовым ящиком
    $prepare = $pdo->prepare('SELECT user_id FROM users where email = :email');
    $prepare->execute(['email' => $email]);
    //Если он есть то мы получим его идентификатор
    $user_id = $prepare->fetchAll(PDO::FETCH_COLUMN);
    if(count($user_id)==0) {
        //Если пользователя не нашли то добавляем его в таблицу users
        $prepare = $pdo->prepare("INSERT INTO users (email, user_name) VALUES (:email, :name)");
        $prepare->execute(['email' => $email, 'name' => $name]);
        $data = $prepare->fetchAll(PDO::FETCH_OBJ);
        //получаем его идентификатор
        $prepare = $pdo->prepare('SELECT user_id FROM users where email = :email');
        $prepare->execute(['email' => $email]);
        $user_id = $prepare->fetchAll(PDO::FETCH_COLUMN);
        //и добовляем заказ в таблицу orders
        $prepare = $pdo->prepare("INSERT INTO orders (user_id, street, home, part, appt, floor, order_comment, need_change, card_pay, callback) VALUES (:user_id, :street, :home, :part, :appt, :floor, :order_comment, :need_change, :card_pay, :callback)");
        $order_data = array(
            'user_id' => $user_id[0],
            'street' => $street,
            'home' => $home,
            'part' => $part,
            'appt' => $appt,
            'floor' => $floor,
            'order_comment' => $comment,
            'need_change' => $need_change,
            'card_pay' => $card_pay,
            'callback' => $callback
        );
        $prepare->execute($order_data);
        $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
        //Получаем id последнего добавленного заказа
        $order_id = $pdo->lastInsertId();
        //так как пользователя не было то количество заказов не проверяем
        $ordercount = 1;
        //Создаем файл с письмом
        orderMail ($order_id, $address, $order, $comment, $need_change, $card_pay, $callback, $ordercount);
    } else {
        //Если нашли пользователя обновляем его имя на всякий случай вдруг его не было или поменялось
        //наверно стоило сделать выборку и имени и сравнить и его? для оптимизации?
        $prepare = $pdo->prepare("UPDATE users SET user_name = :name WHERE email = :email");
        $prepare->execute(['email' => $email, 'name' => $name]);
        $data = $prepare->fetchAll(PDO::FETCH_OBJ);
        //и дальше так же добавляем заказ в таблицу orders
        $prepare = $pdo->prepare("INSERT INTO orders (user_id, street, home, part, appt, floor, order_comment, need_change, card_pay, callback) VALUES (:user_id, :street, :home, :part, :appt, :floor, :order_comment, :need_change, :card_pay, :callback)");
        $order_data = array(
            'user_id' => $user_id[0],
            'street' => $street,
            'home' => $home,
            'part' => $part,
            'appt' => $appt,
            'floor' => $floor,
            'order_comment' => $comment,
            'need_change' => $need_change,
            'card_pay' => $card_pay,
            'callback' => $callback
        );
        $prepare->execute($order_data);
        $data = $prepare->fetchAll(PDO::FETCH_ASSOC);
        //Получаем id последнего добавленного заказа
        $order_id = $pdo->lastInsertId();
        //Получаем количество заказов этим пользователем
        $prepare = $pdo->prepare('SELECT order_id FROM orders where user_id = :user_id');
        $prepare->execute(['user_id' => $user_id[0]]);
        //Если он есть то мы получим его идентификатор
        $ordercount = count($prepare->fetchAll(PDO::FETCH_COLUMN));
        //Создаем файл с письмом
        orderMail ($order_id, $address, $order, $comment, $need_change, $card_pay, $callback, $ordercount);
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
header('Location: http://'.$_SERVER['HTTP_HOST']);
