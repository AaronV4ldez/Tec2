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
        Schema::create('produccion_investigaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100)->nullable();
            $table->integer('id_docente')->unsigned();
            $table->foreign('id_docente')->references('id')->on('docentes');
            $table->string('tipo',100)->nullable();
            $table->string('link',150)->nullable();
            $table->string('fecha',4)->nullable();
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
        Schema::dropIfExists('produccion_investigaciones');
    }
};
