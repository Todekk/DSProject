<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('itemName');
            $table->string('description');
            $table->double('price');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('mainimage_id');
            $table->boolean('isFavourite')->nullable();
            /*$table->integer('user_id')->unsigned()->index();*/
            $table->timestamps();

            $table->foreign('mainimage_id')->references('id')->on('images');
            $table->foreign('brand_id')->references('id')->on('brand');
            $table->foreign('cat_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
