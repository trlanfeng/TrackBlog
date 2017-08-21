<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorys',function (Blueprint $table) {
            $table->increments('id');
            $table->string('keywords')->nullable();
            $table->string('description')->nullable();
            $table->string('title');
            $table->string('thumb_url')->nullable();
            $table->integer('pid');
            $table->integer('orders')->nullable();
            $table->string('alias')->nullable();
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
        Schema::dropIfExists('categorys');
    }
}
