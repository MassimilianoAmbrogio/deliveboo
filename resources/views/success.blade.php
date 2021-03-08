@extends('layouts.app')
@section('content')

<main class="create-restaurant">
    <div class="container d-flex">
        <h1 class="text-center admin-title">Il tuo ordine è andato a buon fine</h1>
        <a class="btn btn-brand" href="{{ route('welcome') }}">Torna alla homepage</a>  
        <img class="img-success" src="{{ asset('img/rider.png') }}" alt="">
    </div>
</main>
@endsection