<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Elegance Vows') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@700&family=Playfair+Display:ital,wght@0,600;1,400&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #F8F9FA; color: #334155; }
        .navbar-brand { font-family: 'Cinzel Decorative', serif; font-weight: 700; color: #C5A880 !important; letter-spacing: 1px; }
        .bg-navy { background-color: #1B2A4A; }
        .btn-gold { background-color: #C5A880; color: #1B2A4A; font-weight: 600; }
        .btn-gold:hover { background-color: #B59870; color: #1B2A4A; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-navy shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">ELEGANCE VOWS</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item"><a class="nav-link text-light" href="{{ route('templates.index') }}">Templates</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item ms-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link text-light" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item ms-2"><a class="btn btn-gold btn-sm" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>