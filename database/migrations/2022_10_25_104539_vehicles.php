<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type')->nullable();
            $table->string('category');
            $table->string('title');
            $table->integer('price');
            $table->string('brand')->nullable();
            $table->string('year')->nullable();
            $table->string('km_driven')->nullable();
            $table->string('servicing_remain')->nullable();
            $table->string('color')->nullable();
            $table->string('any_damage')->nullable();
            $table->longText('description');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->longText('address')->nullable();
            $table->integer('pin')->nullable();
            $table->string('available');
            $table->string('status');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
