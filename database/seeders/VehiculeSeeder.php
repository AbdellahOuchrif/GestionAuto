<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Enums\Unite;
use App\Models\Vehicule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vehicule::insert([
            [
                "etat_id"                   =>      "1",
                "type_vehicule_id"          =>      "1",
                "model_vehicule_id"         =>      "3",
                "couleur_vehicule_id"       =>      "1",
                "transmission_vehicule_id"  =>      "2",
                "immatriculation_num"       =>      "52342",
                "immatriculation_lettre"    =>      "أ",
                "immatriculation_region"    =>      "33",
                "date_acquisition"          =>      "2021-03-11",
                "nbr_place"                 =>      "5",
                "date_disponibilite"        =>      "2023-03-18",
                "tarif"                     =>      "1.20",
                "km_compteur"               =>      "105000",
                "unite"                     =>      Unite::Km->value, 
                'created_at'                =>      Carbon::now(),
                'updated_at'                =>      Carbon::now()
            ],
            [
                "etat_id"                   =>      "1",
                "type_vehicule_id"          =>      "1",
                "model_vehicule_id"         =>      "1",
                "couleur_vehicule_id"       =>      "1",
                "transmission_vehicule_id"  =>      "2",
                "immatriculation_num"       =>      "342",
                "immatriculation_lettre"    =>      "أ",
                "immatriculation_region"    =>      "1",
                "date_acquisition"          =>      "2021-03-11",
                "nbr_place"                 =>      "5",
                "date_disponibilite"        =>      "2023-03-18",
                "tarif"                     =>      "1.20",
                "km_compteur"               =>      "155000",
                "unite"                     =>      Unite::Km->value, 
                'created_at'                =>      Carbon::now(),
                'updated_at'                =>      Carbon::now()
            ]
        ]);
    }
}
