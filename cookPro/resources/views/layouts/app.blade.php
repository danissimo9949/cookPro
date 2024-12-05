{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookPro Blog</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        .content {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body class="d-flex flex-column">
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('index') }}">CookPro</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        @if(auth()->user() && auth()->user()->role == 'author')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.create') }}">Створити пост</a>
                        </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blog.index') }}">Всі пости</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-light" href="{{ route('register') }}">Реєстрація</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-light" href="{{ route('login') }}">Вхід</a>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item ms-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-light">Вихід</button>
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="container py-5">
            @yield('content')
        </main>

        <footer>
            <p>&copy; {{ date('Y') }} CookPro Blog. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/post_create_validation.js') }}"></script>
    <script src="{{ asset('js/post_edit_validation.js') }}"></script>
</body>
</html>
