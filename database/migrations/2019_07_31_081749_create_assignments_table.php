<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('assignment_id');
            $table->integer('student_id')->unsigned();
            $table->integer('topic_id')->unsigned();
            $table->text('student_comment')->nullable();
            $table->text('teacher_comment')->nullable();
            $table->tinyInteger('minute')->nullable();
            $table->string('partner', 100)->nullable();
            $table->tinyInteger('week')->nullable();
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('topic_id')->references('topic_id')->on('topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
