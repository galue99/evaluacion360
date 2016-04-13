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
            $table->integer('others_questions_id')->unsigned();;
            $table->foreign('others_questions_id')->references('id')->on('others_questions');
            $table->integer('users_answers_id')->unsigned();;
            $table->foreign('users_answers_id')->references('id')->on('users_answers');
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
