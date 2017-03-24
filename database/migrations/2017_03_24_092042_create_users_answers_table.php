<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')
                  ->references('id')->on('questions')
                  ->onDelete('cascade');
            $table->integer('correct_answer_id')->unsigned();
            $table->foreign('correct_answer_id')
                  ->references('id')->on('correct_answers')
                  ->onDelete('cascade');
            $table->integer('exam_id')->unsigned();
            $table->foreign('exam_id')
                  ->references('id')->on('exams')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_answers');
    }
}
