<?php

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
            $table->integer('users_encuestas_id')->unsigned();
            $table->foreign('users_encuestas_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('answer_id')->unsigned();
            $table->boolean('status');
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
        Schema::drop('users_answers');
    }
}
