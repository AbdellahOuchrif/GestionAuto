<?php

namespace App\Models;

use App\Models\PieceVehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PieceVehiculeDetail extends Model
{
    use HasFactory;

    protected $fillable = ["piece_vehicule_id", "etat_vehicule_id"];

    public function PieceVehicule(): BelongsTo
    {
        return $this->belongsTo(PieceVehicule::class, 'piece_vehicule_id');
    }
}
