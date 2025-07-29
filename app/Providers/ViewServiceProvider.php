<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\ContactInfo;
use App\Models\Service; // <-- 1. Tambahkan use statement ini
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {
            $view->with('setting', Setting::first());
            $view->with('contactInfo', ContactInfo::first());
            // 2. Tambahkan baris ini untuk mengirim data services
            $view->with('services', Service::all());
        });
    }
}