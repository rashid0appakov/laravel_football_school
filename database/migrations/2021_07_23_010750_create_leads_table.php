<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId("lead_type_id")->nullable()->constrained()->onDelete('cascade');
            $table->foreignId("lead_status_id")->nullable()->constrained()->onDelete('cascade');
            //$table->foreignId("club_id")->nullable()->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone');
            $table->smallInteger('age')->unsigned()->nullable();
            $table->string('email')->nullable();
            $table->string('executor')->nullable();
            $table->integer('channel_id')->nullable();
            $table->integer('entry_point_id')->nullable();
            $table->integer('manager_id')->nullable();
            $table->integer('club_id')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
