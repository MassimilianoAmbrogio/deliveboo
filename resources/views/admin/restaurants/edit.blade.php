@extends('layouts.app')
@section('content')
<main class="main-admin d-flex">

    <!-- sidebar -->
    @include('partials.sidebar')
  
      <!-- content here -->
    <section class="admin-content create-restaurant">
        <h1 class="text-center admin-title">Modifica {{$editRestaurant->name }}</h1>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
        <hr>
        @endif
        
        <div class="container d-flex create">
            <form action="{{ route('admin.restaurants.update', $editRestaurant->id) }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                @method("PATCH")
                
                <div class="d-flex form-down">
                    <div class="input">
                        <div class="form-group">
                            <label for="name">Nome Ristorante</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $editRestaurant->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Indirizzo</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $editRestaurant->address) }}">
                        </div>
                        <div class="form-group">
                            <label for="vat_num">Partita IVA</label>
                            <input class="form-control" type="text" name="vat_num" id="vat_num" value="{{ old('vat_num', $editRestaurant->vat_num) }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Numero di Telefono</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $editRestaurant->phone) }}">
                        </div>
                    </div>
                    
                    <div class="all-categories d-flex">
                        
                        <div class="img-create text-center">
                            <label for="image_logo">Logo Ristorante</label>
                            @isset($editRestaurant->image_logo)
                            <img width="150" height="150" src="{{ asset('storage/' . $editRestaurant->image_logo) }}" alt="{{ $editRestaurant->name }}">                
                            <h6>Change Old Image:</h6>
                            @endisset
                            <input type="file" name="image_logo" id="image_logo" accept="image/*">
                            {{-- <img src="{{ asset('img/rider.png') }}" alt=""> --}}
                        </div>
                        
                        <h3 class="text-center tag-list">Lista Tag:</h3>
                        <div class="box-categories form-group d-flex">
                            @foreach ($categories as $category)
                            <div class="category">
                                <input type="checkbox" name="categories[]" id="{{$category->id}}" value="{{$category->id}}"
                                @if ($editRestaurant->categories->contains($category->id)) checked @endif
                                >
                                
                                <label for="tag-{{$category->id}}">
                                    {{ $category->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
    
                </div>
    
                <div class="d-flex btn-create">
                    <input class="btn btn-brand" type="submit" value="Edita Ristorante">
                </div>
            </form>
        </div>
    </section>
  </main>

@endsection