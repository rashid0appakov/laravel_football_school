<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_news', function (Blueprint $table) {
            $table->id();
            $table->string('name1');
            $table->string('phone1');
            $table->string('name2');
            $table->string('phone2');
            $table->string('email');
            $table->integer('status_id');
            $table->integer('club_id');
            $table->integer('manager_id')->nullable();
            $table->string('child_name');
            $table->dateTime('birthday');
            $table->integer('level_id');
            $table->integer('request_id')->nullable();
            $table->text('request_text')->nullable();
            $table->integer('offer_id')->nullable();
            $table->text('offer_text')->nullable();
            $table->string('tel')->nullable();
            $table->string('own')->nullable();
            $table->string('ch')->nullable();
            $table->string('url')->nullable();
            $table->string('pl')->nullable();
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
        Schema::dropIfExists('lead_news');
    }
}
