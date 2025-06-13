<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MascotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mascotas')->insert([
            [
                'nombre' => 'Firulais',
                'especie' => 'Perro',
                'raza' => 'Labrador',
                'edad' => 3,
                'persona_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Michi',
                'especie' => 'Gato',
                'raza' => 'Siames',
                'edad' => 2,
                'persona_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Max',
                'especie' => 'Perro',
                'raza' => 'Bulldog',
                'edad' => 5,
                'persona_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Luna',
                'especie' => 'Gato',
                'raza' => 'Persa',
                'edad' => 4,
                'persona_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Coco',
                'especie' => 'Loro',
                'raza' => null,
                'edad' => 1,
                'persona_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
