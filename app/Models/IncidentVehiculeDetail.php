<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncidentVehiculeDetail extends Model
{
    use HasFactory;
    protected $fillable = ["incident_vehicule_id", "piece"];
}
