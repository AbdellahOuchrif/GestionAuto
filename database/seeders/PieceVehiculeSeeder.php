<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\PieceVehicule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PieceVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PieceVehicule::insert([
            [
                "piece"         =>      "cle",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ],
            [
                "piece"         =>      "Triangle panne",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ],
            [
                "piece"         =>      "cable de demarrage",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ],
            [
                "piece"         =>      "cric",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ],
            [
                "piece"         =>      "papier",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ]
        ]);
    }
}
