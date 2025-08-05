<?php

namespace App\Http\Controllers\Admin;

use App\Models\PortfolioCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    /**
     * Menampilkan daftar semua kategori portfolio.
     */
    public function index()
    {
        $portfolioCategories = PortfolioCategory::latest()->get();
        return view('admin.portfolio-categories.index', compact('portfolioCategories'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        return view('admin.portfolio-categories.create');
    }

    /**
     * Menyimpan kategori baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'filter' => 'required|string|max:255|unique:portfolio_categories',
        ]);

        PortfolioCategory::create($validated);

        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit kategori.
     */
    public function edit(PortfolioCategory $portfolioCategory)
    {
        return view('admin.portfolio-categories.edit', compact('portfolioCategory'));
    }

    /**
     * Memperbarui kategori di database.
     */
    public function update(Request $request, PortfolioCategory $portfolioCategory)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'filter' => 'required|string|max:255|unique:portfolio_categories,filter,' . $portfolioCategory->id,
        ]);

        $portfolioCategory->update($validated);

        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Menghapus kategori dari database.
     */
    public function destroy(PortfolioCategory $portfolioCategory)
    {
        $portfolioCategory->delete();

        return redirect()->route('admin.portfolio-categories.index')->with('success', 'Kategori berhasil dihapus!');
    }
}