<?php
function orderMail ($id, $address, $phone, $order, $comment, $change, $card, $callback, $order_count)
{
    $path = '../mail/';
    $filename = $path . 'order-' . $id . '_' . date('d.j.Y H-i') . '.txt';
    $mail_content = 'Ваш заказ № ' . $id . PHP_EOL;
    $mail_content .= $order . PHP_EOL;
    $mail_content .= 'Адрес заказа: ' . $address . PHP_EOL;
    $mail_content .= 'Телефон: ' . $phone . PHP_EOL;
    $mail_content .= 'Необходима сдача: ' . ($change ? 'Да.' : 'Нет.') . PHP_EOL;
    $mail_content .= 'Оплата пластиковой картой: ' . ($card? 'Да.' : 'Нет.') . PHP_EOL;
    $mail_content .= 'Перезвонить для уточнения заказа: ' . ($callback ? 'Да.' : 'Нет.') . PHP_EOL;
    $mail_content .= 'Комментарий: ' . $comment . PHP_EOL;
    if ($order_count == 1 ) {
        $mail_content .= 'Спасибо - это Ваш первый заказ!' . PHP_EOL;
    } else {
        $mail_content .= 'Спасибо, это уже ' . $order_count . ' заказ!' . PHP_EOL;
    }
    //Проверяем наличие директории
    if(file_exists($path)) {
        file_put_contents($filename, $mail_content);
    } else {
        mkdir($path);
        file_put_contents($filename, $mail_content);
    }
}
