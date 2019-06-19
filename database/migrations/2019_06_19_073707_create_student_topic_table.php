<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_topic', function (Blueprint $table) {
            $table->bigIncrements('assigment_id');
            $table->tinyInteger('assigment_status');
            $table->text('comment_teacher');
            $table->text('comment_student');
            $table->bigInteger('topic_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('topic_id')->references('topic_id')->on('topics');
            $table->foreign('student_id')->references('student_id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_topic');
    }
}
