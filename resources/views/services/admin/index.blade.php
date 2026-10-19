<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Správa služieb | MMArena.sk</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100">

    <main class="mx-auto max-w-5xl px-4 py-12">
        @if(session('success'))
             <div class="mb-6 rounded-lg border border-green-300 bg-green-100 p-4 text-green-800">
                 {{ session('success') }}
             </div>
        @endif

        <h1 class="mb-6 text-3xl font-bold">
            Správa služieb
        </h1>

        <div class="overflow-x-auto rounded-xl bg-white shadow-sm">
            <table class="w-full text-left">

                <thead class="bg-slate-200">
                    <tr>
                        <th class="p-4">Názov</th>
                        <th class="p-4">Cena</th>
                        <th class="p-4">Stav</th>
                        <th class="p-4">Akcia</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($services as $service)
                        <tr class="border-t border-slate-200">

                            <td class="p-4">
                                {{ $service->name }}
                            </td>

                            <td class="p-4">
                                {{ number_format($service->price, 2, ',', ' ') }} €
                            </td>

                            <td class="p-4">
                                {{ $service->is_active ? 'Aktívna' : 'Neaktívna' }}
                            </td>

                            <td class="p-4">
                                <div class="flex items-center gap-4">

                                    <form action="{{ route('admin.services.changeStatus', $service) }}"
                                        method="POST">

                                        @csrf
                                        @method('PATCH')

                                        <button
                                            type="submit"
                                            class="{{ $service->is_active
                                                ? 'text-orange-600'
                                                : 'text-green-600' }} font-medium hover:underline"
                                        >
                                            {{ $service->is_active ? 'Deaktivovať' : 'Aktivovať' }}
                                        </button>

                                    </form>

                                    <a href="{{ route('admin.services.edit', $service) }}"
                                    class="font-medium text-blue-600 hover:underline">
                                        Upraviť
                                    </a>

                                    <form action="{{ route('admin.services.delete', $service) }}"
                                        method="POST"
                                        onsubmit="return confirm('Naozaj chceš odstrániť túto službu?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="font-medium text-red-600 hover:underline">
                                            Odstrániť
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-slate-500">
                                Zatiaľ nemáme žiadne služby.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </main>

</body>
</html>
