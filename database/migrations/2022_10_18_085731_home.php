<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Home extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('appartment_for');
            $table->string('title');
            $table->integer('price');
            $table->longText('description');
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->longText('address')->nullable();
            $table->integer('pin')->nullable();
            $table->string('available');
            $table->string('status');
            $table->string('type')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('utilities')->nullable();
            $table->string('wifi')->nullable();
            $table->string('parking')->nullable();
            $table->string('duration')->nullable();
            $table->string('pet_friendly')->nullable();
            $table->date('move_in_date')->nullable();
            $table->string('size')->nullable();
            $table->string('furnished')->nullable();
            $table->string('appliances')->nullable();
            $table->string('air_conditioning')->nullable();
            $table->string('outdore_space')->nullable();
            $table->string('smoking_permit')->nullable();
            $table->string('amenities')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('created_by')->nullable();

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
        Schema::dropIfExists('homes');
    }
}