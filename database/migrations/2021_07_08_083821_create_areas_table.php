<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->id();
            $table->boolean('frozen')->default(0);
            $table->string('name');
            $table->string('address');
            $table->text('description')->nullable();
            $table->text('mini_map')->nullable();
            $table->string('image')->nullable();
            $table->string('size')->nullable();
            $table->string('coating')->nullable();
            $table->string('capacity')->nullable();
            $table->string('rent_price')->nullable();
            $table->integer('manager_id')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
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
        Schema::dropIfExists('areas');
    }
}
