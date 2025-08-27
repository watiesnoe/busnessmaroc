<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    //
    protected $fillable = [
        'titre',
        'type_offre',
        'date_publication',
        'entreprise',
        'lieu',
        'secteur',
        'niveau',
        'date_limite',
        'salaire',
        'profil_recherche',
        'description',
        'mode_candidature',
        'lien_candidature',
        "nombre_limite_candidats",
        'is_active',
    ];

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
}
