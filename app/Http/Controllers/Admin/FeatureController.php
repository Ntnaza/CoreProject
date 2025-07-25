<?php
// app/Http/Controllers/Admin/FeatureController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeatureItem;
use App\Models\FeatureSection;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $featureSection = FeatureSection::firstOrFail();
        $featureItems = FeatureItem::all();
        return view('admin.features.index', compact('featureSection', 'featureItems'));
    }

    public function updateSection(Request $request)
    {
        $featureSection = FeatureSection::firstOrFail();
        $validated = $request->validate([
            'headline' => 'required|string|max:255',
            'paragraph' => 'required|string',
            'link_text' => 'required|string|max:50',
            'link_url' => 'required|string',
        ]);

        $featureSection->update($validated);

        return redirect()->route('features.index')->with('success', 'Bagian "Why Box" berhasil diperbarui!');
    }
}