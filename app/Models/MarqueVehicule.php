<?php

namespace App\Models;

use App\Models\ModelVehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MarqueVehicule extends Model
{
    use HasFactory;
    protected $fillable = ["marque"];

    /**
     * Get the Modles for this Marque.
     */
    public function ModelVehicules(): HasMany
    {
        return $this->hasMany(ModelVehicule::class);
    }
}
