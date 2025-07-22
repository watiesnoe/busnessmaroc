<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favori extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'immobilier_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function immobilier()
    {
        return $this->belongsTo(Immobilier::class);
    }
}
