<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{

    protected $fillable = [
        'titre', 'description', 'lieu', 'date_debut', 'date_fin',
        'prix_ticket', 'image', 'statut'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
