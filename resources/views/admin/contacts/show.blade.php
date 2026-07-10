@extends('admin.layout')

@section('title', 'Ver Mensaje')

@section('content')
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}" class="brand">CANTÚ<span>88</span></a>
    
    <div class="user-menu">
        <a href="{{ route('admin.contacts.index') }}" style="color: var(--color-white); text-decoration: none; margin-right: 15px;">&larr; Volver a la Bandeja</a>
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
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Detalle del Mensaje</h1>
        </div>
        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar este mensaje?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn" style="background: transparent; border: 1px solid var(--color-red); color: var(--color-red);">Eliminar Mensaje</button>
        </form>
    </div>

    <div class="glass-panel" style="padding: 2.5rem; max-width: 800px; margin: 0 auto;">
        <div style="border-bottom: 1px solid var(--glass-border); padding-bottom: 1.5rem; margin-bottom: 1.5rem;">
            <p style="color: var(--color-gray); font-size: 0.9rem; margin-bottom: 0.5rem;">De: <strong style="color: var(--color-white); font-size: 1.1rem;">{{ $contact->name }}</strong></p>
            <p style="color: var(--color-gray); font-size: 0.9rem; margin-bottom: 0.5rem;">Email: <a href="mailto:{{ $contact->email }}" style="color: var(--color-red); text-decoration: none;">{{ $contact->email }}</a></p>
            @if($contact->phone)
                <p style="color: var(--color-gray); font-size: 0.9rem; margin-bottom: 0.5rem;">Teléfono: <strong style="color: var(--color-white);">{{ $contact->phone }}</strong></p>
            @endif
            <p style="color: var(--color-gray); font-size: 0.8rem; margin-top: 1rem;">Recibido el {{ $contact->created_at->format('d \d\e F \d\e Y \a \l\a\s H:i') }}</p>
        </div>

        <div style="background: rgba(0, 0, 0, 0.3); padding: 2rem; border-radius: 12px; border: 1px solid var(--glass-border);">
            <p style="color: var(--color-white); line-height: 1.8; white-space: pre-wrap;">{{ $contact->message }}</p>
        </div>
    </div>
</div>
@endsection
