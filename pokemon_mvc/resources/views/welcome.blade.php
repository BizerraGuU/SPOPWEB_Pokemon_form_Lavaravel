<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome para ícones -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
            min-height: 100vh;
        }
        
        /* Imagem de fundo Pokémon */
        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1542779283-429940ce8336?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.1;
            z-index: -1;
        }
        
        .navbar-custom {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        
        .login-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            backdrop-filter: blur(5px);
        }
        
        .laravel-logo {
            color: #ff2d20;
            font-weight: bold;
            font-size: 24px;
        }
        
        .btn-laravel {
            background-color: #ff2d20;
            color: white;
        }
        
        .btn-laravel:hover {
            background-color: #e0261c;
            color: white;
        }
        
        .card-link {
            text-decoration: none;
            color: inherit;
            transition: transform 0.3s;
        }
        
        .card-link:hover {
            transform: translateY(-5px);
            color: inherit;
        }
        
        .footer {
            margin-top: 50px;
            padding: 20px 0;
            color: #6c757d;
        }
        
        /* Estilo para o título Pokémon com Pokebola */
        .pokemon-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }
        
        /* Card com tema Pokémon */
        .pokemon-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #ffde00 0%, #b3a125 100%);
            color: #333;
        }
        
        .pokemon-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .pokemon-card .card-body {
            padding: 1.5rem;
        }
        
        /* Efeito de brilho nos botões */
        .btn-pokemon {
            background: linear-gradient(135deg, #ff1c1c 0%, #cc0000 100%);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 25px;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 28, 28, 0.3);
        }
        
        .btn-pokemon:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(255, 28, 28, 0.4);
            color: white;
        }
        
        /* Navbar com tema Pokémon */
        .navbar-pokemon {
            background: linear-gradient(135deg, #ff1c1c 0%, #cc0000 100%);
        }
        
        .navbar-pokemon .navbar-brand,
        .navbar-pokemon .nav-link {
            color: white !important;
        }
        
        .navbar-pokemon .nav-link:hover {
            color: #ffde00 !important;
        }
    </style>
</head>
    <body>
        <!-- Navbar com tema Pokémon -->
        <nav class="navbar navbar-expand-lg navbar-pokemon">
            <div class="container">
                <a class="navbar-brand fw-bold" href="#">
                    <i class="fas fa-fire me-2"></i>Laravel
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="https://laravel.com/docs">
                                <i class="fas fa-book me-1"></i> Documentation
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://laracasts.com">
                                <i class="fas fa-play-circle me-1"></i> Laracasts
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://laravel-news.com">
                                <i class="fas fa-newspaper me-1"></i> News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-leaf me-1"></i> Ecosystem
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <!-- Título com Pokébola no lugar do "O" -->
                    <h1 class="pokemon-title">
                        Formulário Pokémon
                    </h1>
                    
                    <!-- Área de Login -->
                    <div class="login-container">
                        @if (Route::has('login'))
                            <div class="d-grid gap-3">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="btn btn-pokemon">
                                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-pokemon">
                                        <i class="fas fa-sign-in-alt me-2"></i> Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="btn btn-pokemon">
                                            <i class="fas fa-sign-in-alt me-2"></i> Register
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                    
                
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer text-center mt-5">
            <div class="container">
                <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
                <small>Pokémon theme inspired design</small>
            </div>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>