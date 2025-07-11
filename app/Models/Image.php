<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    use HasFactory;

    protected $table = 'images'; // Specify the table name if it's not the plural of the model name
    protected $fillable = [
        'immobilier_id', // Foreign key to the immobiliers table
        'typeimage', // URL of the image
        'dateposte', // Description of the image
        'statut', // statut
    ];
    Public function immobilier()
    {
        return $this->belongsTo(Immobilier::class, 'immobilier_id');
    }
}
