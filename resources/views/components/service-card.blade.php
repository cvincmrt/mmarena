@props(['sluzba'])

<div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
    <h3 class="mb-2 text-lg font-semibold text-slate-900">
        {{ $sluzba->name }}
    </h3>

    <p class="text-slate-600">
        Popis:
        <span class="font-bold text-slate-900">
            {{ $sluzba->description ?? 'K danej sluzbe este nebol vytvoreny popis' }}
        </span>
    </p>

    <p class="text-slate-600">
        Cena:
        <span class="font-bold text-slate-900">
            {{ number_format($sluzba->price, 2, ',', ' ') }} €
        </span>
    </p>
</div>
