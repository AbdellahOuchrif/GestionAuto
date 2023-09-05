<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Document;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document::insert([
            [
                "type"          =>      "Vignette",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ],
            [
                "type"          =>      "Assurance",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ],
            [
                "type"          =>      "Carte grise",
                'created_at'    =>      Carbon::now(),
                'updated_at'    =>      Carbon::now()
            ]
        ]);
    }
}
