<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'quote' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'stars' => 'required|integer|min:1|max:5',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('testimonials','public');
        }

        Testimonial::create($validated);

        return redirect()->route('testimonials.index')->with('success', 'Testimoni baru berhasil ditambahkan!');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'quote' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'stars' => 'required|integer|min:1|max:5',
        ]);

        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::delete($testimonial->photo);
            }
            $validated['photo'] = $request->file('photo')->store('testimonials','public');
        }

        $testimonial->update($validated);

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo) {
            Storage::delete($testimonial->photo);
        }
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil dihapus!');
    }
    public function approve(Testimonial $testimonial)
{
    $testimonial->update(['is_approved' => true]);
    return redirect()->route('testimonials.index')->with('success', 'Testimoni berhasil disetujui dan ditampilkan.');
}
}