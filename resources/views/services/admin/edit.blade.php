<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Úprava služby | MMArena.sk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-slate-100">

    <main class="mx-auto max-w-2xl px-4 py-12">

        <a href="{{ route('admin.services.index') }}"
           class="text-blue-600 hover:underline">
            ← Späť na správu služieb
        </a>

        <h1 class="mt-6 mb-6 text-3xl font-bold">
            Upraviť službu
        </h1>

        <form method="POST" action="{{ route('admin.services.update', $service) }}" class="space-y-5 rounded-xl bg-white p-6 shadow-sm">
            @csrf
            @method('PATCH')

            <div>
                <label for="name" class="mb-2 block font-medium">
                    Názov služby
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $service->name) }}"
                    class="w-full rounded-lg border border-slate-300 p-3"
                >
                @error('name')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="description" class="mb-2 block font-medium">
                    Popis služby
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    class="w-full rounded-lg border border-slate-300 p-3"
                >{{ old('description', $service->description) }}</textarea>

                @error('description')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div>
                <label for="price" class="mb-2 block font-medium">
                    Cena (€)
                </label>

                <input
                    type="number"
                    step="0.01"
                    id="price"
                    name="price"
                    value="{{ old('price', $service->price) }}"
                    class="w-full rounded-lg border border-slate-300 p-3"
                >
                @error('price')
                    <p class="mt-2 text-sm text-red-600">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700"
                >
                    Uložiť zmeny
                </button>

                <a href="{{ route('admin.services.index') }}"
                class="text-slate-600 hover:underline">
                    Zrušiť
                </a>
            </div>

        </form>

    </main>

</body>
</html>
