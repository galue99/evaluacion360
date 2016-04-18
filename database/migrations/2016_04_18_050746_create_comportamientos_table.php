<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComportamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comportamientos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('definicion');
            $table->integer('comportamiento_id')->unsigned();
            $table->foreign('comportamiento_id')->references('id')->on('comportamientos')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('comportamientos');
    }
}
