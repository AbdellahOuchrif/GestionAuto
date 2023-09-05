<?php

namespace Database\Seeders;

use App\Models\Conducteur;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConducteurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conducteur::create([ 
            "nom_complet" => "hamid lmerdi",
            "date_naissance" => "2001-03-13",
            "Lieu_naissance" => "Rabat",
            "nationalite" => "Marocaine",
            "tel" => "06775038",
            "adresse" => "Diour Jamaa",
            "num_cin" => "AA33291",
            "cin_delivre" => "2016-05-05",
            "cin_validite" => "2026-05-19",
            "num_permis" => "31/11298",
            "permis_delivre" => "2020-06-06",
            "permis_validite" => "2030-07-20",
            "num_passeport" => NULL,
            "passeport_delivre" => NULL,
            "passeport_validite" => NULL,
        ]);
    }
}
