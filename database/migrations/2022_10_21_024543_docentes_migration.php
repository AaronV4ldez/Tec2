<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_cuerpo_academico')->unsigned()->nullable();
            $table->foreign('id_cuerpo_academico')->references('id')->on('cuerpos_academicos');
            $table->integer('edad')->nullable();
            $table->string('genero')->nullable();
            $table->string('nivel_estudio')->nullable();
            $table->string('sni')->nullable();
            $table->boolean('perfil_deseable')->nullable();
            $table->integer('id_adscripcion')->unsigned()->nullable();
            $table->foreign('id_adscripcion')->references('id')->on('carreras');
            $table->string('orcid')->nullable();
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
        Schema::dropIfExists('docentes');
    }
};
