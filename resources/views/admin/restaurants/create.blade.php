@extends('layouts.app')
@section('content')

<main class="main-admin d-flex">

    <!-- sidebar -->
    @include('partials.sidebar')
  
      <!-- content here -->
    <section class="admin-content create-restaurant">
        <h1 class="text-center admin-title">Crea nuovo ristorante</h1>
        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>
                {{$error}}
            </li>
            @endforeach
        </ul>
        <hr>
        @endif
        
        <div class="container d-flex create">
            <form action="{{ route('admin.restaurants.store') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf
                @method("POST")
                
                <div class="d-flex form-down">
                    <div class="input">
                        <div class="form-group">
                            <label for="name">Nome Ristorante</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Indirizzo</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}">
                        </div>
                        <div class="form-group">
                            <label for="vat_num">Partita IVA</label>
                            <input class="form-control" type="text" name="vat_num" id="vat_num" value="{{ old('vat_num') }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Numero di Telefono</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}">
                        </div>
                        <div class="form-group">
                            <label for="img_logo">Logo Ristorante</label>
                            <input type="file" name="image_logo" id="img_logo" accept="image/*">
                        </div>
                    </div>
                    
                    <div class="all-categories d-flex">
                        
                        <div class="img-create">
                            <img src="{{ asset('img/no-rest-logo.jpg') }}" alt="">
                        </div>
                        
                        <h3 class="text-center">TIPOLOGIE</h3>
                        <div class="box-categories form-group d-flex">
                            @foreach ($categories as $category)
                            <div class="category">
                                <input type="checkbox" name="categories[]" id="{{ $category->name }}" value = "{{ $category->id }}">
                                <label for="{{ $category->name }}">{{ $category->name }}</label><br>            
                            </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
        
                <div class="d-flex btn-create">
                    <input class="btn btn-brand" type="submit" value="Crea Ristorante">
                </div>
        
            </form>
        </div>
    </section> 
</main>
@endsection
