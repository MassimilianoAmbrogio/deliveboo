@extends('layouts.app')

@section('content')
    <main class="hero">
        <div class="start d-flex">
            <a class="btn-start mb-5" href="{{ route('restaurants.index') }}">INIZIA</a>
            <div class="text d-flex">
                <span id="text-sx">I. Scegli il Ristorante</span>
                <span id="text-mx">II. Ordina a Domicilio</span>
                <span id="text-dx">III. Goditi il tuo Ordine</span>
            </div>
        </div>
        <div class="scooter">
            <img src="{{ asset('img/rider.png') }}" alt="">
        </div>
    </main>
@endsection
