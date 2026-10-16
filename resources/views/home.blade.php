
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h2>Vitajte v {{ $nazovAreny }}</h2>
    <p>Naša aréna sa nachádza v meste {{ $mesto }}.</p>

    @if($pocetKlzisk > 1)
        <p>V mmarene mame viacero klzisk</p>
    @elseif($pocetKlzisk === 1)
        <p>V mmarene mame jedno klzisko</p>
    @else
        <p>V mmarene nemame klzisko</p>
    @endif


    <section>
        <h2 class="mb-6 text-2xl font-bold text-slate-900">
            Naše služby
        </h2>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($sluzby as $sluzba)
                <div class="rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
                    <h3 class="mb-2 text-lg font-semibold text-slate-900">
                        {{ $sluzba->name }}
                    </h3>

                    <p class="text-slate-600">
                        Cena:
                        <span class="font-bold text-slate-900">
                            {{ $sluzba->price }} €
                        </span>
                    </p>
                </div>
            @empty
                <p class="rounded-lg bg-slate-50 p-4 text-slate-600 md:col-span-2 lg:col-span-3">
                    Momentálne nemáme žiadne služby.
                </p>
            @endforelse
        </div>
    </section>

@endsection
