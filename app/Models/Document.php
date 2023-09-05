<?php

namespace App\Models;

use App\Models\DocumentDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ["type"];

    public function DocumentDetails(): HasMany
    {
        return $this->hasMany(DocumentDetail::class);
    }
}
