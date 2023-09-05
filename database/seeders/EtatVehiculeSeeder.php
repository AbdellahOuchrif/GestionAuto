<?php

namespace Database\Seeders;

use App\Models\EtatVehicule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EtatVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtatVehicule::create([
            "location_id" => "1",
            "type" => "l",
            "kms" => "105000",
            "niveau_carburant" => "20",
            "observation" => NULL
        ]);
    }
}
