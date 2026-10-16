<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('title') | MM Arena</title>
</head>
<body class="bg-slate-100 font-sans leading-relaxed text-slate-800">
    <header class="bg-slate-900 px-5 py-6 text-white md:px-10">
        <h1 class="mb-3 text-3xl font-semibold">MM Arena</h1>

        <nav class="flex flex-wrap gap-6">
            <a class="text-white no-underline transition hover:text-sky-300" href="{{ route('home') }}">Home</a>
            <a class="text-white no-underline transition hover:text-sky-300" href="{{ route('contact') }}">Contact</a>
        </nav>
    </header>

    <main class="mx-auto my-8 max-w-6xl rounded-xl bg-white p-5 shadow-sm md:p-8">
        @yield('content')
    </main>

    <footer class="p-6 text-center text-slate-500">
        <p>&copy; MM Arena</p>
    </footer>
</body>
</html>
