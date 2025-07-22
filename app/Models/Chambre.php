<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;


  protected $fillable = [
    'immobilier_id',
    'type',
    'prix_jour',
    'prix_mois',
    'prix_annee',
    'capacite',
    'statut',
    'description',
    'image' // ✅ champ image ajouté ici
];
//
//    protected $fillable = [
//        'immobilier_id',
//        'typechambre',
//        'capacite',
//        'statut',
//        'prix_jour',
//        'prix_mois',
//        'prix_annee',
//        'description',
//    ];
//
//>>>>>>> 1473e24 (mis a jours du partie front-end)
    public function immobilier()
    {
        return $this->belongsTo(Immobilier::class);
    }

    // public function photos()
    // {
    //     return $this->hasMany(Photo::class);
    // }
}
