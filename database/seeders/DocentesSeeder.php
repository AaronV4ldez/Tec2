<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocentesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('docentes')->insert([
            'id_user'=>2,
            'id_cuerpo_academico'=>4,
            'edad'=>31,
            'genero'=>'Masculino',
            'nivel_estudio'=>'Maestría',
            'sni'=>'No',
            'perfil_deseable'=>true,
            'id_adscripcion'=>4
        ]);

        DB::table('docentes')->insert([
            'id_user'=>3,
            'id_cuerpo_academico'=>2,
            'edad'=>36,
            'genero'=>'Masculino',
            'nivel_estudio'=>'Maestría',
            'sni'=>'No',
            'perfil_deseable'=>true,
            'id_adscripcion'=>4
        ]);

        DB::table('docentes')->insert([
            'id_user'=>4,
            'id_cuerpo_academico'=>3,
            'edad'=>48,
            'genero'=>'Femenino',
            'nivel_estudio'=>'Maestría',
            'sni'=>'No',
            'perfil_deseable'=>true,
            'id_adscripcion'=>4
        ]);
    }
}
