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
        Schema::create('proyectos_investigadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('id_docente')->unsigned();
            $table->foreign('id_docente')->references('id')->on('docentes');
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
        Schema::dropIfExists('proyectos_investigadores');
    }
};
