<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroItem;
use App\Models\About;
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
use App\Models\Testimonial;
use App\Models\TestimonialSection;
class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan semua data yang diperlukan.
     */
    public function index()
    {
        $heroItems = HeroItem::latest()->get();
        $about = About::firstOrFail();
        $featureSection = FeatureSection::firstOrFail();
        $featureItems = FeatureItem::all();
        $serviceSection = ServiceSection::firstOrFail();
        $services = Service::all(); // Cukup panggil sekali
        $cta = Cta::firstOrFail();
        $portfolioCategories = PortfolioCategory::all();
        $portfolioItems = PortfolioItem::with('category')->get();
        $teamSection = TeamSection::firstOrFail();
        $teamMembers = TeamMember::all();
        $contactInfo = ContactInfo::firstOrFail();
        $testimonials = Testimonial::where('is_approved', true)->latest()->get();
         $testimonialSection = TestimonialSection::firstOrFail();

        // Kirim semua data ke view
        return view('layouts.main', compact(
            'heroItems', 'about', 'featureSection', 'featureItems', 'serviceSection',
            'services', // Cukup panggil sekali
            'cta', 'portfolioCategories', 'portfolioItems', 'teamSection',
            'teamMembers','contactInfo', 'testimonialSection', 'testimonials'
        ));
    }
}