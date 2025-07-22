<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vue extends Model
{
    use HasFactory; // ✅ Ce trait est ESSENTIEL

    protected $fillable = ['immobilier_id', 'ip_visiteur', 'user_agent'];

    public function immobilier()
    {
        return $this->belongsTo(Immobilier::class);
    }
}
