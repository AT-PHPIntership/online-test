<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionsAndCorrectAnswersToUsersAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_answers', function (Blueprint $table) {
            $table->foreign('question_id')
                  ->references('id')->on('questions')
                  ->onDelete('cascade');
            $table->foreign('answer_id')
                  ->references('id')->on('answers')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_answers', function (Blueprint $table) {
            $table->dropForeign('users_answers_question_id_foreign');
            $table->dropForeign('users_answers_answer_id_foreign');
        });
    }
}
