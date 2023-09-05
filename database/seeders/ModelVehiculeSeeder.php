<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ModelVehicule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModelVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelVehicule::insert([
            [
                'marque_vehicule_id'    =>      1, 
                'model'                 =>      'fiesta', 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ],
            [
                'marque_vehicule_id'    =>      2, 
                'model'                 =>      'duster', 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ],
            [
                'marque_vehicule_id'    =>      3, 
                'model'                 =>      'clio', 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ],
            [
                'marque_vehicule_id'    =>      4, 
                'model'                 =>      'corolla', 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ],
            [
                'marque_vehicule_id'    =>      5, 
                'model'                 =>      'E 240', 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ],
            [
                'marque_vehicule_id'    =>      6, 
                'model'                 =>      'X6', 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ],
            [
                'marque_vehicule_id'    =>      7, 
                'model'                 =>      'rs7', 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ]
        ]);
    }
}
