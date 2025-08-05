<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|string',
        ]);
        Service::create($validated);
        return redirect()->route('admin.services.index')->with('success', 'Item layanan baru berhasil ditambahkan!');
    }

    // --- PERUBAHAN DIMULAI DARI SINI ---
    public function edit(Service $service_item) // Ubah $service menjadi $service_item
    {
        return view('admin.services.edit', compact('service_item')); // Kirim dengan nama service_item
    }

    public function update(Request $request, Service $service_item) // Ubah $service menjadi $service_item
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'required|string',
        ]);
        $service_item->update($validated); // Gunakan $service_item
        return redirect()->route('admin.services.index')->with('success', 'Item layanan berhasil diperbarui!');
    }

    public function destroy(Service $service_item) // Ubah $service menjadi $service_item
    {
        $service_item->delete(); // Gunakan $service_item
        return redirect()->route('admin.services.index')->with('success', 'Item layanan berhasil dihapus!');
    }
}