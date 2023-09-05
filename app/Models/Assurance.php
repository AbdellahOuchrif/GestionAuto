<?php

namespace App\Models;

use App\Models\AssuranceDetail;
use App\Models\OptionAssurance;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Assurance extends Model
{
    use HasFactory;
    protected $fillable = ["type"];

    public function OptionAssurances(): HasMany
    {
        return $this->hasMany(OptionAssurance::class);
    }

    public function AssuranceDetails(): HasMany
    {
        return $this->hasMany(AssuranceDetail::class);
    }
}
