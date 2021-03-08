@extends('layouts.app')

@section('content')

<div class="content d-flex">

  <div class="cover">
  </div>

  <div class="access">
    <div class="headline">
      <img src="{{asset('./img/logo.png')}}" alt="">
      <p>Bentornato,<br> procedi pure al login, inserendo i tuoi dati personali.<br>Oppure
        <a href="http://127.0.0.1:8000/register">Registrati</a>
       alla nostra piattaforma.</p>

       <!-- FORM -->

       <form method="POST" action="{{ route('login') }}">
           @csrf

           <!-- area email -->
           <div class="d-flex email mb-3">
               <i class="fas fa-envelope icon"></i>
               <div class="">
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                   placeholder="e-mail">

                   @error('email')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror

               </div>
           </div>

           <!-- area password -->
           <div class="d-flex password">
               <i class="fas fa-key icon"></i>
               <div class="">
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">

                   @error('password')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror
               </div>
           </div>

           <div class="remember mt-3">
               <div class="form-check">
                   <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                   <label class="form-check-label mb-2" for="remember">
                       {{ __('Remember Me') }}
                   </label>
               </div>
           </div>

           <div class="login ">
               <button type="submit" class="btn btn-brand">
                   {{ __('Login') }}
               </button>

               @if (Route::has('password.request'))
                   <button class="btn btn-secondary " href="{{ route('password.request') }}">
                       {{ __('Forgot Your Password?') }}
                   </button>
               @endif
           </div>

       </form>

    </div>
  </div>
</div>


@endsection
