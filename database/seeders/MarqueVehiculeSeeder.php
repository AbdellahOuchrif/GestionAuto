<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\MarqueVehicule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MarqueVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        MarqueVehicule::insert([
            [
                'marque'           => 'Ford', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'marque'           => 'Dacia', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'marque'           => 'Renault', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'marque'           => 'Toyota', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'marque'           => 'Mercedes-Benz', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'marque'           => 'BMW', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'marque'           => 'Audi', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
        ]);
    }
}
