<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'nombre'=>'Contador Público',
        ]);
        DB::table('carreras')->insert([
            'nombre'=>'Ingeniería en Gestión Empresarial',
        ]);
        DB::table('carreras')->insert([
            'nombre'=>'Ingeniería Industrial',
        ]);
        DB::table('carreras')->insert([
            'nombre'=>'Ingeniería en Sistemas Computacionales',
        ]);
        DB::table('carreras')->insert([
            'nombre'=>'Ingeniería Electromecánica',
        ]);
        DB::table('carreras')->insert([
            'nombre'=>'Ingeniería Mecatrónica',
        ]);
        DB::table('carreras')->insert([
            'nombre'=>'Ingeniería Electrónica',
        ]);
    }
}
