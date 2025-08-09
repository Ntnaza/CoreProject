<?php

namespace App\Http\Controllers;

use App\Models\PortfolioItem;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    // Method untuk menampilkan halaman daftar portfolio
    public function index()
    {
        $portfolioCategories = PortfolioCategory::all();
        
        // PERBAIKAN: Tambahkan whereNotNull('slug') untuk memfilter data
        $portfolioItems = PortfolioItem::with('category')->whereNotNull('slug')->latest()->get();

        // Pastikan Anda punya view bernama 'portfolio.blade.php' atau sesuaikan
        return view('portfolio', compact('portfolioItems', 'portfolioCategories'));
    }

    // BARU: Method untuk menampilkan halaman detail
    public function show(PortfolioItem $portfolioItem)
    {
        // $portfolioItem sudah otomatis diambil oleh Laravel berdasarkan slug di URL
        return view('portfolio-detail', compact('portfolioItem'));
    }
}