<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'id' => 1,
            'name' => 'description123',
            'description' => 'description123 description123 description123 description123',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
