<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\AssuranceDetail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AssuranceDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssuranceDetail::create([
            "location_id" => "1",
            "option_assurance_id" => "1",
            "assurance_id" => "1",
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
    }
}
