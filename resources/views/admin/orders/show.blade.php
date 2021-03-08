@extends('layouts.app')

@section('content')


<main class="main-admin d-flex">

  <!-- sidebar -->
  @include('partials.sidebar')

    <!-- content here -->
  <section class="admin-content order-show container">
    <h2 class="text-center admin-title mb-5"> Dettaglio Ordine ID. {{ $order->id}} </h2>
    
    <div class="bill-store">
      <h2 class="mb-5">Scontrino</h2>
      
      <div class="address mb-3">
        <p> Indirizzo di consegna:<br>
          <i class="fas fa-map-marker-alt"></i>
          <span> {{ $order->address }} </span>
        </p>
      </div>
      
      <div class="phone mb-5">
        <p> Numero di telefono del destinatario:<br>
          <i class="fas fa-phone"></i>
          <span> {{ $order->phone}} </span>
        </p>
      </div>
      
      
      @foreach ($dishes as $dish)
      <div class="dish-name mb-3 text-center">
        <p>Piatto ordinato:
          <i class="fas fa-utensils"></i>
          <span>{{$dish->name}}</span>
        </p>
      </div>
      
      <div class="dish-price mb-3 text-center">
        <p>Quantità del piatto ordinato:
          <i class="fas fa-times"></i> {{$dish->quantity}}
        </p>
      </div>
      
      <div class="dish-price mb-4 text-center">
        <p>Prezzo del piatto ordinato:
          <i class="fas fa-money-check-alt"></i>
          <span>{{$dish->price}} €</span>
        </p>
      </div>
      <hr>
      @endforeach
      
      <div class="tot text-center mt-5">
        <h2 class="mb-4">Prezzo totale: </h2>
        <i class="fas fa-cash-register">  {{ $order->amount }} €</i>
      </div>
    </div>
    
    <div class="btn-return">
      <a href="{{route('admin.orders.index')}}"class="btn mt-4">Indietro</a>
    </div>
  </section> 
</main>

@endsection
