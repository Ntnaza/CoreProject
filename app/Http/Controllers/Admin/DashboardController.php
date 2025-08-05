<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage; // Model untuk pesan
use App\Models\Testimonial;    // Model untuk testimoni
use App\Models\TeamMember;      // Model untuk anggota tim
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah data dari setiap model
        $messageCount = ContactMessage::count();
        $testimonialCount = Testimonial::count();
        $teamMemberCount = TeamMember::count();

        // Kirim data ke view
        return view('admin.dashboard', compact(
            'messageCount',
            'testimonialCount',
            'teamMemberCount'
        ));
    }
}