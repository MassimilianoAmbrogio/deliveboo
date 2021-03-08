@extends('layouts.app')

@section('content')

<main class="main-admin d-flex">

  <!-- sidebar -->
  @include('partials.sidebar')

    <!-- content here -->
  <section class="admin-content order-index container">
    <h1 class="admin-title text-center">Lista Ordini</h1>
    @if(empty($orders))
        <p class="intro-menu">
            In questa sezione ti è possibile visualizzare tutti gli ordini ricevuti dal tuo ristorante.
            <strong>ATTENZIONE! Al momento, non sono presenti ordini!</strong> 
        </p>
    @else
    {{-- <div class="" id="ora">

    </div> --}}

    <!-- tabella lista ordini -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="id">N.ID</th>
          <th class="day">Data ordine</th>
          <th class="time">Orario ordine</th>
          <th class="amount text-center">Prezzo Totale Ordine</th>
          <th></th>
        </tr>
      </thead>

      <!-- Ciclo + compilazione tabella -->
      <tbody>
        @foreach ($orders as $order)
          <tr>
            <td class="id-main"> {{  $order->id }} </td>
            <td class="day-main">  {{  $order->created_at->isoFormat('dddd DD/MM/YYYY') }}  </td>
            <td class="time-main">  {{  $order->created_at->isoFormat('HH:mm')}}  </td>
            <td class="amount-main text-center">  {{  $order->amount}} € </td>
            <td class="text-center" width="100">
              <a href="{{route ('admin.orders.show', $order->id)}}" class="btn btn-brand">Dettaglio</a>
            </td>
          </tr>
        @endforeach
      </tbody>
      @endif
      <!-- mostra bottone statistiche all ultimo ciclo -->
      @if (! empty($orders))
      <a href="{{ route('admin.stats.show', $id) }}"class="btn btn-brand mb-5">Visualizza Statistiche</a>
      @else
      <div class="alert alert-danger">
        <p>Non hai ricevuto ordini.</p>
      </div>
      @endif

    </table>

    <div class="pagination">
      {{$orders->links()}}
    </div>

    <!-- bottone indietro -->
      {{-- <a href="{{route('admin.home')}}"class="btn btn-1 mt-4">Indietro</a> --}}

  </section>   
</main>  

@endsection
