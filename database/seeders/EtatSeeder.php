<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Etat;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EtatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Etat::insert([
            [
                'designation'      => 'Disponible', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'louer', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'en panne', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'en retard', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'confirme', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'en attente', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'en cours', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'annule', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'non disponible', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'en entretient', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ],
            [
                'designation'      => 'reserver', 
                'created_at'       => Carbon::now(),
                'updated_at'       => Carbon::now()
            ]
        ]);
    }
}
