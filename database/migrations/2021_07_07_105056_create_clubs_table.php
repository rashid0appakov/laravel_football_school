<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('manager_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->boolean('display_main_page')->nullable();

            $table->text('title1')->nullable();
            $table->text('textarea1')->nullable();
            $table->text('title2')->nullable();
            $table->text('textarea2')->nullable();
            $table->text('title3')->nullable();
            $table->text('textarea3')->nullable();

            $table->text('linkYoutube')->nullable();

            $table->text('questions')->nullable();
            $table->text('answer')->nullable();
            
            
            $table->text('lat')->nullable();;
            $table->text('lng')->nullable();


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
        Schema::dropIfExists('clubs');
    }
}
