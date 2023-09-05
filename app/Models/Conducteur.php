<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conducteur extends Model
{
    use HasFactory;
    protected $fillable = ["nom_complet", "tel", "adresse", "date_naissance", "lieu_naissance", "nationalite", "num_cin", "cin_delivre", "cin_validite", "num_passeport", "passeport_delivre", "passeport_validite", "num_permis", "permis_delivre", "permis_validite" ];
}

