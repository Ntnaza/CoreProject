<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureItem;
use Illuminate\Http\Request;

class FeatureItemController extends Controller
{
    /**
     * Menampilkan form untuk membuat item fitur baru.
     */
    public function create()
    {
        return view('admin.feature-items.create');
    }

    /**
     * Menyimpan item fitur baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        FeatureItem::create($validated);

        return redirect()->route('features.index')->with('success', 'Icon Box baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit item fitur.
     */
    public function edit(FeatureItem $featureItem)
    {
        return view('admin.feature-items.edit', compact('featureItem'));
    }

    /**
     * Memperbarui item fitur di database.
     */
    public function update(Request $request, FeatureItem $featureItem)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $featureItem->update($validated);

        return redirect()->route('features.index')->with('success', 'Icon Box berhasil diperbarui!');
    }

    /**
     * Menghapus item fitur dari database.
     */
    public function destroy(FeatureItem $featureItem)
    {
        $featureItem->delete();

        return redirect()->route('features.index')->with('success', 'Icon Box berhasil dihapus!');
    }
}