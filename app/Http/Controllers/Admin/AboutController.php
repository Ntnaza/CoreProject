<?php

// app/Http/Controllers/Admin/AboutController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function edit()
    {
        // Ambil baris pertama (dan satu-satunya) dari tabel abouts
        $about = About::firstOrFail();
        return view('admin.about.edit', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::firstOrFail();

        $validated = $request->validate([
            'section_title' => 'required|string|max:255',
            'section_subtitle' => 'required|string',
            'headline' => 'required|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'paragraph1' => 'required|string',
            'paragraph2' => 'required|string',
            'italic_paragraph' => 'required|string',
            'list_items' => 'required|string',
            'final_paragraph' => 'required|string',
            'video_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'video_url' => 'required|url',
        ]);

        if ($request->hasFile('main_image')) {
            Storage::delete($about->main_image);
            $validated['main_image'] = $request->file('main_image')->store('about' , 'public');
        }

        if ($request->hasFile('video_image')) {
            Storage::delete($about->video_image);
            $validated['video_image'] = $request->file('video_image')->store('about' , 'public');
        }

        $about->update($validated);

        return redirect()->route('about.edit')->with('success', 'Halaman About Us berhasil diperbarui!');
    }
}
