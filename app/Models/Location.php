<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Facturation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = ["vehicule_id", "client_id", "reservation_id", "conducteur_id", "organisation_id", "client_date_maroc", "conducteur_date_maroc", "date_depart", "lieu_depart", "date_retour", "lieu_retour", "reference", "canvas_data_livraison", "observation_assurance"];

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

    public function Facturation(): BelongsTo
    {
        return $this->belongsTo(Facturation::class, 'location_id');
    }
}
