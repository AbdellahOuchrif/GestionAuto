<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Organisation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organisation::insert([
            [
                "organisation"     =>       "Wafasalaf", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ],      
            [       
                "organisation"     =>       "Umniabank", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ],      
            [       
                "organisation"     =>       "Eqdom", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ],      
            [       
                "organisation"     =>       "BMCI", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ]
        ]);
    }
}
