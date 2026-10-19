@extends('layouts.app')

@section('content')
    <div class="mx-auto max-w-2xl px-4 py-10">
        <h1 class="mb-4 text-3xl font-bold text-slate-900">
            Pridanie novej služby
        </h1>

        <p class="text-slate-600">
            <form method="POST" action="{{ route('services.store') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block font-medium text-slate-700">
                        Názov služby
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        class="mt-1 w-full rounded-lg border border-slate-300 p-3"
                    >
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block font-medium text-slate-700">
                        Opis služby
                    </label>

                    <textarea
                        id="description"
                        name="description"
                        rows="4"
                        class="mt-1 w-full rounded-lg border border-slate-300 p-3"
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="price" class="block font-medium text-slate-700">
                        Cena (€)
                    </label>

                    <input
                        type="number"
                        id="price"
                        name="price"
                        step="0.01"
                        min="0"
                        value="{{ old('price') }}"
                        class="mt-1 w-full rounded-lg border border-slate-300 p-3"
                    >

                    @error('price')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <button
                    type="submit"
                    class="rounded-lg bg-blue-600 px-5 py-3 font-semibold text-white"
                >
                    Pridať službu
                </button>
            </form>
        </p>
    </div>
@endsection
