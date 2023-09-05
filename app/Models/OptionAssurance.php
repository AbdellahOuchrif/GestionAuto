<?php

namespace App\Models;

use App\Models\Assurance;
use App\Models\AssuranceDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OptionAssurance extends Model
{
    use HasFactory;

    protected $fillable = ["designation", "assurance_id" ,"details"];

    public function Assurance(): BelongsTo
    {
        return $this->belongsTo(Assurance::class, 'assurance_id');
    }

    public function AssuranceDetails(): HasMany
    {
        return $this->hasMany(AssuranceDetail::class);
    }
}
