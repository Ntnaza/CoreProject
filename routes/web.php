<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HeroItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeatureItemController;
use App\Http\Controllers\Admin\ServicePageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CtaController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\TeamPageController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\SettingController;   
Route::get('/', [HomeController::class, 'index'])->name('layouts.main');
// RUTE PUBLIK (di luar middleware auth)
Route::post('contact', [ContactMessageController::class, 'store'])->name('contact.store');

// Grup Rute untuk Admin yang Dilindungi Middleware
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::resource('hero-items', HeroItemController::class);

    // route about
    Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');
    // route features
    // Rute untuk Halaman Utama Features
    Route::get('features', [FeatureController::class, 'index'])->name('features.index');
    Route::put('features', [FeatureController::class, 'updateSection'])->name('features.section.update');
    // Rute untuk CRUD Item Fitur (Icon Boxes)
    Route::resource('feature-items', FeatureItemController::class)->except(['show']);
    // Rute admin lainnya yang dilindungi juga bisa ditambahkan di sini
    // Service
    Route::get('services', [ServicePageController::class, 'index'])->name('services.index');
    Route::put('services', [ServicePageController::class, 'updateSection'])->name('services.section.update');
        // Rute untuk CRUD Service Items
    Route::resource('service-items', ServiceController::class)->except(['show']);
     // Rute untuk Halaman Call To Action (CTA)
    Route::get('cta', [CtaController::class, 'edit'])->name('cta.edit');
    Route::put('cta', [CtaController::class, 'update'])->name('cta.update');
     // Rute untuk CRUD Kategori dan Item Portfolio
    Route::resource('portfolio-categories', PortfolioCategoryController::class)->except('show');
    Route::resource('portfolio-items', PortfolioItemController::class)->except('show');
    // Rute untuk Halaman Manajemen Team
    Route::get('team', [TeamPageController::class, 'index'])->name('team.index');
    Route::put('team', [TeamPageController::class, 'updateSection'])->name('team.section.update');

    // Rute untuk CRUD Anggota Tim
    Route::resource('team-members', TeamMemberController::class)->except(['show']);
     // Rute untuk Halaman Manajemen Kontak
    Route::get('contact', [ContactPageController::class, 'index'])->name('contact.index');
    Route::put('contact', [ContactPageController::class, 'updateInfo'])->name('contact.info.update');
    Route::delete('contact-messages/{contactMessage}', [ContactPageController::class, 'destroyMessage'])->name('contact.message.destroy');
        // Rute untuk Pengaturan Situs
    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
