<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IncidentVehicule extends Model
{
    use HasFactory;
    protected $fillable = ["vehicule_id", "reservation_id", "date_incident", "description"];

    /**
     * Get the Vehicule for this incident.
     */
    public function Vehicule(): BelongsTo
    {
        return $this->belongsTo(Vehicule::class, "vehicule_id");
    }
}
