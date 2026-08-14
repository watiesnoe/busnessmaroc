<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

if (file_exists(app_path('helpers.php'))) {
    require_once app_path('helpers.php');
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        // Gérer automatiquement la disponibilité des images dans public/image, public/images et storage/app/public/image
        $publicImage = public_path('image');
        $storagePublicImage = storage_path('app/public/image');
        $publicImages = public_path('images');

        if (file_exists($publicImage)) {
            if (!file_exists($storagePublicImage)) {
                @symlink($publicImage, $storagePublicImage);
                if (!file_exists($storagePublicImage)) {
                    @mkdir($storagePublicImage, 0755, true);
                    foreach (glob($publicImage . '/*') as $file) {
                        if (is_file($file)) {
                            @copy($file, $storagePublicImage . '/' . basename($file));
                        }
                    }
                }
            }
            if (!file_exists($publicImages)) {
                @symlink($publicImage, $publicImages);
            }
        }

        try {
            if (\App\Models\Universite::count() === 0) {
                app(\Database\Seeders\SiteDataSeeder::class)->run();
            }
        } catch (\Throwable $e) {
            // Ignore pre-migration boots
        }
    }
}

