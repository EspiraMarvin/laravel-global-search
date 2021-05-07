<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
//            $table->bigIncrements('id');
            $table->integer('id')->unique();
            $table->string('status');
            $table->dateTime('request_date');
            $table->string('pickup_lat');
            $table->string('pickup_lng');
            $table->string('pickup_location');
            $table->string('dropoff_lat');
            $table->string('dropoff_lng');
            $table->string('dropoff_location');
            $table->dateTime('pickup_date');
            $table->dateTime('dropoff_date')->nullable();
            $table->string('type');
            $table->integer('driver_id');
            $table->string('driver_name');
            $table->integer('driver_rating');
            $table->string('driver_pic');
            $table->string('car_make');
            $table->string('car_model');
            $table->string('car_number');
            $table->integer('car_year');
            $table->string('car_pic');
            $table->integer('duration');
            $table->string('duration_unit');
            $table->integer('distance');
            $table->string('distance_unit');
            $table->integer('cost');
            $table->string('cost_unit');
            $table->string('previous_url')->default('localhost');
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
        Schema::dropIfExists('trips');
    }
}
