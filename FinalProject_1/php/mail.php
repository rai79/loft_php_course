<?php
function orderMail ($id, $address, $order, $comment, $change, $card, $callback, $ordercount)
{
    $path = '../mail/';
    $filename = $path . 'order-' . $id . '_' . date('d.j.Y H-i') . '.txt';
    $mailcontent = 'Ваш заказ № ' . $id . PHP_EOL;
    $mailcontent .= $order . PHP_EOL;
    $mailcontent .= 'Адрес заказа: ' . $address . PHP_EOL;
    $mailcontent .= 'Необходима сдача: ' . ($change ? 'Да.' : 'Нет.') . PHP_EOL;
    $mailcontent .= 'Оплата пластиковой картой: ' . ($change ? 'Да.' : 'Нет.') . PHP_EOL;
    $mailcontent .= 'Перезвонить для уточнения заказа: ' . ($change ? 'Да.' : 'Нет.') . PHP_EOL;
    if ($ordercount == 1 ) {
        $mailcontent .= 'Спасибо - это Ваш первый заказ!' . PHP_EOL;
    } else {
        $mailcontent .= 'Спасибо, это уже ' . $ordercount . ' заказ!' . PHP_EOL;
    }
    //Проверяем наличие директории
    if(file_exists($path)) {
        file_put_contents($filename, $mailcontent);
    } else {
        mkdir($path);
        file_put_contents($filename, $mailcontent);
    }
}
