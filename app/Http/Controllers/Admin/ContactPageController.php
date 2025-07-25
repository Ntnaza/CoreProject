<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::firstOrFail();
        $contactMessages = ContactMessage::latest()->get();
        return view('admin.contact.index', compact('contactInfo', 'contactMessages'));
    }

    public function updateInfo(Request $request)
    {
        $contactInfo = ContactInfo::firstOrFail();
        $validated = $request->validate([
            'section_title' => 'required|string|max:255', 'section_subtitle' => 'required|string',
            'address' => 'required|string', 'phone' => 'required|string',
            'email' => 'required|email', 'map_url' => 'required|url',
            'twitter_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'linkedin_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'tiktok_url' => 'nullable|url',
        ]);
        $contactInfo->update($validated);
        return redirect()->route('contact.index')->with('success', 'Info kontak berhasil diperbarui!');
    }

    public function destroyMessage(ContactMessage $contactMessage)
    {
        $contactMessage->delete();
        return redirect()->route('contact.index')->with('success', 'Pesan berhasil dihapus!');
    }
}