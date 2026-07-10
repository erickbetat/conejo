@extends('admin.layout')

@section('title', 'Gestionar Contenido')

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
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Secciones de la Página</h1>
            <p style="color: var(--color-gray);">Administra los bloques de contenido (ej. Mis Karts, Colaboradores, etc).</p>
        </div>
        <a href="{{ route('admin.content.create') }}" class="btn" style="text-decoration: none;">+ Nueva Sección</a>
    </div>

    @if(session('success'))
        <div class="alert" style="background: rgba(46, 204, 113, 0.1); border: 1px solid rgba(46, 204, 113, 0.3); color: #2ecc71;">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-panel" style="padding: 1rem; overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="border-bottom: 1px solid var(--glass-border); color: var(--color-gray);">
                    <th style="padding: 1rem;">Orden</th>
                    <th style="padding: 1rem;">Imagen</th>
                    <th style="padding: 1rem;">Título</th>
                    <th style="padding: 1rem;">Tipo</th>
                    <th style="padding: 1rem; text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contents as $content)
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.02);">
                        <td style="padding: 1rem; font-weight: bold; color: var(--color-gray);">{{ $content->sort_order }}</td>
                        <td style="padding: 1rem;">
                            @if($content->image_path)
                                <img src="{{ asset('storage/' . $content->image_path) }}" alt="" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                            @else
                                <div style="width: 60px; height: 60px; background: rgba(0,0,0,0.3); border-radius: 8px; display: flex; align-items: center; justify-content: center; font-size: 0.8rem; color: var(--color-gray);">No img</div>
                            @endif
                        </td>
                        <td style="padding: 1rem; font-weight: bold;">{{ $content->title }}</td>
                        <td style="padding: 1rem;">
                            @if($content->is_premium)
                                <span style="background: rgba(230, 32, 32, 0.2); color: var(--color-red); padding: 4px 8px; border-radius: 4px; font-size: 0.8rem; font-weight: bold;">★ Premium</span>
                            @else
                                <span style="background: rgba(255, 255, 255, 0.1); color: var(--color-gray); padding: 4px 8px; border-radius: 4px; font-size: 0.8rem;">Gratis</span>
                            @endif
                        </td>
                        <td style="padding: 1rem; text-align: right;">
                            <a href="{{ route('admin.content.edit', $content) }}" style="color: var(--color-white); margin-right: 15px; text-decoration: none;">Editar</a>
                            <form action="{{ route('admin.content.destroy', $content) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar esta sección?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: transparent; border: none; color: var(--color-red); cursor: pointer;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding: 2rem; text-align: center; color: var(--color-gray);">No hay secciones creadas todavía.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
