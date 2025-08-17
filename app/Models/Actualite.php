<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    // Nom de la table (optionnel si le nom suit la convention)
    protected $table = 'actualites';

    // Les colonnes qui peuvent être assignées en masse
    protected $fillable = [
        'titre',
        'contenu',
        'image',
        'auteur',
        'date_publication',
    ];

    // Si tu veux que 'date_publication' soit traité comme un objet Carbon
    protected $dates = [
        'date_publication',
        'created_at',
        'updated_at',
    ];
}
