@extends('admin.layout')

@section('title', 'Gestionar Merch')

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
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Merchandising</h1>
            <p style="color: var(--color-gray);">Administra los productos de tu tienda.</p>
        </div>
        <a href="{{ route('admin.merch.create') }}" class="btn">Añadir Producto</a>
    </div>

    @if(session('success'))
        <div class="alert" style="background: rgba(46, 204, 113, 0.1); border: 1px solid rgba(46, 204, 113, 0.3); color: #2ecc71;">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-panel" style="padding: 0;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 1px solid var(--glass-border);">
                    <th style="padding: 1.5rem 1rem; text-align: left; color: var(--color-gray); font-weight: 500;">Imagen</th>
                    <th style="padding: 1.5rem 1rem; text-align: left; color: var(--color-gray); font-weight: 500;">Producto</th>
                    <th style="padding: 1.5rem 1rem; text-align: left; color: var(--color-gray); font-weight: 500;">Precio</th>
                    <th style="padding: 1.5rem 1rem; text-align: center; color: var(--color-gray); font-weight: 500;">Estado</th>
                    <th style="padding: 1.5rem 1rem; text-align: center; color: var(--color-gray); font-weight: 500;">Orden</th>
                    <th style="padding: 1.5rem 1rem; text-align: right; color: var(--color-gray); font-weight: 500;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($merches as $merch)
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <td style="padding: 1rem;">
                        @if($merch->image_path)
                            <img src="{{ asset('storage/' . $merch->image_path) }}" alt="{{ $merch->title }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        @else
                            <div style="width: 60px; height: 60px; background: rgba(0,0,0,0.5); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--color-gray); font-size: 0.8rem;">Sin img</div>
                        @endif
                    </td>
                    <td style="padding: 1rem;">
                        <strong>{{ $merch->title }}</strong>
                    </td>
                    <td style="padding: 1rem;">
                        $ {{ number_format($merch->price, 2) }}
                    </td>
                    <td style="padding: 1rem; text-align: center;">
                        @if($merch->is_active)
                            <span style="background: rgba(46, 204, 113, 0.2); color: #2ecc71; padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; border: 1px solid rgba(46, 204, 113, 0.3);">Activo</span>
                        @else
                            <span style="background: rgba(255, 255, 255, 0.1); color: var(--color-gray); padding: 0.3rem 0.8rem; border-radius: 20px; font-size: 0.8rem; border: 1px solid rgba(255, 255, 255, 0.2);">Inactivo</span>
                        @endif
                    </td>
                    <td style="padding: 1rem; text-align: center;">
                        {{ $merch->sort_order }}
                    </td>
                    <td style="padding: 1rem; text-align: right;">
                        <a href="{{ route('admin.merch.edit', $merch) }}" style="display: inline-block; padding: 0.5rem 1rem; background: rgba(255,255,255,0.1); color: white; text-decoration: none; border-radius: 6px; font-size: 0.9rem; margin-right: 0.5rem; transition: background 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.2)'" onmouseout="this.style.background='rgba(255,255,255,0.1)'">Editar</a>
                        
                        <form action="{{ route('admin.merch.destroy', $merch) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de querer eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="padding: 0.5rem 1rem; background: rgba(230, 32, 32, 0.1); color: #ff6b6b; border: 1px solid rgba(230, 32, 32, 0.3); border-radius: 6px; cursor: pointer; font-size: 0.9rem; transition: all 0.3s;" onmouseover="this.style.background='rgba(230, 32, 32, 0.2)'" onmouseout="this.style.background='rgba(230, 32, 32, 0.1)'">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="padding: 3rem; text-align: center; color: var(--color-gray);">
                        No hay productos registrados aún.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
