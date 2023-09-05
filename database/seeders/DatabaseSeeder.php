<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\EtatSeeder;
use Database\Seeders\DiverSeeder;
use Database\Seeders\ClientSeeder;
use Database\Seeders\DocumentSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\VehiculeSeeder;
use Database\Seeders\AssuranceSeeder;
use Database\Seeders\RoleTableSeeder;
use Database\Seeders\UserTableSeeder;
use Database\Seeders\ConducteurSeeder;
use Database\Seeders\EtatVehiculeSeeder;
use Database\Seeders\OrganisationSeeder;
use Database\Seeders\TypeVehiculeSeeder;
use Database\Seeders\ImageVehiculeSeeder;
use Database\Seeders\ModelVehiculeSeeder;
use Database\Seeders\PieceVehiculeSeeder;
use Database\Seeders\ArabicAlphabetSeeder;
use Database\Seeders\MarqueVehiculeSeeder;
use Database\Seeders\AssuranceDetailSeeder;
use Database\Seeders\CouleurVehiculeSeeder;
use Database\Seeders\OptionAssuranceSeeder;
use Database\Seeders\PieceVehiculeDetailSeeder;
use Database\Seeders\TransmissionVehiculeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(MarqueVehiculeSeeder::class);
        $this->call(TypeVehiculeSeeder::class);
        $this->call(CouleurVehiculeSeeder::class);
        $this->call(TransmissionVehiculeSeeder::class);
        $this->call(ArabicAlphabetSeeder::class);
        $this->call(ModelVehiculeSeeder::class);
        $this->call(EtatSeeder::class);
        $this->call(OrganisationSeeder::class);
        $this->call(ModePaiementSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(VehiculeSeeder::class);
        $this->call(DiverSeeder::class);
        $this->call(ImageVehiculeSeeder::class);
        $this->call(AssuranceSeeder::class);
        $this->call(OptionAssuranceSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(PieceVehiculeSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(ConducteurSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(FacturationSeeder::class);
        $this->call(EtatVehiculeSeeder::class);
        $this->call(PieceVehiculeDetailSeeder::class);
        $this->call(AssuranceDetailSeeder::class);
    }
}
