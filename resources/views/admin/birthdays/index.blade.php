@extends('admin.layout')

@section('title', 'Cumpleaños')

@section('content')
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}" class="brand">Volver al Dashboard</a>
    
    <div class="user-menu">
        <span>Hola, {{ auth()->user()->name }}</span>
    </div>
</header>

<div class="container">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <div>
            <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Próximos Cumpleaños</h1>
            <p style="color: var(--color-gray);">Listado de miembros de Conejo Club que han registrado su cumpleaños.</p>
        </div>
    </div>

    <div class="card">
        @if($users->count() > 0)
            <div style="overflow-x: auto;">
                <table style="width: 100%; text-align: left; border-collapse: collapse;">
                    <thead>
                        <tr style="border-bottom: 1px solid var(--glass-border);">
                            <th style="padding: 1rem; color: var(--color-red);">Nombre</th>
                            <th style="padding: 1rem; color: var(--color-red);">Email</th>
                            <th style="padding: 1rem; color: var(--color-red);">Fecha de Nacimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            @php
                                $birthdate = \Carbon\Carbon::parse($user->birthdate);
                                $isToday = $birthdate->isBirthday();
                            @endphp
                            <tr style="border-bottom: 1px solid var(--glass-border); {{ $isToday ? 'background: rgba(230,32,32,0.1);' : '' }}">
                                <td style="padding: 1rem;">
                                    {{ $user->name }}
                                    @if($isToday)
                                        <span style="margin-left: 10px; font-size: 0.8rem; background: var(--color-red); color: white; padding: 2px 6px; border-radius: 4px;">¡Hoy!</span>
                                    @endif
                                </td>
                                <td style="padding: 1rem;"><a href="mailto:{{ $user->email }}" style="color: var(--color-gray);">{{ $user->email }}</a></td>
                                <td style="padding: 1rem;">{{ $birthdate->format('d \d\e F') }} ({{ $birthdate->age }} años)</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p style="color: var(--color-gray); padding: 2rem; text-align: center;">Aún no hay usuarios con fecha de nacimiento registrada.</p>
        @endif
    </div>
</div>
@endsection
