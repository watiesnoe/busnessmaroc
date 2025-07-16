<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

  protected $fillable = [ 
    'immobilier_id',
    'type',
    'prix_jour',
    'prix_mois',
    'prix_annee',
    'capacite',
    'statut',
    'description',
    'image' // ✅ champ image ajouté ici
];
    public function immobilier()
    {
        return $this->belongsTo(Immobilier::class);
    }

    // public function photos()
    // {
    //     return $this->hasMany(Photo::class);
    // }
}
