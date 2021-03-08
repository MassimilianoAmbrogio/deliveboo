@extends('layouts.app')
@section('content')

<main class="main-admin d-flex">

  <!-- sidebar -->
  @include('partials.sidebar')

    <!-- content here -->
  <section class="admin-content ">
    <h1 class="text-center admin-title">Modifica piatto</h1>
    
      @if ($errors->any())
        <ul>
          @foreach ($errors->all() as $error)
            <li>
              {{ $error }}
            </li>
          @endforeach
        </ul>
      @endif
    
      <form action="{{ route('admin.dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    
        <div class="form-group">
          <label for="name" class="name">Nome</label>
          <input type="text" class="form-control edit-dishes" id="name" name="name" value="{{ old('name', $dish->name) }}">
        </div>
        <div class="form-group">
          <label for="price" class="price">Prezzo</label>
          <input type="number" class="form-control edit-dishes" min="0" max="999" id="price" name="price" value="{{ old('price', $dish->price) }}">
        </div>
        <div class="form-group">
          <label for="image" class="img">Immagine</label>
    
          @isset($dish->image)
            <img class="img" src="{{ asset('storage/' . $dish->image) }}" width="100">
            <h6 class="change-image">Change Old Image:</h6>
          @endisset
    
          <input type="file" class="form-control edit-dishes" id="image" name="image" accept="image/*">
        </div>
        <div class="form-group">
          <label for="description" class="description2">Descrizione</label>
          <textarea id="description" class="form-control edit-dishes mb-2" name="description">{{ old('description', $dish->description) }}</textarea>
        </div>
        <div class="form-group">
          <label for="typology" class="typology">Tipologia</label>
          <input type="text" class="form-control edit-dishes" id="typology" name="typology" value="{{ old('typology', $dish->typology) }}">
        </div>
        <div class="form-group">
          <label for="vegan" class="vegan2">Vegano</label>
          <input type="checkbox" id="vegan" name="vegan" @if($dish->vegan) checked @endif>
        </div>
        <div class="form-group">
          <label for="available" class="available2">Disponibilità</label>
          <input type="checkbox" id="available" name="available" @if($dish->available) checked @endif>
        </div>
    
        <input type="hidden" name="restaurant_id" value="{{ $dish->restaurant_id }}">
    
        <input type="submit" class="btn btn-brand submit2 form-control edit-dishes center-input" value="Modifica piatto">
      </form>
  </section> 
</main>
@endsection