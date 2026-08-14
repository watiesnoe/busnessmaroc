<?php

if (!function_exists('get_image_url')) {
    /**
     * Obtenir une URL d'image valide pour n'importe quel chemin (public/image, storage, external URL).
     */
    function get_image_url(?string $path, ?string $fallback = null): string
    {
        if (empty($path)) {
            return $fallback ? asset($fallback) : asset('asset/imgs/location.png');
        }

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        $cleanPath = ltrim($path, '/');

        if (str_starts_with($cleanPath, 'image/') ||
            str_starts_with($cleanPath, 'images/') ||
            str_starts_with($cleanPath, 'asset/') ||
            str_starts_with($cleanPath, 'assets/') ||
            str_starts_with($cleanPath, 'admin/')) {
            return asset($cleanPath);
        }

        if (str_starts_with($cleanPath, 'storage/')) {
            return asset($cleanPath);
        }

        return asset('storage/' . $cleanPath);
    }
}
