<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedRace;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class FeaturedRaceController extends Controller
{
    public function edit()
    {
        $featuredRace = FeaturedRace::first() ?? new FeaturedRace();
        return view('admin.featured_race.edit', compact('featuredRace'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'badge' => 'nullable|string|max:50',
            'category' => 'nullable|string|max:100',
            'title' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'description' => 'required|string',
            'stat1_label' => 'nullable|string|max:50',
            'stat1_value' => 'nullable|string|max:50',
            'stat2_label' => 'nullable|string|max:50',
            'stat2_value' => 'nullable|string|max:50',
            'video_url' => 'nullable|url|max:255',
            'video_file' => 'nullable|mimes:mp4,webm,ogg|max:51200', // max 50MB
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $featuredRace = FeaturedRace::first() ?? new FeaturedRace();
        
        $featuredRace->fill($request->only([
            'badge', 'category', 'title', 'location', 'description',
            'stat1_label', 'stat1_value', 'stat2_label', 'stat2_value', 'video_url'
        ]));

        // Handle image upload
        if ($request->hasFile('image')) {
            if ($featuredRace->image_path && Storage::disk('public')->exists($featuredRace->image_path)) {
                Storage::disk('public')->delete($featuredRace->image_path);
            }

            try {
                $file = $request->file('image');
                $filename = 'featured_race/' . uniqid() . '.webp';
                
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                
                $image->scaleDown(width: 800);
                
                Storage::disk('public')->put($filename, (string) $image->toWebp(80));
                
                $featuredRace->image_path = $filename;
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Error uploading featured race image: ' . $e->getMessage());
            }
        }

        // Handle video upload
        if ($request->hasFile('video_file')) {
            if ($featuredRace->video_path && Storage::disk('public')->exists($featuredRace->video_path)) {
                Storage::disk('public')->delete($featuredRace->video_path);
            }
            
            $videoFile = $request->file('video_file');
            $videoFilename = 'featured_race/' . uniqid() . '.' . $videoFile->getClientOriginalExtension();
            Storage::disk('public')->put($videoFilename, file_get_contents($videoFile));
            $featuredRace->video_path = $videoFilename;
        }

        $featuredRace->save();

        return redirect()->route('admin.featured-race.edit')->with('success', 'Carrera destacada actualizada exitosamente.');
    }
}
