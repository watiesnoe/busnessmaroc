<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversitePhoto extends Model
{
    //
    use HasFactory, \App\Traits\HasUuid;

    protected $fillable = ['universite_id', 'photo'];

    public function universite()
    {
        return $this->belongsTo(Universite::class);
    }
}
