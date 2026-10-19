
@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @if (session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-800">
            {{ session('success') }}
        </div>
    @endif
    
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
                <x-service-card :sluzba="$sluzba" />
            @empty
                <p class="rounded-lg bg-slate-50 p-4 text-slate-600 md:col-span-2 lg:col-span-3">
                    Momentálne nemáme žiadne služby.
                </p>
            @endforelse

        </div>
    </section>

@endsection
