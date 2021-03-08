@extends('layouts.app')

@section('content')
<div class="content d-flex">


  <div class="access">

    <div class="headline">
      <img src="{{asset('./img/logo.png')}}" alt="">
      <p>Benvenuto,<br>
        compila i campi seguenti con le tue informazionie registrati sulla nostra piattaforma.<br>
        Oppure <a href="http://127.0.0.1:8000/login"> Accedi</a> usando i tuoi dati personali</p>

       <!-- FORM -->
           <div class="box-form d-flex">
             <form method="POST" action="{{ route('register') }}" >
               @csrf

             <div class="name-email">
               <!-- name -->
               <label for="name" class="">Nome</label>
               <div class=" mb-3">
                   <input id="name" type="text" class=" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                   @error('name')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
               </div>

               <!-- email -->
               <label for="email" class="">{{ __('E-Mail Address') }}</label>
               <div class=" mb-3">
                   <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                   @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
               </div>
             </div>

             <div class="pass-conf">
               <!-- password -->
               <label for="password" class="">{{ __('Password') }}</label>
               <div class=" mb-3">
                 <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                 @error('password')
                 <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                 </span>
                 @enderror
               </div>
               <!-- conferma password -->
               <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
               <div class=" mb-3">
                 <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
               </div>
             </div>
           </div>
               <button type="submit" class="btn btn-brand">
                   REGISTRATI
               </button>
       </form>


    </div>
  </div>

  <div class="cover">

  </div>
</div>

@endsection
