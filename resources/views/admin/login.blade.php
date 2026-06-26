@extends('admin.layout')

@section('title', 'Login')

@section('content')
<style>
    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 1;
    }

    .login-box {
        width: 100%;
        max-width: 400px;
        padding: 3rem 2rem;
        text-align: center;
    }

    .login-logo {
        font-size: 3rem;
        font-weight: 900;
        margin-bottom: 0.5rem;
        line-height: 1;
    }
    
    .login-logo span {
        color: var(--color-red);
    }

    .login-subtitle {
        color: var(--color-gray);
        margin-bottom: 2rem;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .login-box form {
        text-align: left;
    }
</style>

<div class="login-container">
    <div class="login-box glass-panel">
        <div class="login-logo">CANTÚ<span>88</span></div>
        <div class="login-subtitle">Panel de Control</div>

        @if($errors->any())
            <div class="alert alert-error">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn btn-full">Ingresar al Paddock</button>
        </form>
    </div>
</div>
@endsection
