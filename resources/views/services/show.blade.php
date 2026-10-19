<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->name }} | MMArena.sk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

    <main class="mx-auto max-w-4xl px-4 py-12">

        <a href="{{ route('home') }}"
           class="text-blue-600 hover:underline">
            ← Späť na domovskú stránku
        </a>

        <div class="mt-6 rounded-xl bg-white p-8 shadow-sm">

            <h1 class="mb-4 text-3xl font-bold text-slate-900">
                {{ $service->name }}
            </h1>

            <p class="mb-4 text-slate-600">
                {{ $service->description ?? 'Popis zatiaľ nie je dostupný.' }}
            </p>

            <p class="text-xl font-semibold text-slate-900">
                {{ number_format($service->price, 2, ',', ' ') }} €
            </p>

        </div>

    </main>

</body>
</html>
