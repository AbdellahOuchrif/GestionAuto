<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Client::insert([
            [
                "nom_complet"           =>      "Abdellah Ouchrif",
                "date_naissance"        =>      "2002-03-13",
                "sexe"                  =>      "M",
                "lieu_naissance"        =>      "Rabat",
                "nationalite"           =>      "Marocaine",
                "pays"                  =>      "Maroc",
                "ville"                 =>      "Rabat",
                "email"                 =>      "Abdellahouchrif15@gmail.com",
                "adresse"               =>      "Avenue MY Sliman",
                "tel"                   =>      "+212654846505",
                "tel_2"                 =>      "0661170268",
                "num_cin"               =>      "A492811",
                "cin_delivre"           =>      "2015-03-13",
                "cin_validite"          =>      "2045-03-13",
                "num_passeport"         =>      NULL,
                "passeport_delivre"     =>      NULL,
                "passeport_validite"    =>      NULL,
                "type_permis"           =>      "B",
                "num_permis"            =>      "01/333333",
                "permis_delivre"        =>      "2021-01-28",
                "permis_validite"       =>      "2031-02-01",
                "photo"                 =>      "abdellah.jpg", 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ],
            [
                "nom_complet"           =>      "Youssef El Ghalmi",
                "date_naissance"        =>      "2002-06-19",
                "sexe"                  =>      "M",
                "lieu_naissance"        =>      "BeniMellal",
                "nationalite"           =>      "Marocaine",
                "pays"                  =>      "Maroc",
                "ville"                 =>      "Rabat",
                "email"                 =>      "Elghalmiyoussef@gmail.com",
                "adresse"               =>      "Hay Nahda 2",
                "tel"                   =>      "+212666882910",
                "tel_2"                 =>      NULL,
                "num_cin"               =>      "AB32811",
                "cin_delivre"           =>      "2017-06-11",
                "cin_validite"          =>      "2047-06-11",
                "num_passeport"         =>      NULL,
                "passeport_delivre"     =>      NULL,
                "passeport_validite"    =>      NULL,
                "type_permis"           =>      "B",
                "num_permis"            =>      "01/213433",
                "permis_delivre"        =>      "2021-01-28",
                "permis_validite"       =>      "2031-02-01",
                "photo"                 =>      "youssef.jpg", 
                'created_at'            =>      Carbon::now(),
                'updated_at'            =>      Carbon::now()
            ]
        ]);
    }
}
