<?php

namespace App\Models;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PieceJointeVehicule extends Model
{
    use HasFactory;

    /**
     * Get the vehicule that owns the piece jointe.
     */
    public function Vehicule(): BelongsTo
    {
        return $this->belongsTo(Vehicule::class);
    }
}
