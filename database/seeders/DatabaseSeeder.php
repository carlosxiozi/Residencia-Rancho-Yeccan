<?php

namespace Database\Seeders;

use App\Models\trabajador;
use Illuminate\Support\Facades\Hash;
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
        // \App\Models\User::factory(10)->create();
        $trabajador = new trabajador();
        
        $trabajador->nombre = "marco";
        $trabajador->apellidos = "vinicio";
        $trabajador->telefono = "9612330374";
        $trabajador->contrasena =Hash::make("12345");
        $trabajador->rol = "Jefe";
        $trabajador->save();
    }
}
