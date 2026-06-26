<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Throwable;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::orderBy('sort_order', 'asc')->get();
        return view('admin.content.index', compact('contents'));
    }

    public function create()
    {
        return view('admin.content.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
            'sort_order' => 'required|integer',
            'image_alignment' => 'required|in:left,right,top',
        ]);

        $content = new Content();
        $content->title = $request->title;
        $content->body = $request->body;
        $content->is_premium = $request->has('is_premium');
        $content->sort_order = $request->sort_order;
        $content->image_alignment = $request->image_alignment;

        $this->handleImageUpload($request, $content);

        $content->save();

        return redirect()->route('admin.content.index')->with('success', 'Sección creada exitosamente.');
    }

    public function edit(Content $content)
    {
        return view('admin.content.edit', compact('content'));
    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480',
            'sort_order' => 'required|integer',
            'image_alignment' => 'required|in:left,right,top',
        ]);

        $content->title = $request->title;
        $content->body = $request->body;
        $content->is_premium = $request->has('is_premium');
        $content->sort_order = $request->sort_order;
        $content->image_alignment = $request->image_alignment;

        $this->handleImageUpload($request, $content);

        $content->save();

        return redirect()->route('admin.content.index')->with('success', 'Sección actualizada exitosamente.');
    }

    public function destroy(Content $content)
    {
        if ($content->image_path && Storage::disk('public')->exists($content->image_path)) {
            Storage::disk('public')->delete($content->image_path);
        }
        $content->delete();

        return redirect()->route('admin.content.index')->with('success', 'Sección eliminada.');
    }

    private function handleImageUpload(Request $request, Content $content)
    {
        if ($request->hasFile('image')) {
            if ($content->image_path && Storage::disk('public')->exists($content->image_path)) {
                Storage::disk('public')->delete($content->image_path);
            }

            $file = $request->file('image');
            
            try {
                $filename = 'content/' . uniqid() . '.webp';
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->scaleDown(width: 1200);
                $encoded = $image->toWebp(80);

                Storage::disk('public')->put($filename, (string) $encoded);
                $content->image_path = $filename;
            } catch (Throwable $e) {
                Log::warning("No se pudo comprimir la imagen: " . $e->getMessage());
                $path = $file->store('content', 'public');
                $content->image_path = $path;
            }
        }
    }
}
