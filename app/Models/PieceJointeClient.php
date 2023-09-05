<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PieceJointeClient extends Model
{
    use HasFactory;

    protected $fillable = ["client_id", "pj_nom", "pj_url"];

    /**
     * Get the client that owns the piece jointe.
     */
    public function Client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
