<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('User_ID')->constrained('users');
            $table->foreignId('Instructor_ID')->constrained('instructors');
            $table->string("pickup_address");
            $table->string("pickup_city");
            $table->datetime("starting_time");
            $table->datetime("finishing_time");
            $table->string("lesson_type");
            $table->string("comment")->nullable();
            $table->boolean("exam")->nullable();
            $table->boolean("exam_success")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
