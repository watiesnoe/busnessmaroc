<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    use \App\Traits\HasUuid;

    protected $fillable = [
        'titre', 'description', 'lieu', 'date_debut', 'date_fin',
        'prix_ticket', 'image', 'statut','nombre_limite_places'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
