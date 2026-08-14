<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory, \App\Traits\HasUuid; // ✅ C'est ce trait qui permet d'appeler ->factory()

    protected $fillable = ['immobilier_id', 'chambre_id', 'url', 'principale'];


    public function immobilier()
    {
        return $this->belongsTo(Immobilier::class);
    }

    public function chambre()
    {
        return $this->belongsTo(Chambre::class);
    }

    public function getImageUrlAttribute(): string
    {
        return get_image_url($this->url);
    }
}
