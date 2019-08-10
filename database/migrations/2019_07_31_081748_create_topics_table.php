<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('topic_id');
            $table->text('conversation');
            $table->year('year');
            $table->tinyInteger('semester');
            $table->tinyInteger('week');

            $table->integer('time_id')->unsigned();
            $table->foreign('time_id')->references('time_id')->on('times');
            $table->integer('teacher_id')->unsigned();
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('topics');
    }
}
