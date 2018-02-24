<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('twilio_id')->nullable();
            $table->integer('classroom_id')->unsigned();
            $table->foreign('classroom_id')
            ->references('id')->on('classrooms')
            ->onDelete('cascade');
            $table->integer('professional_id')->unsigned()->nullable();
            $table->foreign('professional_id')
            ->references('id')->on('professionals')
            ->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}
