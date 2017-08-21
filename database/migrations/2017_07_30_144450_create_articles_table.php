<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles',function (Blueprint $table) {
            $table->increments('id');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('thumb_url')->nullable();
            $table->integer('category_id');
            $table->integer('orders')->nullable();
            $table->integer('allow_comment')->nullable();
            $table->integer('author_id')->nullable();
            $table->string('alias')->nullable();
            $table->string('tags')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('link')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
