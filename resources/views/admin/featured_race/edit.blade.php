@extends('admin.layout')

@section('title', 'Editar Carrera Destacada')

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
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Editar Carrera Destacada</h1>
        <p style="color: var(--color-gray);">Actualiza los datos de la carrera principal que se muestra en tu página de inicio.</p>
    </div>

    @if(session('success'))
        <div class="alert" style="background: rgba(46, 204, 113, 0.1); border: 1px solid rgba(46, 204, 113, 0.3); color: #2ecc71;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-error" style="background: rgba(231, 76, 60, 0.1); border: 1px solid rgba(231, 76, 60, 0.3); color: #e74c3c; padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem;">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="glass-panel" style="padding: 2rem; max-width: 800px;">
        <form method="POST" action="{{ route('admin.featured-race.update') }}" enctype="multipart/form-data">
            @csrf
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div class="form-group">
                    <label for="badge">Insignia / Etiqueta (Ej. 1er Lugar)</label>
                    <input type="text" id="badge" name="badge" value="{{ old('badge', $featuredRace->badge) }}">
                </div>
                
                <div class="form-group">
                    <label for="category">Categoría (Ej. Fórmula 4 México)</label>
                    <input type="text" id="category" name="category" value="{{ old('category', $featuredRace->category) }}">
                </div>
            </div>

            <div class="form-group">
                <label for="title">Título de la Carrera (Ej. Gran Premio Fórmula 1...)</label>
                <input type="text" id="title" name="title" value="{{ old('title', $featuredRace->title) }}" required>
            </div>

            <div class="form-group">
                <label for="location">Ubicación / Autódromo (Ej. Autódromo Hermanos Rodríguez)</label>
                <input type="text" id="location" name="location" value="{{ old('location', $featuredRace->location) }}">
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" rows="5" style="width: 100%; padding: 0.8rem 1rem; background: rgba(0, 0, 0, 0.5); border: 1px solid var(--glass-border); border-radius: 8px; color: var(--color-white); font-size: 1rem; transition: all 0.3s ease; resize: vertical;" required>{{ old('description', $featuredRace->description) }}</textarea>
            </div>

            <h3 style="margin-top: 2rem; color: var(--color-red); margin-bottom: 1rem;">Estadísticas (Las dos cajas debajo de la descripción)</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; background: rgba(255,255,255,0.02); padding: 1rem; border-radius: 8px; border: 1px solid var(--glass-border);">
                <div>
                    <div class="form-group">
                        <label for="stat1_label">Dato 1 - Etiqueta (Ej. Pos:)</label>
                        <input type="text" id="stat1_label" name="stat1_label" value="{{ old('stat1_label', $featuredRace->stat1_label) }}">
                    </div>
                    <div class="form-group">
                        <label for="stat1_value">Dato 1 - Valor (Ej. P1)</label>
                        <input type="text" id="stat1_value" name="stat1_value" value="{{ old('stat1_value', $featuredRace->stat1_value) }}">
                    </div>
                </div>
                <div>
                    <div class="form-group">
                        <label for="stat2_label">Dato 2 - Etiqueta (Ej. V. Rápida:)</label>
                        <input type="text" id="stat2_label" name="stat2_label" value="{{ old('stat2_label', $featuredRace->stat2_label) }}">
                    </div>
                    <div class="form-group">
                        <label for="stat2_value">Dato 2 - Valor (Ej. Récord Pista)</label>
                        <input type="text" id="stat2_value" name="stat2_value" value="{{ old('stat2_value', $featuredRace->stat2_value) }}">
                    </div>
                </div>
            </div>

            <h3 style="margin-top: 2rem; color: var(--color-red); margin-bottom: 1rem;">Multimedia</h3>
            
            <div class="form-group" style="margin-bottom: 2rem;">
                <label for="image">Foto del Podio (o Foto Principal)</label>
                @if($featuredRace->image_path)
                    <div style="margin-bottom: 1rem;">
                        <img src="{{ asset('storage/' . $featuredRace->image_path) }}" alt="Foto actual" style="max-width: 200px; border-radius: 8px; border: 2px solid var(--color-red);">
                        <p style="color: var(--color-gray); font-size: 0.8rem; margin-top: 0.5rem;">Foto actual</p>
                    </div>
                @endif
                <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp" style="background: transparent; border: none; padding: 0;">
                <p style="color: var(--color-gray); font-size: 0.8rem; margin-top: 0.5rem;">Sube una nueva foto para reemplazar la actual.</p>
            </div>

            <div style="background: rgba(255,255,255,0.02); padding: 1.5rem; border-radius: 8px; border: 1px solid var(--glass-border);">
                <h4 style="color: white; margin-bottom: 1rem;">Video de la Carrera</h4>
                <p style="color: var(--color-gray); font-size: 0.9rem; margin-bottom: 1rem;">Puedes subir un archivo de video MP4 directamente, o pegar un enlace de YouTube/Vimeo. Si ambos están llenos, se le dará prioridad al video subido.</p>
                
                <div class="form-group">
                    <label for="video_file">Subir Archivo de Video (MP4)</label>
                    @if($featuredRace->video_path)
                        <p style="color: #2ecc71; font-size: 0.9rem; margin-bottom: 0.5rem;">✓ Ya hay un video subido actualmente.</p>
                    @endif
                    <input type="file" id="video_file" name="video_file" accept="video/mp4,video/webm,video/ogg" style="background: transparent; border: none; padding: 0;">
                </div>

                <div style="text-align: center; margin: 1rem 0; color: var(--color-gray);">Ó</div>

                <div class="form-group" style="margin-bottom: 0;">
                    <label for="video_url">Enlace a YouTube / Vimeo</label>
                    <input type="url" id="video_url" name="video_url" value="{{ old('video_url', $featuredRace->video_url) }}" placeholder="https://www.youtube.com/watch?v=...">
                </div>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endsection
