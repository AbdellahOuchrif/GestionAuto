<?php

namespace Database\Seeders;

use App\Models\Diver;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Diver::create([
            "champ" => 'tva',
            "valeur" => '20'
        ]);
    }
}
