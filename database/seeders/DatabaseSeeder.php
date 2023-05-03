<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(CuerposAcademicosSeeder::class);
        $this->call(CarrerasSeeder::class);
        $this->call(DocentesSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ProyectoSeeder::class);
    }
}
