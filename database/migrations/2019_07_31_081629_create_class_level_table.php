<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassLevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_level', function (Blueprint $table) {
            $table->bigIncrements('class_level_id');
            $table->char('level', 1);
            $table->year('year');
            $table->char('semester', 1);
            $table->bigInteger('teacher_id')->unsigned();
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
        Schema::dropIfExists('class_level');
    }
}
