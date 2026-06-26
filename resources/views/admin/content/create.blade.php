@extends('admin.layout')

@section('title', 'Crear Sección')

@section('content')
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}" class="brand">CANTÚ<span>88</span></a>
    
    <div class="user-menu">
        <a href="{{ route('admin.content.index') }}" style="color: var(--color-white); text-decoration: none; margin-right: 15px;">&larr; Volver a Secciones</a>
    </div>
</header>

<div class="container">
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Nueva Sección</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="glass-panel" style="padding: 2rem; max-width: 800px;">
        <form method="POST" action="{{ route('admin.content.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title">Título de la Sección</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label for="sort_order">Orden de aparición (número menor aparece primero)</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" required>
            </div>

            <div class="form-group">
                <label for="image_alignment">Alineación de la Imagen</label>
                <select id="image_alignment" name="image_alignment" style="width: 100%; padding: 0.8rem 1rem; background: rgba(0, 0, 0, 0.5); border: 1px solid var(--glass-border); border-radius: 8px; color: var(--color-white); font-size: 1rem; transition: all 0.3s ease;" required>
                    <option value="left" {{ old('image_alignment') == 'left' ? 'selected' : '' }} style="color: black;">Foto a la Izquierda</option>
                    <option value="right" {{ old('image_alignment') == 'right' ? 'selected' : '' }} style="color: black;">Foto a la Derecha</option>
                    <option value="top" {{ old('image_alignment') == 'top' ? 'selected' : '' }} style="color: black;">Foto Arriba (Centro)</option>
                </select>
            </div>

            <div class="form-group">
                <label for="body">Contenido</label>
                <textarea id="body" name="body" rows="8" style="width: 100%; padding: 0.8rem 1rem; background: rgba(0, 0, 0, 0.5); border: 1px solid var(--glass-border); border-radius: 8px; color: var(--color-white); font-size: 1rem; transition: all 0.3s ease; resize: vertical;" required>{{ old('body') }}</textarea>
            </div>

            <div class="form-group" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
                <label for="image">Imagen Adjunta (Opcional)</label>
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp" style="background: transparent; border: none; padding: 0;">
                <p style="color: var(--color-gray); font-size: 0.8rem; margin-top: 0.5rem;">Se comprimirá automáticamente (Max 20MB).</p>
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px; margin-top: 2rem; padding: 1rem; background: rgba(230, 32, 32, 0.05); border: 1px solid rgba(230, 32, 32, 0.2); border-radius: 8px;">
                <input type="checkbox" id="is_premium" name="is_premium" value="1" {{ old('is_premium') ? 'checked' : '' }} style="width: auto;">
                <label for="is_premium" style="margin: 0; cursor: pointer; color: var(--color-red); font-weight: bold;">Contenido Premium ★ (Solo Suscriptores)</label>
            </div>

            <div style="margin-top: 2rem; text-align: right;">
                <button type="submit" class="btn">Crear Sección</button>
            </div>
        </form>
    </div>
</div>
@endsection
