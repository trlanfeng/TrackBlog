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
            $table->string('keywords');
            $table->string('description');
            $table->string('title');
            $table->text('content');
            $table->string('thumb_url');
            $table->integer('category_id');
            $table->integer('orders');
            $table->integer('allow_comment');
            $table->integer('author_id');
            $table->string('alias');
            $table->string('tags');
            $table->tinyInteger('status');
            $table->string('link');
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
