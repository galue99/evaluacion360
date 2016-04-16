<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtherQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others_questions', function(Blueprint $table){
            $table->increments('id');
            $table->text('question');
            $table->integer('encuestas_id')->unsigned();
            $table->foreign('encuestas_id')->references('id')->on('encuestas')->onDelete('cascade');
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
        Schema::drop('others_questions');
    }
}
