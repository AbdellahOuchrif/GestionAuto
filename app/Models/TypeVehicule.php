<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeVehicule extends Model
{
    use HasFactory;
    protected $fillable = ["type"];

    /**
     * Get the vehicule with this Type.
     */
    public function Vehicules(): HasMany
    {
        return $this->hasMany(Vehicule::class);
    }
}
