
@extends('layouts.app')

@section('title', 'Domov')

@section('content')
    <h2>Vitajte v {{ $nazovAreny }}</h2>
    <p>Naša aréna sa nachádza v meste {{ $mesto }}.</p>
    <p>V meste je {{ $pocetKlzisk }}.</p>
@endsection
