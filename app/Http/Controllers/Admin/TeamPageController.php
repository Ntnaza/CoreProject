<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\TeamSection;
use Illuminate\Http\Request;

class TeamPageController extends Controller
{
    public function index()
    {
        $teamSection = TeamSection::firstOrFail();
        $teamMembers = TeamMember::all();
        return view('admin.team.index', compact('teamSection', 'teamMembers'));
    }

    public function updateSection(Request $request)
    {
        $teamSection = TeamSection::firstOrFail();
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
        ]);
        $teamSection->update($validated);
        return redirect()->route('team.index')->with('success', 'Judul section tim berhasil diperbarui!');
    }
}
