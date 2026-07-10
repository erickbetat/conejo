<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MerchController extends Controller
{
    public function index()
    {
        $merches = Merch::orderBy('sort_order')->get();
        return view('admin.merch.index', compact('merches'));
    }

    public function create()
    {
        return view('admin.merch.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'sort_order' => 'integer|min:0'
        ]);

        $merch = new Merch();
        $merch->title = $request->title;
        $merch->description = $request->description;
        $merch->price = $request->price;
        $merch->is_active = $request->has('is_active');
        $merch->sort_order = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('merch', 'public');
            $merch->image_path = $path;
        }

        $merch->save();

        return redirect()->route('admin.merch.index')->with('success', 'Producto de Merch creado exitosamente.');
    }

    public function edit(Merch $merch)
    {
        return view('admin.merch.edit', compact('merch'));
    }

    public function update(Request $request, Merch $merch)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'sort_order' => 'integer|min:0'
        ]);

        $merch->title = $request->title;
        $merch->description = $request->description;
        $merch->price = $request->price;
        $merch->is_active = $request->has('is_active');
        $merch->sort_order = $request->sort_order ?? 0;

        if ($request->hasFile('image')) {
            if ($merch->image_path && Storage::disk('public')->exists($merch->image_path)) {
                Storage::disk('public')->delete($merch->image_path);
            }
            $path = $request->file('image')->store('merch', 'public');
            $merch->image_path = $path;
        }

        $merch->save();

        return redirect()->route('admin.merch.index')->with('success', 'Producto de Merch actualizado exitosamente.');
    }

    public function destroy(Merch $merch)
    {
        if ($merch->image_path && Storage::disk('public')->exists($merch->image_path)) {
            Storage::disk('public')->delete($merch->image_path);
        }
        
        $merch->delete();
        
        return redirect()->route('admin.merch.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
