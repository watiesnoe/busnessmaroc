<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Universite extends Model
{
    use \App\Traits\HasUuid;
    //

    protected $fillable = [
        'uuid',
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

    public function getLogoUrlAttribute(): string
    {
        return get_image_url($this->logo);
    }
}
