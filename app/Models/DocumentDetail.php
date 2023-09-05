<?php

namespace App\Models;

use App\Models\Document;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentDetail extends Model
{
    use HasFactory;
    protected $fillable = ["vehicule_id", "document_id", "date_debut", "date_fin", "rappel"];

    public function Document(): BelongsTo
    {
        return $this->belongsTo(Document::class, 'document_id');
    }
}
