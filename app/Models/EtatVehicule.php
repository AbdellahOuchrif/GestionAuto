<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatVehicule extends Model
{
    use HasFactory;

    protected $fillable = ["location_id", "type", "kms", "niveau_carburant", "observation"];
}
