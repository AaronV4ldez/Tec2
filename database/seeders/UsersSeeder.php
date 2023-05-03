<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nombre'=>'Administrador',
            'apellido'=>'default',
            'password'=>Hash::make('1234'),
            'email'=>'admin@itsncg.edu.mx',
            'level'=>'Admin',
            'img'=>'defaultAdmin.png'
        ]);
        DB::table('users')->insert([
            'nombre'=>'Luis Alberto',
            'apellido'=>'Grijalva Romero',
            'password'=>Hash::make('1234'),
            'email'=>'docente1@itsncg.edu.mx',
            'level'=>'Docente',
            'img'=>'default.jpg'
        ]);

        DB::table('users')->insert([
            'nombre'=>'Isaac Neftali',
            'apellido'=>'Molina Cepeda',
            'password'=>Hash::make('1234'),
            'email'=>'docente2@itsncg.edu.mx',
            'level'=>'Docente',
            'img'=>'default.jpg'
        ]);

        DB::table('users')->insert([
            'nombre'=>'Lilia Margarita',
            'apellido'=>'Mena Castillo',
            'password'=>Hash::make('1234'),
            'email'=>'docente3@itsncg.edu.mx',
            'level'=>'Docente',
            'img'=>'default.jpg'
        ]);
    }
}
