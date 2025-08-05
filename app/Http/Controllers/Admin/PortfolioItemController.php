<?php

namespace App\Http\Controllers\Admin;

use App\Models\PortfolioItem;
use App\Http\Controllers\Controller;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioItemController extends Controller
{
    /**
     * Menampilkan daftar semua item portfolio.
     */
    public function index()
    {
        // 'with('category')' digunakan untuk eager loading agar lebih efisien
        $portfolioItems = PortfolioItem::with('category')->latest()->get();
        return view('admin.portfolio-items.index', compact('portfolioItems'));
    }

    /**
     * Menampilkan form untuk membuat item baru.
     */
    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio-items.create', compact('categories'));
    }

    /**
     * Menyimpan item baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'detail_url' => 'nullable|string',
        ]);

        // Simpan gambar dan dapatkan path-nya
        $imagePath = $request->file('image')->store('portfolio','public');
        $validated['image'] = $imagePath;

        PortfolioItem::create($validated);

        return redirect()->route('portfolio-items.index')->with('success', 'Item portfolio baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit item.
     */
    public function edit(PortfolioItem $portfolioItem)
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio-items.edit', compact('portfolioItem', 'categories'));
    }

    /**
     * Memperbarui item di database.
     */
    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'detail_url' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::delete($portfolioItem->image);
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('portfolio','public');
            $validated['image'] = $imagePath;
        }

        $portfolioItem->update($validated);

        return redirect()->route('admin.portfolio-items.index')->with('success', 'Item portfolio berhasil diperbarui!');
    }

    /**
     * Menghapus item dari database.
     */
    public function destroy(PortfolioItem $portfolioItem)
    {
        // Hapus file gambar dari storage
        Storage::delete($portfolioItem->image);
        // Hapus data dari database
        $portfolioItem->delete();

        return redirect()->route('admin.portfolio-items.index')->with('success', 'Item portfolio berhasil dihapus!');
    }
}