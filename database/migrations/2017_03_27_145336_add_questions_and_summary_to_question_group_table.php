<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionsAndSummaryToQuestionGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_group', function (Blueprint $table) {
            $table->foreign('question_id')
                  ->references('id')->on('questions')
                  ->onDelete('cascade');
            $table->foreign('summary_id')
                  ->references('id')->on('summary')
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
        Schema::table('question_group', function (Blueprint $table) {
            $table->dropForeign('question_group_question_id_foreign');
            $table->dropForeign('question_group_summary_id_foreign');
        });
    }
}
