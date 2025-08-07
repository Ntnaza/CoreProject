<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::all();
        return view('admin.gallery_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.gallery_categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $validated['filter'] = Str::slug($validated['name']);
        GalleryCategory::create($validated);
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(GalleryCategory $galleryCategory)
    {
        return view('admin.gallery_categories.edit', ['category' => $galleryCategory]);
    }

    public function update(Request $request, GalleryCategory $galleryCategory)
    {
        $validated = $request->validate(['name' => 'required|string|max:255']);
        $validated['filter'] = Str::slug($validated['name']);
        $galleryCategory->update($validated);
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(GalleryCategory $galleryCategory)
    {
        $galleryCategory->delete();
        return redirect()->route('admin.gallery-categories.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
