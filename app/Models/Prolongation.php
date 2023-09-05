<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prolongation extends Model
{
    use HasFactory;

    protected $fillable = ["location_id", "date_depart_prolongation", "date_retour_prolongation", "lieu_depart_prolongation", "lieu_retour_prolongation", "autre_frais_prolongation", "nature"];
}
