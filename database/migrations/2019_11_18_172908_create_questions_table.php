<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->string('image');
            $table->bigInteger('quizz_id')->unsigned();

            // Foreing keys
            $table->foreign('quizz_id')->references('id')->on('quizzs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the foreign keys
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['quizz_id']);
        });
        Schema::dropIfExists('questions');
    }
}
