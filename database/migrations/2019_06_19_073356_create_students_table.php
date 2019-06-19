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
            $table->string('name');
            $table->string('phone_number');
            $table->date('date')->nullable();
            $table->text('reason')->nullable();
            $table->text('note')->nullable();
            $table->year('year')->nullable();
            $table->tinyInteger('semester')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('department_id')->unsigned();
            $table->tinyInteger('level_id')->unsigned();

            $table->foreign('user_id')->references('user_id')->on('users');
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->foreign('level_id')->references('level_id')->on('levels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
