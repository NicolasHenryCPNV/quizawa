<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 250)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('pseudo');
            $table->string('firstname');
            $table->string('lastname');
            $table->boolean('admin');
            $table->boolean('creator');
            $table->string('api_token', 80)->unique();
            $table->rememberToken();
            $table->bigInteger('classroom_id')->unsigned();
            $table->softDeletes();

            // Foreing keys
            $table->foreign('classroom_id')->references('id')->on('classrooms');
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['classroom_id']);
        });
        Schema::dropIfExists('users');
    }
}
