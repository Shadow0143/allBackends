<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HomeImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_id');
            $table->string('image');
            $table->timestamps();
            $table->foreign('home_id')->references('id')->on('homes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes_images');
    }
}