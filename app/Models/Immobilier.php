<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Immobilier extends Model
{
    use HasFactory;

    protected $table = 'immobiliers';

    protected $fillable = [
        'user_id',
        'category_id',
        'titre',
        'description',
        'ville',
        'quartier',
        'surface',
        'prix',
        'etage',
        'en_vedette',
        'statut',
    ];

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function photoPrincipale()
    {
        return $this->hasOne(Photo::class)->where('principale', true);
    }

    public function favoris()
    {
        return $this->hasMany(Favori::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function vues()
    {
        return $this->hasMany(Vue::class);
    }
}
