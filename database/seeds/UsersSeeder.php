<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'David',
            'email' => 'davidrylacer@gmail.com',
            'password' => '$2y$10$PUsewkKQKGQ.YRYzBkFSouTVWu0KULbxVUz3nQwogoDsxCwcqPHhu',
            'created_at' => Carbon::create('2025', '06', '12', '17', '36', '54'),
            'updated_at' => Carbon::create('2025', '06', '12', '17', '36', '54'),
        ]);
    }
}
