<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    //

    protected $table = 'images'; // Specify the table name if it's not the plural of the model name
    protected $fillable = [
        'immobilier_id', // Foreign key to the immobiliers table
        'typeimage', // URL of the image
        'dateposte', // Description of the image
        'statut', // statut
    ];
    Public function immobilier()
    {
        return $this->belongsTo(Immobiliers::class, 'immobilier_id');
    }
}
