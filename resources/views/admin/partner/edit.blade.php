@extends('admin.layout')

@section('title', 'Editar Aliado')

@section('content')
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}" class="brand">CANTÚ<span>88</span></a>
    
    <div class="user-menu">
        <a href="{{ route('admin.partners.index') }}" style="color: var(--color-white); text-decoration: none; margin-right: 15px;">&larr; Volver a Aliados</a>
    </div>
</header>

<div class="container">
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Editar Aliado: {{ $partner->name }}</h1>
    </div>

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="glass-panel" style="padding: 2rem; max-width: 800px;">
        <form method="POST" action="{{ route('admin.partners.update', $partner) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label>Nombre de la Empresa</label>
                <input type="text" name="name" value="{{ old('name', $partner->name) }}" required>
            </div>

            <div class="form-group">
                <label>Logo Actual</label>
                @if($partner->logo_path)
                    <div style="margin-bottom: 1rem; padding: 1rem; background: rgba(0,0,0,0.3); border-radius: 8px; display: inline-block;">
                        <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" style="max-height: 80px; object-fit: contain;">
                    </div>
                @endif
                <label>Subir Nuevo Logo (opcional)</label>
                <input type="file" name="logo" accept="image/*" style="padding: 0.5rem; background: rgba(0,0,0,0.3);">
            </div>

            <div class="form-group">
                <label>Enlace del Sitio Web (Opcional)</label>
                <input type="url" name="url" value="{{ old('url', $partner->url) }}" placeholder="https://ejemplo.com">
            </div>

            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <div class="form-group" style="flex: 1; min-width: 200px;">
                    <label>Orden de visualización</label>
                    <input type="number" name="sort_order" value="{{ old('sort_order', $partner->sort_order) }}">
                </div>
                
                <div class="form-group" style="flex: 1; min-width: 200px; display: flex; align-items: center; margin-top: 1.5rem;">
                    <label style="margin-bottom: 0; display: flex; align-items: center; gap: 10px; cursor: pointer;">
                        <input type="checkbox" name="is_active" value="1" {{ $partner->is_active ? 'checked' : '' }} style="width: auto;">
                        Mostrar públicamente
                    </label>
                </div>

                <div class="form-group" style="flex: 1; min-width: 200px; display: flex; align-items: center; margin-top: 1.5rem;">
                    <label style="margin-bottom: 0; display: flex; align-items: center; gap: 10px; cursor: pointer; color: var(--color-red);">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $partner->is_featured) ? 'checked' : '' }} style="width: auto;">
                        Colaborador Destacado (Máx 3)
                    </label>
                </div>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn">Actualizar Aliado</button>
            </div>
        </form>
    </div>
</div>
@endsection
