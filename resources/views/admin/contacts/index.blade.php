@extends('admin.layout')

@section('title', 'Bandeja de Mensajes')

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
    <div style="margin-bottom: 2rem; display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Bandeja de Mensajes</h1>
            <p style="color: var(--color-gray);">Revisa los correos que te han enviado desde el formulario de contacto.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert" style="background: rgba(46, 204, 113, 0.1); border: 1px solid rgba(46, 204, 113, 0.3); color: #2ecc71;">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-panel" style="overflow-x: auto;">
        <table style="width: 100%; border-collapse: collapse; text-align: left;">
            <thead>
                <tr style="border-bottom: 1px solid var(--glass-border);">
                    <th style="padding: 1rem; color: var(--color-gray); font-weight: normal;">Estado</th>
                    <th style="padding: 1rem; color: var(--color-gray); font-weight: normal;">Nombre</th>
                    <th style="padding: 1rem; color: var(--color-gray); font-weight: normal;">Email</th>
                    <th style="padding: 1rem; color: var(--color-gray); font-weight: normal;">Fecha</th>
                    <th style="padding: 1rem; color: var(--color-gray); font-weight: normal; text-align: right;">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($messages as $msg)
                <tr style="border-bottom: 1px solid var(--glass-border); transition: background 0.3s; background: {{ $msg->is_read ? 'transparent' : 'rgba(230, 32, 32, 0.05)' }};">
                    <td style="padding: 1rem;">
                        @if(!$msg->is_read)
                            <span style="display: inline-block; width: 10px; height: 10px; border-radius: 50%; background: var(--color-red);"></span>
                        @else
                            <span style="color: var(--color-gray);">Leído</span>
                        @endif
                    </td>
                    <td style="padding: 1rem; font-weight: {{ $msg->is_read ? 'normal' : 'bold' }};">{{ $msg->name }}</td>
                    <td style="padding: 1rem; color: var(--color-gray);">{{ $msg->email }}</td>
                    <td style="padding: 1rem; color: var(--color-gray);">{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                    <td style="padding: 1rem; text-align: right;">
                        <a href="{{ route('admin.contacts.show', $msg) }}" class="btn" style="padding: 0.4rem 1rem; font-size: 0.9rem; margin-right: 0.5rem; text-decoration: none;">Ver</a>
                        <form action="{{ route('admin.contacts.destroy', $msg) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este mensaje?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="padding: 0.4rem 1rem; font-size: 0.9rem; background: transparent; border: 1px solid var(--color-red); color: var(--color-red);">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="padding: 2rem; text-align: center; color: var(--color-gray);">No hay mensajes en tu bandeja.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 2rem;">
        {{ $messages->links() }}
    </div>
</div>
@endsection
