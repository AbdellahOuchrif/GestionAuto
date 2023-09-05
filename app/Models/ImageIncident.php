<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageIncident extends Model
{
    use HasFactory;
    protected $fillable = ["incident_vehicule_id", "url_incident"];
}
