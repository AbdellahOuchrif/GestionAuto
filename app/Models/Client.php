<?php

namespace App\Models;

use App\Models\Reservation;
use App\Models\PieceJointeClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ["nom_complet", "email", "tel", "tel_2", "pays", "ville", "adresse", "num_permis", "type_permis", "permis_delivre", "date_naissance", "sexe", "lieu_naissance", "nationalite", "num_cin", "cin_delivre", "cin_validite", "num_passeport", "passeport_delivre", "passeport_validite", "permis_validite"];

    /**
     * Get the pieces jointes for the client.
     */
    public function PieceJointesClients(): HasMany
    {
        return $this->hasMany(PieceJointeClient::class);
    }
    
    /**
     * Get the Reservation for this client.
     */
    public function Reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }
}
