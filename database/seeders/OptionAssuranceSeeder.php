<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\OptionAssurance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OptionAssuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OptionAssurance::insert([
            [
                "assurance_id"      =>      "1",
                "designation"       =>      "Vitres",
                "details"           =>      "La garantie bris de glace permet à un assuré d'être indemnisé financièrement 
                                                dès qu'un équipement en verre présent dans son 
                                                habitation est endommagé et ce suite à une intempérie,
                                                un incident ménager ou une tentative d'effraction",
                'created_at'        =>      Carbon::now(),
                'updated_at'        =>      Carbon::now()
            ],
            [
                "assurance_id"      =>      "1",
                "designation"       =>      "carosserie",
                "details"           =>      "C'est une assurance optionnelle qui couvre les coûts 
                                                de réparation des dommages causés à votre voiture en cas 
                                                d'accident, de vandalisme ou d'autres événements imprévus.",
                'created_at'        =>      Carbon::now(),
                'updated_at'        =>      Carbon::now()
            ],
            [
                "assurance_id"      =>      "1",
                "designation"       =>      "Moteur",
                "details"           =>      "Permet la prise en charge par l'assureur auto des frais de réparations 
                                                auto liés à la remise en état du véhicule accidenté, 
                                                après une panne notamment",
                'created_at'        =>      Carbon::now(),
                'updated_at'        =>      Carbon::now()
            ]
        ]);
    }
}
