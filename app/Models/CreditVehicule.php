<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditVehicule extends Model
{
    use HasFactory;

    protected $fillable = ["vehicule_id", "organisation_id", "prix_vehicule", "apport", "mensualite", "date_debut", "date_fin"];
}
