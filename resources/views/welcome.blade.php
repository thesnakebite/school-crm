<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .bg-image {
            background-image: url('/school.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }

        .auth-buttons {
            position: absolute;
            bottom: 2rem;
            right: 2rem;
        }

        .welcome-text {
            position: relative;
            z-index: 1;
            color: white;
        }
    </style>
</head>
<body class="antialiased">
    <div class="bg-image">
        <div class="overlay"></div>
        
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center welcome-text">
                    <h1 class="display-4 mb-4">Sistema de Gestión Escolar</h1>
                    <p class="lead">Administra tus escuelas y alumnos de manera eficiente</p>
                </div>
            </div>
        </div>

        <div class="auth-buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('schools.index') }}" class="btn btn-primary">
                        <i class="bi bi-layout-text-window-reverse"></i> Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light me-2">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                @endauth
            @endif
        </div>
    </div>
</body>
</html>