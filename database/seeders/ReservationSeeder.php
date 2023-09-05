<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::create([
            "client_id" => "1",
            "vehicule_id" => "1",
            "date_debut" => "2023-09-05T10:16",
            "date_fin" => "2023-09-07T10:16",
            "tarif" => "0",
            "avance" => null,
            "mode_paiement_id" => null,
            "reference" => null,
            "description" => null
        ]);
    }
}
