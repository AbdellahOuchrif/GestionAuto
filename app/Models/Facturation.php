<?php

namespace App\Models;

use App\Models\Location;
use App\Models\ModePaiement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facturation extends Model
{
    use HasFactory;

    protected $fillable = ["location_id", "mode_paiement_id", "organisation_id", "type", "nbr", "acompte", "prix", "unite", "frais_livraison", "frais_reprise", "remise", "tva", "reference", "franchise", "reference_franchise", "pourcentage_franchise" ,"franchise_organisation_id"];

    public function Locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }

    public function ModePaiement(): BelongsTo
    {
        return $this->belongsTo(ModePaiement::class, 'mode_paiement_id');
    }

    public function ModePaiementFranchise(): BelongsTo
    {
        return $this->belongsTo(ModePaiement::class, 'mode_paiement_id');
    }
    
}
