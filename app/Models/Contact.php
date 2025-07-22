<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory; // ← OBLIGATOIRE !

    protected $fillable = ['immobilier_id', 'nom', 'email', 'message'];

    public function immobilier()
    {
        return $this->belongsTo(Immobilier::class);
    }
}
