<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\TypeVehicule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeVehicule::insert([
            [
                'type'             => 'Voiture', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'type'             => 'Moto', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ]
        ]);
    }
}
