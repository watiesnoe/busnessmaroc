<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContratLocation extends Model
{
    use HasFactory, \App\Traits\HasUuid;

    protected $fillable = [
        'user_id',
        'immobilier_id',
        'chambre_id',
        'date_debut',
        'date_fin',
        'type_contrat',
        'prix_total',
        'poulet_chair_qty',
        'poulet_cuit_qty',
        'statut',
        'conditions_particulieres',
        'transaction_id'
    ];

    // 🔗 Relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function immobilier()
    {
        return $this->belongsTo(Immobilier::class);
    }

    public function chambre()
    {
        return $this->belongsTo(Chambre::class);
    }
}
