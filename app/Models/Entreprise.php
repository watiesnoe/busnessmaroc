<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $table = 'entreprises';

    protected $fillable = [
        'nom',
        'email',
        'telephone',
        'adresse',
        'site_web',
        'description',
        'secteur', // agriculture, banque, informatique...
    ];

    /**
     * 🔹 Une entreprise peut avoir plusieurs biens immobiliers
     */
    public function immobiliers()
    {
        return $this->hasMany(Immobilier::class);
    }

    /**
     * 🔹 Optionnel : une entreprise peut avoir plusieurs contacts
     */
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
