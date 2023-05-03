<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CuerposAcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuerpos_academicos')->insert(['nombre'=>'Optimización de sistemas de producción']);
        DB::table('cuerpos_academicos')->insert(['nombre'=>'Desarrollo e innovación de sistemas electromecánicos y mecatrónicos']);
        DB::table('cuerpos_academicos')->insert(['nombre'=>'Estudios organizacionales e innovación tecnológica']);
        DB::table('cuerpos_academicos')->insert(['nombre'=>'Tecnologías de la informática y comunicación']);
        DB::table('cuerpos_academicos')->insert(['nombre'=>'Innovación de procesos educativos']);
        DB::table('cuerpos_academicos')->insert(['nombre'=>'Empresariales y gubernamentales']);
        DB::table('cuerpos_academicos')->insert(['nombre'=>'Innovación de procesos educativos contables']);
    }
}
