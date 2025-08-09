<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioItem;
use App\Models\PortfolioCategory; // Pastikan ini di-import
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioItemController extends Controller
{
    /**
     * PERBAIKAN: Method ini sekarang mengambil data item DAN kategori
     */
    public function index()
    {
        $portfolioItems = PortfolioItem::with('category')->latest()->get();
        $portfolioCategories = PortfolioCategory::all(); // Mengambil data kategori

        return view('admin.portfolio-items.index', compact('portfolioItems', 'portfolioCategories'));
    }

    // Method create(), store(), edit(), update(), destroy() tidak perlu diubah
    // ... (kode Anda yang lain tetap sama) ...

    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'detail_url' => 'nullable|url',
        ]);
        $validated['slug'] = Str::slug($request->title, '-');
        $validated['image'] = $request->file('image')->store('portfolio', 'public');
        PortfolioItem::create($validated);
        return redirect()->route('admin.portfolio-items.index')->with('success', 'Item produk berhasil ditambahkan.');
    }

    public function edit(PortfolioItem $portfolioItem)
    {
        $categories = PortfolioCategory::all();
        return view('admin.portfolio-items.edit', compact('portfolioItem', 'categories'));
    }

    public function update(Request $request, PortfolioItem $portfolioItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'detail_url' => 'nullable|url',
        ]);
        $validated['slug'] = Str::slug($request->title, '-');
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($portfolioItem->image);
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }
        $portfolioItem->update($validated);
        return redirect()->route('admin.portfolio-items.index')->with('success', 'Item produk berhasil diperbarui.');
    }

    public function destroy(PortfolioItem $portfolioItem)
    {
        Storage::disk('public')->delete($portfolioItem->image);
        $portfolioItem->delete();
        return redirect()->route('admin.portfolio-items.index')->with('success', 'Item produk berhasil dihapus.');
    }
}