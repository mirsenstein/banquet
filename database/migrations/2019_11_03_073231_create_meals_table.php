<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_type_id')->unsigned();
            $table->integer('restaurant_id')->unsigned();
            $table->timestamps();
        });

        Schema::create('meals', function (Blueprint $table) {
            $table->foreign('course_type_id')->references('id')->on('course_types');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
