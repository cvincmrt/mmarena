<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | MM Arena</title>
</head>
<body>
    <header>
        <h1>MM Arena</h1>

        <nav>
            <a href="{{ route('home') }}">Home</a>
            <a href="{{ route('contact') }}">Contact</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; MM Arena</p>
    </footer>
</body>
</html>
