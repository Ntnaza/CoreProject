<?php

namespace App\Http\Controllers\Admin;

use App\Models\TeamMember;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    /**
     * Metode ini tidak digunakan karena daftar anggota tim
     * sudah ditampilkan di TeamPageController.
     * Kita arahkan saja ke halaman utama manajemen tim.
     */
    public function index()
    {
        return redirect()->route('admin.team.index');
    }

    /**
     * Menampilkan form untuk membuat anggota tim baru.
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Menyimpan anggota tim baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'twitter_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        // Simpan foto dan dapatkan path-nya
        $imagePath = $request->file('photo')->store('team','public');
        $validated['photo'] = $imagePath;

        TeamMember::create($validated);

        return redirect()->route('admin.team.index')->with('success', 'Anggota tim baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit anggota tim.
     */
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    /**
     * Memperbarui anggota tim di database.
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
            'twitter_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
        ]);

        if ($request->hasFile('photo')) {
            // Hapus foto lama
            Storage::delete($teamMember->photo);
            // Simpan foto baru
            $imagePath = $request->file('photo')->store('team', 'public');
            $validated['photo'] = $imagePath;
        }

        $teamMember->update($validated);

        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil diperbarui!');
    }

    /**
     * Menghapus anggota tim dari database.
     */
    public function destroy(TeamMember $teamMember)
    {
        // Hapus file foto dari storage
        Storage::delete($teamMember->photo);
        // Hapus data dari database
        $teamMember->delete();

        return redirect()->route('admin.team.index')->with('success', 'Anggota tim berhasil dihapus!');
    }
}