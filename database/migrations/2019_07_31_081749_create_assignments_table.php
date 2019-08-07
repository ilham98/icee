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
            $table->bigIncrements('assignment_id');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('topic_id')->unsigned();
            $table->string('student_comment')->nullable();
            $table->string('teacher_comment')->nullable();
            $table->integer('minute')->nullable();
            $table->string('partner')->nullable();
            $table->integer('week')->nullable();
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
