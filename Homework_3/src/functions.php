<?php
function task1()
{
    $xmlFile = './data.xml';
    $xml = simplexml_load_file($xmlFile);
    echo 'Заказ №: ' . $xml->attributes()->PurchaseOrderNumber . '<br>';
    echo 'Дата заказа: ' . $xml->attributes()->OrderDate . '<br>';
    echo 'Получатель: ' . $xml->Address[0]->Name . '<br>';
    echo 'Почтовый индекс: ' . $xml->Address[0]->Zip . '<br>';
    echo 'Страна: ' . $xml->Address[0]->Country . '<br>';
    echo 'Штат: ' . $xml->Address[0]->State . '<br>';
    echo 'Город: ' . $xml->Address[0]->City . '<br>';
    echo 'Улица: ' . $xml->Address[0]->Street . '<br>';
    echo '<br>';
    echo 'Отправитель: ' . $xml->Address[1]->Name . '<br>';
    echo 'Почтовый индекс: ' . $xml->Address[1]->Zip . '<br>';
    echo 'Страна: ' . $xml->Address[1]->Country . '<br>';
    echo 'Штат: ' . $xml->Address[1]->State . '<br>';
    echo 'Город: ' . $xml->Address[1]->City . '<br>';
    echo 'Улица: ' . $xml->Address[1]->Street . '<br>';
    echo '<br>Примечание к доставке: ' . $xml->DeliveryNotes . '<br><br>';
    echo 'Состав отправления:<br>';
    foreach ($xml->Items->Item as $item) {
        echo 'Артикул: ' . $item->attributes()->PartNumber . '<br>';
        echo 'Наименование товара: ' . $item->ProductName . '<br>';
        echo 'Количество: ' . $item->Quantity . '<br>';
        echo 'Цена: ' . $item->USPrice . '<br>';
        if (isset($item->Comment)) {
            echo 'Комментарий: ' . $item->Comment . '<br>';
        }
        if (isset($item->ShipDate)) {
            echo 'Дата поставки: ' . $item->ShipDate . '<br>';
        }
    }
}

function writeJson($jsonFile, $data)
{
    //Преобразуем в формат JSON
    $encoded = json_encode($data, JSON_UNESCAPED_UNICODE);
    //Записываем в файл
    file_put_contents($jsonFile, $encoded);
    echo 'JSON файл успешно записан <br>' . PHP_EOL;
}

function readJson($jsonFile)
{
    //Считываем данные из файла
    $data = file_get_contents($jsonFile);
    $decoded = json_decode($data, true);
    echo 'JSON файл успешно прочитан <br>' . PHP_EOL;
    return $decoded;
}

function task2()
{
    //Инициализируем данные
    $jsonFile = './output.json';
    $jsonFileEd = './output2.json';

    $data = [
        ["country" => "Россия", "capital" => "Москва", "population" => "144,3 млн."],
        ["country" => "США", "capital" => "Вашингтон", "population" => "325,7 млн."],
        ["country" => "Испания", "capital" => "Мадрид", "population" => "46,56 млн."]
    ];
    echo 'Массив удачно сгенерированы' . '<br>' . PHP_EOL;
    //Записываем в файл
    writeJson($jsonFile, $data);
    //Считываем данные из файла
    $decoded = readJson($jsonFile);
    //Определяем надо ли вносить изменения
    if (rand(0,1)) {
        //Если надо то добавляем данные и сохраняем с новым именем
        $decoded[] = ["country" => "Австралия", "capital" => "Канберра", "population" => "24,13 млн."];
        writeJson($jsonFileEd, $decoded);
        echo 'Записан файл JSON с изменениями' . '<br>' . PHP_EOL;
    } else {
        //Если нет то просто сохраняем с другим именем
        writeJson($jsonFileEd, $decoded);
        echo 'Записан файл JSON без изменений' . '<br>' . PHP_EOL;
    }
    //сравниваем 2 массива и выводим различия
    $arr1 = readJson($jsonFile);
    $arr2 = readJson($jsonFileEd);
    $compare = [];

    foreach ($arr2 as $item2) {
        foreach ($arr1 as $item1) {
            $compare = array_diff($item1,$item2);
        }
    }
    if (count($compare)) {
        echo 'Массивы отличаются:<br>' . PHP_EOL;
        echo '<pre>';
        print_r($compare);
        echo '</pre><br>' . PHP_EOL;
    } else {
        echo 'Массивы идентичны!<br>' . PHP_EOL;
    }

}

function task3()
{
    //Размер массива ограничим 100 элементами, но не менее 50
    $count = rand(50, 100);
    $writeCsvArray = [];
    //Заполним массив случайными числами от 1 до 100
    for ($i = 0; $i < $count; $i++) {
        $writeCsvArray[$i] = rand(1, 100);
    }
    echo 'Массив удачно сгенерированы' . '<br>' . PHP_EOL;

    $csvFile = './test.csv';

    //Записываем данные в CSV
    $fp = fopen($csvFile, 'w');
    fputcsv($fp, $writeCsvArray, ';');
    fclose($fp);
    echo 'CSV файл успешно записан' . '<br>' . PHP_EOL;

    //Читаем данные из CSV
    $csvFile = fopen($csvFile, "r"); //r = чтение с начала
    if ($csvFile) {
        $readCsvArray = fgetcsv($csvFile, 1000, ";");
    }
    fclose($csvFile);
    echo 'CSV файл успешно прочитан <br>' . PHP_EOL;

    $evenSum = 0;
    for ($i = 0; $i < count($readCsvArray); $i++) {
        if($readCsvArray[$i]%2 == 0) {
            $evenSum +=$readCsvArray[$i];
        }
    }
    echo 'Сумма четных чисел массива: ' . $evenSum . '<br>' . PHP_EOL;
}

function curl($url, $postdata) {
    $uagent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; rv:1.7.3) Gecko/20041001 Firefox/0.10.1";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
    $content = curl_exec( $ch );
    curl_close( $ch );
    return $content;

}
