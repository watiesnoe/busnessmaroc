<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use \App\Traits\HasUuid;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int,string>
     */
protected $fillable = [
    'name',
    'email',
    'password',
    'role',       // client/admin
    'prenom',
    'nom',
    'telephone',
    'adresse',
];
    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
    // Candidature.php


    public function offre()
    {
        return $this->hasMany(Offre::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int,string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string,string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
