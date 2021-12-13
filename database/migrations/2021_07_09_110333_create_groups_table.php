<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('frozen')->default(0);
            $table->integer('club_id');
            $table->integer('spec_id');
            $table->integer('level_id');
            $table->integer('age_start')->nullable();
            $table->integer('age_end')->nullable();
            $table->integer('area_on_group')->nullable();
            $table->boolean('available')->nullable()->default(0);
            $table->boolean('individual_training')->nullable()->default(0);
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
        Schema::dropIfExists('groups');
    }
}
