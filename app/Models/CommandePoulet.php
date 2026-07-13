<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CommandePoulet extends Model
{
    use HasFactory;

    protected $table = 'commandes_poulet';

    protected $fillable = [
        'uuid',
        'user_id',
        'nom_client',
        'telephone_client',
        'email_client',
        'adresse_livraison',
        'ville_livraison',
        'poulet_chair_qty',
        'poulet_cuit_qty',
        'prix_unitaire_chair',
        'prix_unitaire_cuit',
        'montant_total',
        'date_livraison_souhaitee',
        'creneau_livraison',
        'notes',
        'statut',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Calcule le montant total automatiquement
     */
    public static function calculerTotal(int $chairQty, int $cuitQty, float $prixChair = 3000, float $prixCuit = 4000): float
    {
        return ($chairQty * $prixChair) + ($cuitQty * $prixCuit);
    }

    public function getStatutLabelAttribute(): string
    {
        return match ($this->statut) {
            'en_attente'     => 'En attente',
            'confirmee'      => 'Confirmée',
            'en_preparation' => 'En préparation',
            'livree'         => 'Livrée',
            'annulee'        => 'Annulée',
            default          => ucfirst($this->statut),
        };
    }

    public function getStatutBadgeClassAttribute(): string
    {
        return match ($this->statut) {
            'en_attente'     => 'bg-warning text-dark',
            'confirmee'      => 'bg-primary',
            'en_preparation' => 'bg-info',
            'livree'         => 'bg-success',
            'annulee'        => 'bg-danger',
            default          => 'bg-secondary',
        };
    }
}
