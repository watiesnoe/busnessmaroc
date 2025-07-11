<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiements extends Model
{
    //
    protected $table = 'paiements'; // Specify the table name if it's not the plural of the model name
    protected $fillable = [
        'contratlocation_id', // Foreign key to the contratlocations table
        'montant', // Amount of the payment
        'date_paiement', // Date of the payment
        'mode_paiement', // Mode of payment (cash, card, etc.)
        'statut', // Status of the payment (completed, pending, etc.)
    ];
    public function contratlocation()
    {
        return $this->belongsTo(Contratlocation::class, 'contratlocation_id');
    }

}
