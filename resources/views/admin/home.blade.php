@extends('layouts.app')

@section('content')
<main class="main-admin d-flex">

    <!-- sidebar -->
    @include('partials.sidebar')
  

    <!-- content here -->
  <section class="admin-content ">
    @if (session('saved'))
    <div class="alert alert-success text-center">
      <p>Il tuo ristorante {{session('saved')}} è stato creato!</p>
    </div>
    @elseif (session('updated'))
    <div class="alert alert-warning text-center">
      <p>Il tuo ristorante {{session('updated')}} è stato modificato.</p>
    </div>
    @elseif (session('deleted'))
    <div class="alert alert-danger text-center">
      <p>Il ristorante {{session('deleted')}} è stato cancellato!</p>
    </div>
    @endif

    @forelse ($user->restaurants as $restaurant)

    <!-- logo here -->
    <div class="logo mb-4">
      @if(!empty($restaurant->image_logo))
      <img src="{{ asset('storage/' . $restaurant->image_logo)}}" alt="">
      @else
      <img src="{{ asset('img/no-rest-logo.jpg')}}" alt="">
      @endif
    </div>

    <!-- content titolo + info ristorante -->
    <div class="info-risto">
      <h2 class="admin-title">{{ $restaurant->name }}</h2>
      <p class="address">
        <i class="fas fa-map"></i> : {{$restaurant->address}}
      </p>
      <p class="p-iva"> P.IVA : {{$restaurant->vat_num}}
      </p>
      <p class="phone">
        <i class="fas fa-phone"></i>: {{$restaurant->phone}}
      </p>

      <div class="btns d-flex">
        <a class="btn btn-brand text-center" href="{{route('admin.orders.index')}}">ORDINI
        </a>
        <a class="btn btn-brand text-center" href="{{ route('admin.dishes.index') }}">
          MENU
        </a>
        <a class="btn btn-brand text-center" href="{{ route('admin.restaurants.edit', $restaurant->id) }}">MODIFICA RISTORANTE</a>
        <!-- form cancellazione ristorante -->
        <form action="{{ route('admin.restaurants.destroy', $restaurant->id) }}" method="POST">
          @csrf
          @method('DELETE')
          <button class="btn btn-red" type="submit">Cancella Ristorante</button>
        </form>
      </div>

      @empty
      <div class="empty text-center container">
        <h2 class="text-center admin-title">Benvenuto in Deliveboo!</h2>
        <p>Inizia da qui, creando il tuo ristorante, inserendo un menù e controllando di volta in volta gli ordini che verranno fatti dai tuoi clienti.
          Consegne veloci, pasti caldi, clienti soddisfatti! La famiglia Deliveboo è pronta a darti tutti gli strumenti per restare al passo con i tempi!
        </p>
        <a class="btn btn-brand text-center"   href="{{route('admin.restaurants.create') }}">
          Crea Ristorante
        </a>
      </div>

    </div>
  </section>

    @endforelse

</main>
@endsection