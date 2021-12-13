<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->smallInteger('workout_balance')->unsigned()->default(0);
            $table->smallInteger('freezing_balance')->unsigned()->default(0);
            $table->integer('club_id');
            $table->integer('group_id')->nullable();
            $table->integer('game_role')->nullable();
            $table->integer('level_id')->nullable();
            $table->integer('parent_id');
            $table->string('age')->nullable();
            $table->string('image')->nullable();
            $table->string('gender');
            $table->dateTime('birthday');
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
        Schema::dropIfExists('children');
    }
}
