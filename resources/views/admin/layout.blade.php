<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conejo Cantú 88 - @yield('title')</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;500;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-black: #0f0f11;
            --color-dark: #1a1a1d;
            --color-red: #e62020;
            --color-red-hover: #ff3333;
            --color-white: #f5f5f5;
            --color-gray: #888888;
            --glass-bg: rgba(26, 26, 29, 0.7);
            --glass-border: rgba(255, 255, 255, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--color-black);
            color: var(--color-white);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-image: radial-gradient(circle at top right, rgba(230, 32, 32, 0.1), transparent 40%),
                              radial-gradient(circle at bottom left, rgba(255, 255, 255, 0.02), transparent 40%);
        }

        /* Glassmorphism utils */
        .glass-panel {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
        }

        /* Forms */
        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--color-gray);
            font-size: 0.9rem;
        }

        input {
            width: 100%;
            padding: 0.8rem 1rem;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            color: var(--color-white);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: var(--color-red);
            box-shadow: 0 0 0 2px rgba(230, 32, 32, 0.2);
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: var(--color-red);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
        }

        .btn:hover {
            background: var(--color-red-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(230, 32, 32, 0.3);
        }

        .btn-full {
            width: 100%;
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .alert-error {
            background: rgba(230, 32, 32, 0.1);
            border: 1px solid rgba(230, 32, 32, 0.3);
            color: #ff6b6b;
        }

        /* Header Admin */
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            border-bottom: 1px solid var(--glass-border);
            background: var(--color-dark);
        }

        .brand {
            font-size: 1.5rem;
            font-weight: 900;
            color: var(--color-white);
            text-decoration: none;
        }

        .brand span {
            color: var(--color-red);
        }

        .user-menu form {
            display: inline;
        }
        
        .user-menu button {
            background: transparent;
            border: none;
            color: var(--color-gray);
            cursor: pointer;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .user-menu button:hover {
            color: var(--color-red);
        }

        /* Layout Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            width: 100%;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
