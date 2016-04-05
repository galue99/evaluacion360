<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluadoresEvaluacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluadores_evaluaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('evaluado_id')->unsigned();
            $table->foreign('evaluado_id')->references('id')->on('evaluados');
            $table->integer('evaluadores_id')->unsigned();
            $table->foreign('evaluadores_id')->references('id')->on('evaluadores');
            $table->integer('encuesta_id')->unsigned();
            $table->foreign('encuesta_id')->references('id')->on('encuestas');
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
        Schema::drop('evaluadores_evaluaciones');
    }
}
