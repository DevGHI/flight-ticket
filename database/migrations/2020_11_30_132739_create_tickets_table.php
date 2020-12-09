<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('start_city');
            $table->unsignedBigInteger('end_city');
            $table->unsignedBigInteger('airline_id');
            $table->dateTime('destination_time');
            $table->dateTime('arrival_time');
            $table->timestamps();


            $table->foreign('start_city')->references('id')->on('cities');
            $table->foreign('end_city')->references('id')->on('cities');
            $table->foreign('airline_id')->references('id')->on('airlines');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
