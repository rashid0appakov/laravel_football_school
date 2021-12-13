<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trainer_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('club_id')->constrained()->onDelete('cascade');
            $table->foreignId('group_id')->constrained()->onDelete('cascade');
            $table->string('hash');
            $table->string('video')->nullable();
            $table->string('conspect')->nullable();
            $table->boolean('closed')->default(0);
            $table->smallInteger('accept')->default(0);
            $table->text('text')->nullable();
            $table->text('report')->nullable();
            $table->date('date');
            $table->string('start');
            $table->string('end');
            $table->string('stavka1')->default(0);
            $table->string('stavka2')->default(0);
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
        Schema::dropIfExists('trainings');
    }
}
