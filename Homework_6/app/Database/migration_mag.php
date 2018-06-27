<?php
require __DIR__."/../../vendor/autoload.php";

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Capsule\Manager as Capsule;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(__DIR__."/../../.env");

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv("DB_ADMIN"),
    'password'  => getenv('DB_PASSWORD'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();

$capsule->bootEloquent();

Capsule::schema()->dropIfExists('goods');

Capsule::schema()->create('goods', function (Blueprint $table) {
    $table->increments('id'); //id товара
    $table->string('article', 50)->unique(); //артикул товара
    $table->string('name', 200); //название товара
    $table->string('brand', 200); //название бренда
    $table->integer('categoty_id'); //id категории
    $table->string('key_words', 200); //ключевые слова для поиска
    $table->string('user_friendly_url', 200); //ссылка ЧПУ
    $table->string('short_description', 1000); //короткое описание товара
    $table->text('description'); //описание товара
    $table->integer('count'); //количество товара на складе
    $table->float('purchase_price'); //стоимость покупки для интернет магазина (возможно пригодится для бухгалтерии и автоматического формирования наценки)
    $table->float('sell_price'); //цена для покупателя
    $table->float('discount'); //скидка
    $table->string('pic_url', 2000); //путь к фотографиям товара
    $table->tinyInteger('active')->default(0); //активный товар? позволяет скрывать/отображать товар
    $table->tinyInteger('recommended')->default(0); //рекомендуемый товар? позволяет помещать товар в акции/рекомендации
});

Capsule::schema()->dropIfExists('categories');

Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->increments('id'); //id категории
    $table->string('name', 200); //название категории
    $table->string('parent', 200); //название "материнской" категории (для вложенных категорий)
    $table->string('key_words', 200); //ключевые слова для поиска
    $table->string('user_friendly_url', 200); //ссылка ЧПУ
    $table->string('short_description', 1000); //короткое описание категории
    $table->text('description'); //описание категории
    $table->string('pic_url', 2000); //путь к фотографии категории
    $table->tinyInteger('active')->default(0); //активная категория? позволяет отключать категорию
});
