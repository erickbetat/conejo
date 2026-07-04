@extends('admin.layout')

@section('title', 'Aliados')

@section('content')
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}" class="brand">CANTÚ<span>88</span></a>
    
    <div class="user-menu">
        <a href="{{ route('admin.dashboard') }}" style="color: var(--color-white); text-decoration: none; margin-right: 15px;">&larr; Volver al Panel</a>
    </div>
</header>

<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Aliados Estratégicos</h1>
            <p style="color: var(--color-gray);">Administra los logos de las empresas que te apoyan.</p>
        </div>
        <a href="{{ route('admin.partners.create') }}" class="btn" style="text-decoration: none;">+ Nuevo Aliado</a>
    </div>

    @if(session('success'))
        <div class="alert" style="background: rgba(46, 204, 113, 0.1); border: 1px solid rgba(46, 204, 113, 0.3); color: #2ecc71;">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-panel" style="overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="border-bottom: 1px solid var(--glass-border); background: rgba(0,0,0,0.2);">
                    <th style="padding: 1rem; color: var(--color-gray);">Orden</th>
                    <th style="padding: 1rem; color: var(--color-gray);">Logo</th>
                    <th style="padding: 1rem; color: var(--color-gray);">Nombre</th>
                    <th style="padding: 1rem; color: var(--color-gray);">Enlace</th>
                    <th style="padding: 1rem; color: var(--color-gray);">Estado</th>
                    <th style="padding: 1rem; color: var(--color-gray); text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                <tr style="border-bottom: 1px solid var(--glass-border);">
                    <td style="padding: 1rem;">{{ $partner->sort_order }}</td>
                    <td style="padding: 1rem;">
                        <img src="{{ asset('storage/' . $partner->logo_path) }}" alt="{{ $partner->name }}" style="max-height: 40px; border-radius: 4px; object-fit: contain;">
                    </td>
                    <td style="padding: 1rem; font-weight: bold;">{{ $partner->name }}</td>
                    <td style="padding: 1rem;">
                        @if($partner->url)
                            <a href="{{ $partner->url }}" target="_blank" style="color: var(--color-red); text-decoration: none;">Ver enlace &nearr;</a>
                        @else
                            <span style="color: var(--color-gray);">N/A</span>
                        @endif
                    </td>
                    <td style="padding: 1rem;">
                        @if($partner->is_active)
                            <span style="background: rgba(46, 204, 113, 0.1); color: #2ecc71; padding: 4px 8px; border-radius: 4px; font-size: 0.8rem;">Activo</span>
                        @else
                            <span style="background: rgba(230, 32, 32, 0.1); color: #ff6b6b; padding: 4px 8px; border-radius: 4px; font-size: 0.8rem;">Inactivo</span>
                        @endif
                    </td>
                    <td style="padding: 1rem; text-align: right;">
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="btn" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; text-decoration: none; margin-right: 0.5rem; background: transparent; border: 1px solid var(--color-gray); color: var(--color-white);">Editar</a>
                        <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este aliado?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; background: var(--color-red);">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="padding: 2rem; text-align: center; color: var(--color-gray);">No hay aliados registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
