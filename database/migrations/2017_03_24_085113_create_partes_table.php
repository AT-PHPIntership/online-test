<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('description')->nullable();
            $table->integer('number_answer')->nullable();
            $table->timestamps();
            $table->integer('exam_id')->unsigned();
            $table->foreign('exam_id')
                  ->references('id')->on('exams')
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
        Schema::dropIfExists('partes');
    }
}
