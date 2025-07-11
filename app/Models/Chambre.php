<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    //
    protected $table = 'chambres'; // Specify the table name if it's not the plural of the model name
    protected $fillable = [
        'immobilier_id', // Foreign key to the immobiliers table
        'typechambre', // Type of the room
        'prix_jour',
        'prix_mois',
        'prix_annee',
        'capacite', // Capacity of the room
        'description', // Description of the room
        'statut', // Status of the room (available, booked, etc.)
    ];
    public function immobilier()
    {
        return $this->belongsTo(Immobilier::class, 'immobilier_id');
    }
}
