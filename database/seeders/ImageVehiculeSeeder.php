<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ImageVehicule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImageVehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImageVehicule::insert([
            [
                "vehicule_id"       =>      "1",
                "url"               =>      "clio3.jpg", 
                'created_at'        =>      Carbon::now(),
                'updated_at'        =>      Carbon::now()
            ],
            [
                "vehicule_id"       =>      "1",
                "url"               =>      "clio2.jpg", 
                'created_at'        =>      Carbon::now(),
                'updated_at'        =>      Carbon::now()
            ],
            [
                "vehicule_id"       =>      "2",
                "url"               =>      "fiesta1.jpeg", 
                'created_at'        =>      Carbon::now(),
                'updated_at'        =>      Carbon::now()
            ],
            [
                "vehicule_id"       =>      "2",
                "url"               =>      "fiesta2.jpeg", 
                'created_at'        =>      Carbon::now(),
                'updated_at'        =>      Carbon::now()
            ]
        ]);
    }
}
