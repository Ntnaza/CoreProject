<?php

// app/Http/Controllers/Admin/CtaController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CtaController extends Controller
{
    public function edit()
    {
        // Ambil baris pertama (dan satu-satunya)
        $cta = Cta::firstOrFail();
        return view('admin.cta.edit', compact('cta'));
    }
public function update(Request $request)
{
    $cta = Cta::firstOrFail();

    $validated = $request->validate([
        'headline' => 'required|string|max:255',
        'paragraph' => 'required|string',
        'button_text' => 'required|string|max:50',
        'button_url' => 'required|string',
        'background_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('background_image')) {
        // Hapus gambar lama jika ada dan bukan placeholder
        if ($cta->background_image && $cta->background_image !== 'placeholder.jpg') {
            Storage::delete($cta->background_image);
        }
        
        // Simpan gambar baru ke folder 'cta' di dalam public disk
        // Logika ini disamakan dengan PortfolioItemController
        $imagePath = $request->file('background_image')->store('cta', 'public');
        $validated['background_image'] = $imagePath;
    }

    $cta->update($validated);

    return redirect()->route('admin.cta.edit')->with('success', 'Bagian Call to Action berhasil diperbarui!');
}
}