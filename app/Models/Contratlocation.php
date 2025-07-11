<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contratlocation extends Model
{
    //
    protected $table = 'contratlocations'; // Specify the table name if it's not the plural of the model name
    protected $fillable = [
        'immobilier_id', // Foreign key to the immobiliers table
        'chambre_id', // Foreign key to the chambre table
        'date_debut', // Start date of the contract
        'date_fin', // End date of the contract
        'montant', // Amount for the contract
        'statut', // Status of the contract (active, expired, etc.)
    ];
    public function immobilier()
    {
        return $this->belongsTo(Immobiliers::class, 'immobilier_id');
    }
    public function chambre()
    {
        return $this->belongsTo(Chambre::class, 'chambre_id');
    }
}
