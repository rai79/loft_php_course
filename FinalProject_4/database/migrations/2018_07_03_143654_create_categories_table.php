<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('name', 200)->unique(); //название категории
	        $table->string('parent', 200)->nullable(); //название "материнской" категории (для вложенных категорий)
	        $table->string('key_words', 200)->nullable(); //ключевые слова для поиска
	        $table->string('user_friendly_url', 200)->nullable(); //ссылка ЧПУ
	        $table->string('short_description', 1000)->nullable(); //короткое описание категории
	        $table->string('description')->nullable(); //описание категории
	        $table->string('pic_url', 2000)->nullable(); //путь к фотографии категории
	        $table->tinyInteger('active')->default(0); //активная категория? позволяет отключать категорию
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
        Schema::dropIfExists('categories');
    }
}
