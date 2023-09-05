<?php

namespace App\Models;

use App\Models\EntretientDelai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeEntretien extends Model
{
    use HasFactory;

    protected $fillable = ["type"];

    /**
     * Get the entretientdelai of this typeEntretien
     */
    public function EntretientDelai(): HasMany
    {
        return $this->hasMany(EntretientDelai::class);
    }
}
