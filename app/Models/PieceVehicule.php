<?php

namespace App\Models;

use App\Models\PieceVehiculeDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PieceVehicule extends Model
{
    use HasFactory;

    protected $fillable = ["piece"];

    public function PieceVehiculeDetails(): HasMany
    {
        return $this->hasMany(PieceVehiculeDetail::class);
    }
}
