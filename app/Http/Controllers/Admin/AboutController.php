<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        $about = About::firstOrFail();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::firstOrFail();

        // PERUBAIKAN: Hapus validasi untuk field yang tidak terpakai
        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'section_subtitle' => 'required|string',
            'italic_paragraph' => 'required|string',
            'list_items' => 'required|string',
            'video_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'required|url',
        ]);

        // PERUBAIKAN: Hapus logika upload untuk 'main_image' yang sudah tidak ada
        if ($request->hasFile('video_image')) {
            // Gunakan Storage::disk('public') untuk konsistensi
            if ($about->video_image) {
                Storage::disk('public')->delete($about->video_image);
            }
            $validated['video_image'] = $request->file('video_image')->store('about', 'public');
        }

        $about->update($validated);

        // Arahkan kembali ke route admin yang benar
        return redirect()->route('admin.about.edit')->with('success', 'Halaman Tentang Kami berhasil diperbarui!');
    }
}