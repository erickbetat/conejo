<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Biography;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Throwable;

class BiographyController extends Controller
{
    public function edit()
    {
        // Solo habrá una biografía, así que buscamos la primera o creamos una instancia vacía
        $biography = Biography::first() ?? new Biography();
        return view('admin.biography.edit', compact('biography'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:20480', // Aumentado a 20MB, se comprimirá en el servidor
        ]);

        $biography = Biography::first() ?? new Biography();
        $biography->title = $request->title;
        $biography->content = $request->content;
        $biography->is_active = $request->has('is_active');

        // Manejar la subida de imagen
        if ($request->hasFile('image')) {
            // Eliminar imagen anterior si existe
            if ($biography->image_path && Storage::disk('public')->exists($biography->image_path)) {
                Storage::disk('public')->delete($biography->image_path);
            }

            $file = $request->file('image');
            
            try {
                $filename = 'biography/' . uniqid() . '.webp';
                
                // Comprimir y redimensionar con Intervention Image
                $manager = new ImageManager(new Driver());
                $image = $manager->read($file);
                $image->scaleDown(width: 1200); // Reducir a max 1200px de ancho si es más grande
                $encoded = $image->toWebp(80); // Convertir a webp al 80% de calidad

                // Guardar imagen comprimida
                Storage::disk('public')->put($filename, (string) $encoded);

                $biography->image_path = $filename;
            } catch (Throwable $e) {
                // Fallback: Si la extensión GD no está instalada en local, guardar normal
                Log::warning("No se pudo comprimir la imagen: " . $e->getMessage());
                $path = $file->store('biography', 'public');
                $biography->image_path = $path;
            }
        }

        $biography->save();

        return redirect()->route('admin.biography.edit')->with('success', 'Biografía actualizada correctamente.');
    }
}
