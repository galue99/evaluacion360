<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFrasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frases', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->integer('items_id')->unsigned();
            $table->foreign('items_id')->references('id')->on('items');
            $table->integer('evaluacion_id')->unsigned();
            $table->foreign('evaluacion_id')->references('id')->on('evaluaciones');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('frases');
    }
}
