@extends('layouts.app')
@section('content')

<main class="main-admin d-flex">

    <!-- sidebar -->
    @include('partials.sidebar')
  
      <!-- content here -->
    <section class="admin-content ">
        <div class="container">
            @if (session('updated'))
                <div class="alert alert-success">
                    Il piatto - {{ session('updated') }} - è stato correttamente modificato!
                </div>
            @endif
            
            <section class="dish-detail">
                <h1 class="text-center admin-title">{{ $dish->name }}</h1>
                <div class="box-detail d-flex">
                    <div class="box-img">
                        @isset($dish->image)
                        <img src="{{ asset('storage/' . $dish->image) }}" width="100">
                        @endisset
                    </div>
                    <p class="dish-desc">
                        {{ $dish->description }}
                    </p>
                </div>
        
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Tipologia</th>
                        <th scope="col">Vegan</th>
                        <th scope="col">Disponibilità</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Utilities</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $dish->typology }}</td>
                            <td>
                                @if ( $dish->vegan )
                                    <i class="fas fa-check-circle green-icon"></i>
                                @else
                                    <i class="fas fa-times-circle red-icon"></i>
                                @endif
                            </td>
                            <td>
                                @if ( $dish->available )
                                    <i class="fas fa-check-circle green-icon"></i>
                                @else
                                    <i class="fas fa-times-circle red-icon"></i>
                                @endif
                            </td>
                            <td>{{ $dish->price }} €</td>
                            <td colspan="2" class="d-flex justify-content-center">
                                <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn btn-grey"> <i class="fas fa-edit"></i> </a>
                                <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-red"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                  </table>
            </section>
        </div>
    </section> 
  </main>

@endsection