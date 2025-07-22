<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['nom'];

    public function immobiliers()
    {
        return $this->hasMany(Immobilier::class);
    }
}
