<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouleurVehicule extends Model
{
    use HasFactory;
    protected $fillable = ["couleur"];

    /**
     * Get the vehicule with this color.
     */
    public function Vehicules(): HasMany
    {
        return $this->hasMany(Vehicule::class);
    }
}
