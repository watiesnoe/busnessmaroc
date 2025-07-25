<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContratLocation extends Model
{
    protected $table = 'contrat_locations';

    protected $fillable = [
        'user_id',
        'immobilier_id',
        'chambre_id',
        'date_debut',
        'date_fin',
        'type_contrat',

    ];
//    protected $fillable = [
//        'user_id',
//        'immobilier_id',
//        'chambre_id',
//        'date_debut',
//        'date_fin',
//        'type_contrat',
//        'prix_total',
//        'statut',
//        'conditions_particulieres',
//    ];

    // Relations
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
