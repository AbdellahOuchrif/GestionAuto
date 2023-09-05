<?php

namespace App\Models;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChangementVehiculeLocation extends Model
{
    use HasFactory;

    protected $fillable = ["location_id", "vehicule_id", "date_changement_vehicule", "motif"];

    public function Vehicule(): BelongsTo
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }
}
