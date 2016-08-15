<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersAnswersUsersOthersQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_answers_others_questions', function(Blueprint $table){
            $table->increments('id');
            $table->text('answers');
            $table->integer('others_questions_id')->unsigned();
            $table->foreign('others_questions_id')->references('id')->on('others_questions')->onDelete('cascade');
            $table->integer('users_answers_id')->unsigned();
            $table->foreign('users_answers_id')->references('id')->on('users_answers')->onDelete('cascade');
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
        Schema::drop('users_answers_others_questions');
    }
}
