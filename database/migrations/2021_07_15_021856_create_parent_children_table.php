<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_children', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->integer("channel_id")->nullable();
            $table->integer("lead_status_id")->nullable();
            $table->integer("lead_type_id")->nullable();
            $table->integer("entry_point_id")->nullable();
            $table->string('phone');
            $table->string('surname')->nullable();
            $table->string('patronymic')->nullable();
            $table->text('address')->nullable();
            $table->string('offer')->nullable();
            $table->text('request')->nullable();
            $table->text('comment')->nullable();
            $table->dateTime('next_day_time_call')->nullable();
            $table->integer('who_create')->nullable();
            $table->string('refusal_reason')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('telegram')->nullable();
            $table->dateTime('start_date')->nullable();
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
        Schema::dropIfExists('parent_children');
    }
}
