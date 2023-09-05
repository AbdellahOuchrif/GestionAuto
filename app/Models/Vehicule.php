<?php

namespace App\Models;

use App\Models\Reservation;
use App\Models\ImageVehicule;
use App\Models\ModelVehicule;
use App\Models\ArabicAlphabet;
use App\Models\CouleurVehicule;
use App\Models\IncidentVehicule;
use App\Models\PieceJointeVehicule;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChangementVehiculeLocation;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicule extends Model
{
    use HasFactory;
    protected $fillable = ["etat_id", "model_vehicule_id", "immatriculation_num", "immatriculation_lettre", "immatriculation_region",
                            "type_vehicule_id", "couleur_vehicule_id", "transmission_vehicule_id", "date_acquisition", "nbr_place",
                            "date_disponibilite", "tarif", "unite", "km_compteur", "canvas_data"
                        ];

     /**
     * Get the Model of this vehicule.
     */
    public function ModelVehicule(): BelongsTo
    {
        return $this->belongsTo(ModelVehicule::class, 'model_vehicule_id');
    }
     
    /**
     * Get the color of this vehicule.
     */
    public function CouleurVehicule(): BelongsTo
    {
        return $this->belongsTo(CouleurVehicule::class, 'couleur_vehicule_id');
    }

    /**
     * Get the ETAT of this Model.
     */
    public function Etat(): BelongsTo
    {
        return $this->belongsTo(Etat::class, 'etat_id');
    }

    /**
     * Get the Marque of this Model.
     */
    public function TypeVehicule(): BelongsTo
    {
        return $this->belongsTo(TypeVehicule::class, 'type_vehicule_id');
    }

    /**
     * Get the Images for the vehicule.
     */
    public function ImageVehicules(): HasMany
    {
        return $this->hasMany(ImageVehicule::class);
    }

    /**
     * Get the Incidents for this vehicule.
     */
    public function IncidentVehicules(): HasMany
    {
        return $this->hasMany(IncidentVehicule::class);
    }

    /**
     * Get the Reservation for this vehicule.
     */
    public function Reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    /**
     * Get the the profile picture for the vehicule.
     */
    public function ImageVehiculePfp() {
        return $this->ImageVehicules()->first('url');
    }

    /**
     * Get the Pieces Jointes for the vehicule.
     */
    public function PieceJointeVehicules(): HasMany
    {
        return $this->hasMany(PieceJointeVehicule::class);
    }

    public function ChangementVehiculeLocation(): HasMany
    {
        return $this->hasMany(ChangementVehiculeLocation::class);
    }
}
