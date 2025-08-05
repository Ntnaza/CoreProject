<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceSection;
use Illuminate\Http\Request;

class ServicePageController extends Controller
{
    public function index()
    {
        $serviceSection = ServiceSection::firstOrFail();
        $services = Service::all();
        return view('admin.services.index', compact('serviceSection', 'services'));
    }

    public function updateSection(Request $request)
    {
        $serviceSection = ServiceSection::firstOrFail();
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
        ]);
        $serviceSection->update($validated);
        return redirect()->route('admin.services.index')->with('success', 'Judul section berhasil diperbarui!');
    }
}