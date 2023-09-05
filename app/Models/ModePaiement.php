<?php

namespace App\Models;

use App\Models\Facturation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModePaiement extends Model
{
    use HasFactory;
    protected $fillable = ["mode"];

    public function Facturations(): HasMany
    {
        return $this->hasMany(Facturation::class);
    }
}
