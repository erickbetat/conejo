@extends('admin.layout')

@section('title', 'Configuraciones Generales')

@section('content')
<header class="admin-header">
    <a href="{{ route('admin.dashboard') }}" class="brand">CANTÚ<span>88</span></a>
    
    <div class="user-menu">
        <a href="{{ route('admin.dashboard') }}" style="color: var(--color-white); text-decoration: none; margin-right: 15px;">&larr; Volver al Panel</a>
        <span>Hola, {{ auth()->user()->name }}</span>
    </div>
</header>

<div class="container">
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Configuraciones Generales</h1>
        <p style="color: var(--color-gray);">Modifica los textos, precios y estadísticas principales de la página.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="background: rgba(46, 204, 113, 0.2); border: 1px solid rgba(46, 204, 113, 0.4); color: #2ecc71;">
            {{ session('success') }}
        </div>
    @endif

    <div class="glass-panel" style="padding: 2rem;">
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 3rem;">
                
                <!-- Columna Izquierda -->
                <div>
                    <h2 style="margin-bottom: 1.5rem; color: var(--color-red); font-size: 1.3rem;">Estadísticas (Contadores)</h2>
                    
                    <div class="form-group">
                        <label>{{ $settings['stats_carreras']->description }}</label>
                        <input type="number" name="stats_carreras" value="{{ $settings['stats_carreras']->value }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>{{ $settings['stats_podios']->description }}</label>
                        <input type="number" name="stats_podios" value="{{ $settings['stats_podios']->value }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>{{ $settings['stats_anios']->description }}</label>
                        <input type="number" name="stats_anios" value="{{ $settings['stats_anios']->value }}" required>
                    </div>

                    <h2 style="margin-top: 3rem; margin-bottom: 1.5rem; color: var(--color-red); font-size: 1.3rem;">Textos Principales</h2>
                    
                    <div class="form-group">
                        <label>{{ $settings['hero_typewriter']->description }}</label>
                        <input type="text" name="hero_typewriter" value="{{ $settings['hero_typewriter']->value }}" required>
                    </div>
                </div>

                <!-- Columna Derecha -->
                <div>
                    <h2 style="margin-bottom: 1.5rem; color: var(--color-red); font-size: 1.3rem;">Precios del Conejo Club</h2>
                    
                    <div class="form-group">
                        <label>{{ $settings['club_oro_price']->description }}</label>
                        <input type="number" name="club_oro_price" value="{{ $settings['club_oro_price']->value }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>{{ $settings['club_titanio_price']->description }}</label>
                        <input type="number" name="club_titanio_price" value="{{ $settings['club_titanio_price']->value }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>{{ $settings['club_elite_price']->description }}</label>
                        <input type="number" name="club_elite_price" value="{{ $settings['club_elite_price']->value }}" required>
                    </div>

                    <h2 style="margin-top: 3rem; margin-bottom: 1.5rem; color: var(--color-red); font-size: 1.3rem;">Contacto (WhatsApp)</h2>
                    
                    <div class="form-group">
                        <label>{{ $settings['whatsapp_number']->description }}</label>
                        <input type="text" name="whatsapp_number" value="{{ $settings['whatsapp_number']->value }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>{{ $settings['whatsapp_message']->description }}</label>
                        <input type="text" name="whatsapp_message" value="{{ $settings['whatsapp_message']->value }}" required>
                    </div>
                </div>

            </div>

            <div style="margin-top: 3rem; text-align: right; border-top: 1px solid var(--glass-border); padding-top: 2rem;">
                <button type="submit" class="btn">Guardar Configuraciones</button>
            </div>
        </form>
    </div>
</div>
@endsection
