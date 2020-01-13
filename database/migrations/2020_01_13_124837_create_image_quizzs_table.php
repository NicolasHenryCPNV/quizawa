<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImageQuizzsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_quizzs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            // Column for the foreign key
            $table->bigInteger('quizz_id')->unsigned();

            // Foreing keys link
            $table->foreign('quizz_id')->references('id')->on('quizzs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // If you rollback, we drop the table
        Schema::dropIfExists('image_quizzs');
    }
}
