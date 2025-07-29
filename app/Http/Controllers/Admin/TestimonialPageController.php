<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\TestimonialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialPageController extends Controller
{
    public function index()
    {
        $section = TestimonialSection::firstOrFail();
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('section', 'testimonials'));
    }

    public function updateSection(Request $request)
    {
        $section = TestimonialSection::firstOrFail();
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('background_image')) {
            if ($section->background_image) {
                Storage::delete($section->background_image);
            }
            $validated['background_image'] = $request->file('background_image')->store('testimonials/bg', 'public');
        }

        $section->update($validated);
        return redirect()->route('testimonials.index')->with('success', 'Section testimoni berhasil diperbarui!');
    }
}
