<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\ModePaiement;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModePaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModePaiement::insert([
            [
                "mode"             =>       "Especes", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ],  
            [
                "mode"             =>       "Cheque", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ],  
            [
                "mode"             =>       "Virement", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ],  
            [
                "mode"             =>       "Versement", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ],  
            [
                "mode"             =>       "Carte bancaire", 
                'created_at'       =>       Carbon::now(),
                'updated_at'       =>       Carbon::now()
            ]
        ]);
    }
}
