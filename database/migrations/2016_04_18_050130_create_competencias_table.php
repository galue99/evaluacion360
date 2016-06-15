<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompetenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('definicion');
            $table->text('type');
            $table->integer('type_id');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('competencias');
    }
}
