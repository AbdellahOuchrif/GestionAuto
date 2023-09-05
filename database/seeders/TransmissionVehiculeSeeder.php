<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\TransmissionVehicule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransmissionVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransmissionVehicule::insert([
            [
                'transmission'     => 'Automatique', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'transmission'     => 'Manuelle', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ]
        ]);
    }
}
