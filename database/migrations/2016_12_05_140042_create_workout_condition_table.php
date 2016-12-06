<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkoutConditionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('workout_condition', function (Blueprint $table) {

        $table->increments('id');
        $table->timestamps();
        
        $table->integer('workout_id')->unsigned();
        $table->integer('condition_id')->unsigned();

        # Make foreign keys
        $table->foreign('workout_id')->references('id')->on('workouts');
        $table->foreign('condition_id')->references('id')->on('conditions');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('workout_condition');
    }
}
