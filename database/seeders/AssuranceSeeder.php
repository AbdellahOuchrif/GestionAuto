<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Assurance;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssuranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Assurance::insert([
            [
                "type"          => "Responsabilite civil",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ],
            [
                "type"          =>      "Tout risque",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ]
        ]);
    }
}
