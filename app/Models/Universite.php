<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    use \App\Traits\HasUuid;
    //

    protected $fillable = [
        'nom',
        'adresse',
        'ville',
        'pays',
        'email',
        'telephone',
        'description',
        'logo',
    ];
    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }

    public function photos()
    {
        return $this->hasMany(UniversitePhoto::class);
    }


}
