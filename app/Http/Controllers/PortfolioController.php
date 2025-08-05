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
        $portfolioItems = PortfolioItem::latest()->get();
        $portfolioCategories = PortfolioCategory::all();
        // Asumsi data section diambil dari tempat lain atau tidak diperlukan di sini
        return view('portfolio', compact('portfolioItems', 'portfolioCategories'));
    }

    // BARU: Method untuk menampilkan halaman detail
    public function show(PortfolioItem $portfolioItem)
    {
        // $portfolioItem sudah otomatis diambil oleh Laravel berdasarkan slug di URL
        return view('portfolio-detail', compact('portfolioItem'));
    }
}