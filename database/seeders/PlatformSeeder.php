<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platforms = [
            [
                'id' => 1,
                'name' => 'Marafiq',
                'description' => 'Marafiq is a platform for reserving public facilities in Saudi Agadir.',
                'url' => 'https://marafiq.agadir.ma/' ,
            ],
        ];
    }
}
