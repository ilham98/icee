<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('student_id');
            $table->char('student_number', 8);
            $table->string('name', 100);
            $table->text('note')->nullable();
            $table->text('reason')->nullable();
            $table->year('year');
            $table->tinyInteger('semester');
            $table->string('phone_number', 15);
            $table->char('level')->nullable();
            $table->date('interview_date')->nullable();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');

            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('department_id')->on('departments');

            $table->integer('teacher_id')->unsigned()->nullable();
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
        Schema::dropIfExists('students');
    }
}
