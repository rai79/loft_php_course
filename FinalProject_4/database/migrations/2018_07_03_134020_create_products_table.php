<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('article', 50)->nullable(); //артикул товара
	        $table->string('name', 200); //название товара
	        $table->integer('category_id')->unsigned(); //id категории
	        $table->string('brand', 200)->nullable(); //название бренда
	        $table->string('short_description', 1000)->nullable(); //короткое описание товара
	        $table->text('description')->nullable(); //описание товара
	        $table->string('pic_url', 2000)->nullable(); //путь к фотографиям товара
	        $table->float('purchase_price')->default(0); //стоимость покупки для интернет магазина (возможно пригодится для бухгалтерии и автоматического формирования наценки)
	        $table->float('price')->default(0); //цена для покупателя
	        $table->float('discount')->default(0); //скидка
	        $table->integer('count')->default(0); //количество товара на складе
	        $table->string('key_words', 200)->nullable(); //ключевые слова для поиска
	        $table->string('user_friendly_url', 200)->nullable(); //ссылка ЧПУ
	        $table->tinyInteger('active')->default(0); //активный товар? позволяет скрывать/отображать товар
	        $table->tinyInteger('recommended')->default(0); //рекомендуемый товар? позволяет помещать товар в акции/рекомендации
            $table->timestamps();
        });

    }

	/**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
