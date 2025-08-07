<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryItem;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryItemController extends Controller
{
    public function index()
    {
        $items = GalleryItem::with('category')->latest()->get();
        return view('admin.gallery_items.index', compact('items'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_category_id' => 'required|exists:gallery_categories,id',
        ]);

        $validated['image'] = $request->file('image')->store('gallery', 'public');
        GalleryItem::create($validated);

        return redirect()->route('admin.gallery-items.index')->with('success', 'Item galeri berhasil ditambahkan.');
    }

    public function edit(GalleryItem $galleryItem)
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery_items.edit', ['item' => $galleryItem, 'categories' => $categories]);
    }

    public function update(Request $request, GalleryItem $galleryItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gallery_category_id' => 'required|exists:gallery_categories,id',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($galleryItem->image);
            $validated['image'] = $request->file('image')->store('gallery', 'public');
        }

        $galleryItem->update($validated);

        return redirect()->route('admin.gallery-items.index')->with('success', 'Item galeri berhasil diperbarui.');
    }

    public function destroy(GalleryItem $galleryItem)
    {
        Storage::disk('public')->delete($galleryItem->image);
        $galleryItem->delete();
        return redirect()->route('admin.gallery-items.index')->with('success', 'Item galeri berhasil dihapus.');
    }
}
