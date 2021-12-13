<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('lead_id')->nullable();
            $table->integer('status_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->dateTime('deadline');
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
        Schema::dropIfExists('admin_tasks');
    }
}
