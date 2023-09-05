<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Vehicule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ["vehicule_id", "client_id", "date_debut", "date_fin", "tarif", "description", "mode_paiement_id", "avance", "organisation_id", "reference"];
     /**
     * Get the Vehicule being rented.
     */
    public function Vehicule(): BelongsTo
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }

     /**
     * Get the Client who's renting.
     */
    public function Client(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
