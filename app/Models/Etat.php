<?php

namespace App\Models;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etat extends Model
{
    use HasFactory;
    protected $fillable = ["designation"];

    /**
     * Get the vehicule with this Etat.
     */
    public function Vehicules(): HasMany
    {
        return $this->hasMany(Vehicule::class);
    }
}
