<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->boolean('show_on_main')->default(0);
            $table->string('image')->nullable();
            $table->string('phone');
            $table->string('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('vk')->nullable();
            $table->string('instagram')->nullable();
            $table->string('education')->nullable();
            $table->string('license')->nullable();
            $table->string('clothing_size')->nullable();
            $table->string('experience')->nullable();
            $table->string('family_status')->nullable();
            $table->string('children')->nullable();
            $table->text('career')->nullable();
            $table->text('password')->nullable();
            $table->text('password_confirmation')->nullable();
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
        Schema::dropIfExists('trainers');
    }
}
