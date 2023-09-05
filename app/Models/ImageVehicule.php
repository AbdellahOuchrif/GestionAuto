<?php

namespace App\Models;

use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ImageVehicule extends Model
{
    use HasFactory;

    /**
     * Get the vehicule that owns the image.
     */
    public function Vehicule(): BelongsTo
    {
        return $this->belongsTo(Vehicule::class, "vehicule_id");
    }
}
