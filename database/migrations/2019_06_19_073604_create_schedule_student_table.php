<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScheduleStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_student', function (Blueprint $table) {
            $table->bigInteger('attendance_id')->unsigned();
            $table->bigInteger('schedule_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();

            $table->foreign('attendance_id')->references('attendance_id')->on('attendance_status');
            $table->foreign('schedule_id')->references('schedule_id')->on('schedules');
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
        Schema::dropIfExists('schedule_student');
    }
}
