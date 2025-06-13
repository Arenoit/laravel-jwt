<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personas')->insert([
            [
                'nombre' => 'Ana Martínez',
                'email' => 'ana.martinez@example.com',
                'fecha_de_nacimiento' => '1990-04-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Carlos Pérez',
                'email' => 'carlos.perez@example.com',
                'fecha_de_nacimiento' => '1985-09-23',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Lucía Gómez',
                'email' => 'lucia.gomez@example.com',
                'fecha_de_nacimiento' => '1993-01-17',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Juan Torres',
                'email' => 'juan.torres@example.com',
                'fecha_de_nacimiento' => '1988-07-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'María López',
                'email' => 'maria.lopez@example.com',
                'fecha_de_nacimiento' => '1995-11-30',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
