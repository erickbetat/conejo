@extends('admin.layout')

@section('title', 'Editar Biografía')

@section('content')
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}" class="brand">CANTÚ<span>88</span></a>
    
    <div class="user-menu">
        <a href="{{ route('admin.dashboard') }}" style="color: var(--color-white); text-decoration: none; margin-right: 15px;">&larr; Volver al Panel</a>
        <span style="color: var(--color-gray); margin: 0 10px;">|</span>
        <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
            @csrf
            <button type="submit">Cerrar Sesión</button>
        </form>
    </div>
</header>

<div class="container">
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Editar Biografía</h1>
        <p style="color: var(--color-gray);">Actualiza tu historia personal y la foto principal de tu perfil.</p>
    </div>

    @if(session('success'))
        <div class="alert" style="background: rgba(46, 204, 113, 0.1); border: 1px solid rgba(46, 204, 113, 0.3); color: #2ecc71;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="glass-panel" style="padding: 2rem; max-width: 800px;">
        <form method="POST" action="{{ route('admin.biography.update') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="title">Título de la Biografía</label>
                <input type="text" id="title" name="title" value="{{ old('title', $biography->title) }}" required>
            </div>

            <div class="form-group">
                <label for="content">Contenido (Tu Historia)</label>
                <textarea id="content" name="content" rows="10" style="width: 100%; padding: 0.8rem 1rem; background: rgba(0, 0, 0, 0.5); border: 1px solid var(--glass-border); border-radius: 8px; color: var(--color-white); font-size: 1rem; transition: all 0.3s ease; resize: vertical;" required>{{ old('content', $biography->content) }}</textarea>
            </div>

            <div class="form-group" style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
                <label for="image">Foto Principal</label>
                @if($biography->image_path)
                    <div style="margin-bottom: 1rem;">
                        <img src="{{ asset('storage/' . $biography->image_path) }}" alt="Foto actual" style="max-width: 200px; border-radius: 8px; border: 2px solid var(--color-red);">
                        <p style="color: var(--color-gray); font-size: 0.8rem; margin-top: 0.5rem;">Foto actual</p>
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp" style="background: transparent; border: none; padding: 0;">
                <p style="color: var(--color-gray); font-size: 0.8rem; margin-top: 0.5rem;">Sube una nueva foto para reemplazar la actual (Max 5MB. Recomendado: Vertical u horizontal de alta calidad).</p>
            </div>

            <!-- TIMELINE SECTION -->
            <div style="margin-top: 3rem; padding-top: 2rem; border-top: 1px solid var(--glass-border);">
                <h2 style="font-size: 1.5rem; margin-bottom: 1.5rem; color: var(--color-white);">Línea de Tiempo (Momentos Clave)</h2>
                <p style="color: var(--color-gray); margin-bottom: 2rem;">Añade hasta 3 fotos con descripciones cortas para mostrar en el recorrido vertical.</p>

                @for($i = 1; $i <= 3; $i++)
                <div style="background: rgba(255,255,255,0.02); border: 1px solid var(--glass-border); padding: 1.5rem; border-radius: 12px; margin-bottom: 1.5rem;">
                    <h3 style="color: var(--color-red); margin-bottom: 1rem;">Momento {{ $i }}</h3>
                    
                    <div class="form-group">
                        <label for="desc_{{ $i }}">Descripción Corta</label>
                        <input type="text" id="desc_{{ $i }}" name="desc_{{ $i }}" value="{{ old('desc_'.$i, $biography->{'desc_'.$i}) }}" placeholder="Ej: Debut en Karting Nacional">
                    </div>

                    <div class="form-group" style="margin-top: 1rem;">
                        <label for="photo_{{ $i }}">Foto del Momento</label>
                        @if($biography->{'photo_'.$i})
                            <div style="margin-bottom: 1rem;">
                                <img src="{{ asset('storage/' . $biography->{'photo_'.$i}) }}" alt="Foto {{ $i }}" style="max-width: 150px; border-radius: 8px; border: 1px solid var(--glass-border);">
                            </div>
                        @endif
                        <input type="file" id="photo_{{ $i }}" name="photo_{{ $i }}" accept="image/jpeg,image/png,image/webp" style="background: transparent; border: none; padding: 0;">
                    </div>
                </div>
                @endfor
            </div>

            <div class="form-group" style="display: flex; align-items: center; gap: 10px; margin-top: 2rem;">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $biography->is_active) ? 'checked' : '' }} style="width: auto;">
                <label for="is_active" style="margin: 0; cursor: pointer;">Mostrar biografía en la página principal</label>
            </div>

            <div style="margin-top: 2rem; text-align: right;">
                <button type="submit" class="btn">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection
