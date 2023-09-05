<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\PieceVehiculeDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PieceVehiculeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PieceVehiculeDetail::insert([
            [
                "piece_vehicule_id" => "2",
                "etat_vehicule_id" => "1",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "piece_vehicule_id" => "3",
                "etat_vehicule_id" => "1",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "piece_vehicule_id" => "4",
                "etat_vehicule_id" => "1",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "piece_vehicule_id" => "1",
                "etat_vehicule_id" => "1",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ],
            [
                "piece_vehicule_id" => "5",
                "etat_vehicule_id" => "1",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]
        ]);
    }
}
