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
            $table->bigIncrements('student_id');
            $table->string('student_number');
            $table->string('name');
            $table->string('note')->nullable();
            $table->string('reason')->nullable();
            $table->year('year');
            $table->char('semester', 1);
            $table->string('phone_number');
            $table->char('level')->nullable();
            $table->date('interview_date');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users');

            $table->bigInteger('department_id')->unsigned();
            $table->foreign('department_id')->references('department_id')->on('departments');

            $table->bigInteger('teacher_id')->unsigned()->nullable();
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
