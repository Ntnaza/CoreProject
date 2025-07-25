<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Menggunakan closure based composer
        // Tanda '*' berarti variabel $setting akan tersedia di SEMUA view
        View::composer('*', function ($view) {
            $view->with('setting', Setting::first());
        });
    }
}