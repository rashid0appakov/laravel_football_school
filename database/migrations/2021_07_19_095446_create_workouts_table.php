<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonement_workouts', function (Blueprint $table) {
            $table->id();
            $table->integer('abonement_id');
            $table->integer('number_workouts');
            $table->decimal('price_workouts');
            $table->integer('number_freezing');
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
        Schema::dropIfExists('abonement_workouts');
    }
}
