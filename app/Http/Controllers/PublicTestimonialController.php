<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\TestimonialSection;
class PublicTestimonialController extends Controller
{
    // TAMBAHKAN METODE INI
    public function create()
    {
        // 2. Ambil data section dan kirim ke view
        $testimonialSection = TestimonialSection::firstOrFail();
        return view('testimonials-create', compact('testimonialSection'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'quote' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:1024',
            'stars' => 'required|integer|min:1|max:5',
        ]);

        // Jika validasi gagal, kirim pesan error yang jelas
        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorMessage = 'Validation failed: ' . $errors->first();
            return response($errorMessage, 422);
        }

        $validated = $validator->validated();

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('testimonials','public');
        }
        
        Testimonial::create($validated);

        return response('OK');
    }
}