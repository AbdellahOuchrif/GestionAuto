<?php

namespace Database\Seeders;

use App\Models\Facturation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacturationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Facturation::create([
            "location_id" => "1",
            "mode_paiement_id" => "2",
            "organisation_id" => "1",
            "type" => "l",
            "nbr" => "600",
            "prix" => "1.2",
            "unite" => "km",
            "frais_livraison" => "0",
            "frais_reprise" => "0",
            "remise" => "0",
            "tva" => "20",
            "acompte" => "0",
            "reference" => "8810044288100E",
            "franchise" => "20000",
            "reference_franchise" => "9810044288111E",
            "franchise_organisation_id" => "1"
        ]);
    }
}
