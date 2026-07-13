<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Boot the trait: auto-generate UUID on creating.
     */
    protected static function bootHasUuid(): void
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Use uuid as the route key instead of the integer id.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }
}
