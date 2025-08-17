<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    //
    protected $fillable = ['universite_id', 'nom', 'description'];

    public function universite()
    {
        return $this->belongsTo(Universite::class);
    }
}
