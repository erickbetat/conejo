@extends('admin.layout')

@section('title', 'Editar Producto')

@section('content')
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}" class="brand">CANTÚ<span>88</span></a>
    
    <div class="user-menu">
        <a href="{{ route('admin.merch.index') }}" style="color: var(--color-white); text-decoration: none; margin-right: 15px;">&larr; Volver a Merch</a>
        <span style="color: var(--color-gray); margin: 0 10px;">|</span>
        <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>
</header>

<div class="container">
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Editar Producto</h1>
        <p style="color: var(--color-gray);">Actualiza la información del artículo.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="glass-panel" style="padding: 2rem; max-width: 800px;">
        <form method="POST" action="{{ route('admin.merch.update', $merch) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Nombre del Producto</label>
                <input type="text" id="title" name="title" value="{{ old('title', $merch->title) }}" required>
            </div>

            <div class="form-group">
                <label for="price">Precio (MXN)</label>
                <input type="number" id="price" name="price" value="{{ old('price', $merch->price) }}" step="0.01" min="0" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción (Opcional)</label>
                <textarea id="description" name="description" rows="4" style="width: 100%; padding: 0.8rem 1rem; background: rgba(0, 0, 0, 0.5); border: 1px solid var(--glass-border); border-radius: 8px; color: var(--color-white); font-size: 1rem; transition: all 0.3s ease; resize: vertical;">{{ old('description', $merch->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="sort_order">Orden de aparición</label>
                <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $merch->sort_order) }}" min="0">
            </div>

            <div class="form-group" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
                <label for="image">Foto del Producto</label>
                @if($merch->image_path)
                    <div style="margin-bottom: 1rem;">
                        <img src="{{ asset('storage/' . $merch->image_path) }}" alt="Foto actual" style="max-width: 150px; border-radius: 8px; border: 2px solid var(--color-red);">
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp" style="background: transparent; border: none; padding: 0;">
                <p style="color: var(--color-gray); font-size: 0.8rem; margin-top: 0.5rem;">Deja vacío si no deseas cambiar la foto actual.</p>
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px; margin-top: 2rem;">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $merch->is_active) ? 'checked' : '' }} style="width: auto;">
                <label for="is_active" style="margin: 0; cursor: pointer;">Producto activo (visible en la tienda)</label>
            </div>

            <div style="margin-top: 2rem; text-align: right;">
                <button type="submit" class="btn">Actualizar Producto</button>
            </div>
        </form>
    </div>
</div>
@endsection
