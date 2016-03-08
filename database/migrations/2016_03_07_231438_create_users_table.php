<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('idrol')->unsigned();
            $table->foreign('idrol')->references('idroluser')->on('roluser')->onUpdate('cascade');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('repassword', 60)->nullable();
            $table->string('dni')->nullable();
            $table->string('position');
            $table->boolean('is_active');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
