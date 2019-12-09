<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizz_session', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('started_at');
            $table->timestamp('ended_at');
            $table->bigInteger('classroom_id')->unsigned();
            $table->bigInteger('quizz_id')->unsigned();

            // Foreing keys
            $table->foreign('classroom_id')->references('id')->on('classrooms');
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
        Schema::table('quizz_session', function (Blueprint $table) {
            $table->dropForeign(['classroom_id']);
            $table->dropForeign(['quizz_id']);
        });
        Schema::dropIfExists('quizz_session');
    }
}
