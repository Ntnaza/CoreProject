<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroItemController extends Controller
{
    public function index()
    {
        $items = HeroItem::latest()->get();
        return view('admin.hero-items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.hero-items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar dan dapatkan path-nya
        $imagePath = $request->file('image')->store('hero-carousel', 'public');

        HeroItem::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.hero-items.index')->with('success', 'Item berhasil ditambahkan!');
    }

    public function edit(HeroItem $heroItem)
    {
        return view('admin.hero-items.edit', compact('heroItem'));
    }

    public function update(Request $request, HeroItem $heroItem)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::delete($heroItem->image);
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('hero-carousel', 'public');
            $validated['image'] = $imagePath;
        }

        $heroItem->update($validated);

        return redirect()->route('admin.hero-items.index')->with('success', 'Item berhasil diperbarui!');
    }

    public function destroy(HeroItem $heroItem)
    {
        // Hapus file gambar dari storage
        Storage::delete($heroItem->image);
        // Hapus data dari database
        $heroItem->delete();

        return redirect()->route('admin.hero-items.index')->with('success', 'Item berhasil dihapus!');
    }
}