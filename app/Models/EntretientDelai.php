<?php

namespace App\Models;

use App\Models\TypeEntretien;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EntretientDelai extends Model
{
    use HasFactory;

    protected $fillable = ["vehicule_id", "entretien_id", "km_visee", "km_rappel"];

    /**
     * Get the entretient that are in this entretientdelai.
     */
    public function TypeEntretien(): BelongsTo
    {
        return $this->belongsTo(TypeEntretien::class, 'type_entretien_id');
    }
}
