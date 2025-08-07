<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Public Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PublicTestimonialController;

// Admin Controllers
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\CtaController;
use App\Http\Controllers\Admin\DashboardController; // <-- PERBAIKAN: Import DashboardController
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeatureItemController;
use App\Http\Controllers\Admin\HeroItemController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServicePageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TeamPageController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TestimonialPageController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\GalleryCategoryController;
use App\Http\Controllers\Admin\GalleryItemController;

/*
|--------------------------------------------------------------------------
| RUTE PUBLIK (UNTUK PENGUNJUNG)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk halaman portfolio (daftar dan detail)
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
Route::get('/portfolio/{portfolioItem:slug}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Rute untuk form testimoni publik
Route::get('testimonials/create', [PublicTestimonialController::class, 'create'])->name('testimonials.public.create');
Route::post('testimonials', [PublicTestimonialController::class, 'store'])->name('testimonials.public.store');

Route::post('contact', [ContactMessageController::class, 'store'])->name('contact.store');
// PERBAIKAN: Route 'contact.store' dihapus karena form kontak publik sudah tidak ada.


/*
|--------------------------------------------------------------------------
| RUTE ADMIN (YANG DILINDUNGI)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {

    // PERBAIKAN: Mengarahkan route dasbor ke DashboardController agar data dinamis
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // ... (Rute-rute lain tetap sama) ...
    Route::resource('hero-items', HeroItemController::class);
    
    Route::get('about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');

    Route::get('features', [FeatureController::class, 'index'])->name('features.index');
    Route::put('features', [FeatureController::class, 'updateSection'])->name('features.section.update');
    Route::resource('feature-items', FeatureItemController::class)->except(['show']);

    Route::get('services', [ServicePageController::class, 'index'])->name('services.index');
    Route::put('services', [ServicePageController::class, 'updateSection'])->name('services.section.update');
    Route::resource('service-items', ServiceController::class)->except(['show']);

    Route::get('cta', [CtaController::class, 'edit'])->name('cta.edit');
    Route::put('cta', [CtaController::class, 'update'])->name('cta.update');

    Route::resource('portfolio-categories', PortfolioCategoryController::class)->except('show');
    Route::resource('portfolio-items', PortfolioItemController::class)->except('show');

    Route::get('team', [TeamPageController::class, 'index'])->name('team.index');
    Route::put('team', [TeamPageController::class, 'updateSection'])->name('team.section.update');
    Route::resource('team-members', TeamMemberController::class)->except(['show']);

    Route::get('contact', [ContactPageController::class, 'index'])->name('contact.index');
    Route::put('contact', [ContactPageController::class, 'updateInfo'])->name('contact.info.update');
    Route::delete('contact-messages/{contactMessage}', [ContactPageController::class, 'destroyMessage'])->name('contact.message.destroy');

    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SettingController::class, 'update'])->name('settings.update');

    Route::resource('testimonials', TestimonialController::class)->except(['show']);
    Route::post('testimonials/{testimonial}/approve', [TestimonialController::class, 'approve'])->name('testimonials.approve');
    Route::post('testimonials/{testimonial}/unapprove', [TestimonialController::class, 'unapprove'])->name('testimonials.unapprove');
    Route::get('testimonial-page-settings', [TestimonialPageController::class, 'index'])->name('testimonials.page.settings');
    Route::post('testimonial-page-settings', [TestimonialPageController::class, 'updateSection'])->name('testimonials.section.update');

    Route::resource('gallery-categories', GalleryCategoryController::class)->except('show');
    Route::resource('gallery-items', GalleryItemController::class)->except('show');
});


/*
|--------------------------------------------------------------------------
| RUTE PROFIL PENGGUNA (BAWAAN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';