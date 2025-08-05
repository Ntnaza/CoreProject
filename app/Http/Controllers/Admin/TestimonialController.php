<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Validation\Rule; // PERBAIKAN: Dihapus karena tidak terpakai
// use App\Models\TestimonialPage;
use App\Models\TestimonialSection;
class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        $section = TestimonialSection::first();
        return view('admin.testimonials.index', compact('testimonials', 'section'));
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
            'quote' => 'required|string|max:50', 
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'stars' => 'sometimes|integer|min:1|max:5',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }
        
        $validated['status'] = 'Pending'; 

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni baru berhasil ditambahkan.');
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
            'quote' => 'required|string|max:50',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'stars' => 'sometimes|integer|min:1|max:5',
        ]);

        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimoni berhasil diperbarui!');
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $testimonial->delete();
            return response()->json(['success' => true, 'message' => 'Testimoni berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal menghapus testimoni.'], 500);
        }
    }

public function approve(Testimonial $testimonial)
{
    try {
        $testimonial->update(['status' => 'Disetujui']);
        return response()->json(['success' => true, 'message' => 'Testimoni berhasil disetujui.']);
    } catch (\Exception $e) {
    return response()->json(['success' => false, 'message' => 'Gagal menyetujui testimoni.'], 500);
}
}

    public function unapprove(Testimonial $testimonial)
    {
        // PENINGKATAN: Menambahkan try-catch untuk error handling
        try {
            $testimonial->update(['status' => 'Pending']);
            return response()->json(['success' => true, 'message' => 'Persetujuan testimoni dibatalkan.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal membatalkan persetujuan.'], 500);
        }
    }
}