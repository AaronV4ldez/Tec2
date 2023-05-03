<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proyectos_investigadores')->insert([
            'id_docente'=>1,
            'nombre'=>'El impacto de la inteligencia artificial en la automatización de procesos empresariales'
        ]);
        DB::table('proyectos_investigadores')->insert([
            'id_docente'=>2,
            'nombre'=>'La evolución de la tecnología Blockchain y su aplicación en sistemas de gestión de la cadena de suministro'
        ]);
        DB::table('proyectos_investigadores')->insert([
            'id_docente'=>2,
            'nombre'=>'La seguridad en la era de la Internet de las cosas: riesgos y soluciones para la protección de datos sensibles'
        ]);
    }
}
