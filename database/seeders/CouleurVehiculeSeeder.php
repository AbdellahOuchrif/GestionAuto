<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CouleurVehicule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CouleurVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CouleurVehicule::insert([
            [
                'couleur'          => 'Blanche', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Noire', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Bleue', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Grise', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Jaune', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Marron', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Orange', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Rose', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Rouge', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Verte', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'couleur'          => 'Violette', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ]
        ]);
    }
}
