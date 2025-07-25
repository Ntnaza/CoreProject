<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroItem;
use App\Models\About; // <-- 1. Tambahkan ini untuk mengimpor model About
use App\Models\FeatureSection;
use App\Models\FeatureItem;
use App\Models\ServiceSection;
use App\Models\Service;
use App\Models\Cta;
use App\Models\PortfolioCategory;
use App\Models\PortfolioItem;
use App\Models\TeamSection;
use App\Models\TeamMember;
use App\Models\ContactInfo; 
class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan semua data yang diperlukan.
     */
    public function index()
    {
        // 2. Ambil semua data yang dibutuhkan oleh halaman utama
        $heroItems = HeroItem::latest()->get();
        $about = About::firstOrFail();
        $featureSection = FeatureSection::firstOrFail();
        $featureItems = FeatureItem::all();
        $serviceSection = ServiceSection::firstOrFail();
        $services = Service::all();
        $cta = Cta::firstOrFail();
        $portfolioCategories = PortfolioCategory::all();
        $portfolioItems = PortfolioItem::with('category')->get();
        $teamSection = TeamSection::firstOrFail();
        $teamMembers = TeamMember::all();
       $contactInfo = ContactInfo::firstOrFail();
$services = Service::all();
    
    // Kirim semua data ke view
    return view('layouts.main', compact('heroItems', 'about', 'featureSection', 'featureItems', 'serviceSection', 'services', 'cta', 'portfolioCategories', 'portfolioItems', 'teamSection', 'teamMembers','contactInfo', 'services'));
    }

    // 4. Metode aboutSectionData() sudah tidak diperlukan lagi
    // karena logikanya sudah kita pindahkan ke dalam metode index()
}