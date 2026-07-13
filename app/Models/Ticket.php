<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use \App\Traits\HasUuid;
    protected $fillable = [
        'evenement_id', 'user_id', 'quantite', 'montant_total', 'statut'
    ];

    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

