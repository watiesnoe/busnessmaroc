<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobilier extends Model
{
    use HasFactory;
    protected $table = 'immobiliers'; // Specify the table name if it's not the plural of the model name

    protected $fillable = [
        'description', // Example field, replace with actual fields
        'typeimmeuble', // Example field, replace with actual fields
        'localisation', // Example field, replace with actual fields
        // Add other fields as necessary
    ];
    public function chambres()
    {
        return $this->hasMany(Chambre::class, 'immobilier_id');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'immobilier_id');
    }
    public function image()
    {
        return $this->belongsTo(Image::class, 'immobilier_id');
    }
}
