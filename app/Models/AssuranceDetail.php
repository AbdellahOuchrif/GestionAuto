<?php

namespace App\Models;

use App\Models\Assurance;
use App\Models\OptionAssurance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AssuranceDetail extends Model
{
    use HasFactory;

    protected $fillable = ["location_id", "option_assurance_id", "assurance_id"];

    public function OptionAssurance(): BelongsTo
    {
        return $this->belongsTo(OptionAssurance::class, 'option_assurance_id');
    }

    public function Assurance(): BelongsTo
    {
        return $this->belongsTo(Assurance::class, 'assurance_id');
    }
}
