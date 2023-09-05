<?php

namespace App\Models;

use App\Models\Vehicule;
use App\Models\MarqueVehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelVehicule extends Model
{
    use HasFactory;
    protected $fillable = ["model", "marque_vehicule_id"];

    /**
     * Get the Marque of this Model.
     */
    public function MarqueVehicule(): BelongsTo
    {
        return $this->belongsTo(MarqueVehicule::class, 'marque_vehicule_id');
    }

    /**
     * Get the vehicule with this Model.
     */
    public function Vehicules(): HasMany
    {
        return $this->hasMany(Vehicule::class);
    }
}
