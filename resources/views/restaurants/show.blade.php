@extends('layouts.app')

@section('content')

<main class="rest-show-main">
  {{-- Errore pagamento --}}
  @if ($error) 
    <p class="alert alert-danger">L'ordine non è andato a buon fine, controllare il metodo di pagamento!</p>
  @else
    <input type="hidden" id="cookieDelete" value="true">
  @endif
  
  <div id="cart">
    {{-- info ristorante --}}
    <section class="rest-info-section mt-5 mb-5">
      <div class="rest-logo-wrapper">
        <img src="{{ asset('storage/'.$restaurant->image_logo) }}" alt="">
      </div>
      <div class="info">
        <input value="{{ $restaurant->id}}" type="hidden" id="restaurantId">
        <h1 class="restaurant-name">{{ $restaurant->name }}</h1>
        <p>{{ $restaurant->address }}</p>
        <p>+39 {{ $restaurant->phone }}</p>
        {{-- <p>P.IVA: {{ $restaurant->vat_num }}</p> --}}
      </div>
    </section>
  
    {{-- Lista piatti --}}
    <section id="menu" class="dishes-section mb-5">
      <h2 class="menu-title admin-title mb-5">MENU</h2>
      <div class="dish-typology mb-5" v-for="typology in typologies">
        <h2 class="dish-title mb-4">@{{ typology }}</h2>
        {{-- Piatto singolo --}}
        <a href="#modal-box" class="dish mb-5"
          v-if="dish.available && dish.typology == typology"
          v-for="(dish, index) in dishes"
          v-on:click="activeModal(index)">
          <div class="dish-img-wrapper">
            <img :src="'http://127.0.0.1:8000/storage/' + dish.image" alt="">
          </div>
          <div class="dish-name-desc">
            <h3>@{{dish.name}}</h3>
            <p>@{{dish.description}}</p>
          </div>
          <h3 class="dish-price">
            @{{dish.price}}€
          </h3>
        </a>
      </div>
    </section>

    <a v-if="total > 0" href="#cart-payment" class="btn btn-brand mb-5 go-to-pay" v-on:click="cartPayShow">
      Procedi al pagamento
    </a>
  
    {{-- Modale --}}
    <div id="modal-box" class="modal-box mb-5" v-show="displayModal">
      <h2>@{{ order[dishIndex].name }}</h2>
      <div class="quantity-wrapper">
        <label for="quantity">Quantità</label>
        <input id="quantity" type="number" min="0" v-model="numDish">
      </div>
      <a href="#menu" class="btn-cart" v-on:click="addDish()">Aggiungi piatto</a>
      <a href="#menu" class="modal-icon-close" v-on:click="displayModal = false">
        <i class="fas fa-times"></i>
      </a>
    </div>
  
    {{-- Carrello ordine --}}
    <div class="cart mb-5" v-bind:class="{ 'cart-hide': !cartOpen}" v-if="total > 0">
      <ul>
        <li class="dish-ordered mb-3" v-for="(product, index) in order" v-if="product.quantity > 0">
          <div class="dish-name-wrapper">
            <a class="btn-cart-remove" v-on:click="deleteDish(index)">
              <i class="fas fa-times-circle"></i>
            </a>
            <span class="prod-name">@{{ product.name }}</span>
          </div>
          <div class="set-quantity ml-3">
            <a class="btn-cart-quantity" v-on:click="setQuantity(false, index)">
              <i class="fas fa-minus"></i>
            </a>
            <span class="pz-quantity">@{{ product.quantity }}</span>
            <a class="btn-cart-quantity" v-on:click="setQuantity(true, index)">
              <i class="fas fa-plus"></i>
            </a>
          </div>
        </li>
      </ul>
      <div class="total">
        <span class="total-text">Totale: @{{ total }} €</span>
      </div>
      <a class="cart-open-close" v-on:click="cartToggle">
        <i v-if="cartOpen == false" class="fas fa-chevron-left"></i>
        <i v-else class="fas fa-chevron-right"></i>
      </a>
      <a class="btn-cart-clear" v-on:click="deleteCart">
        <i class="fas fa-trash-alt"></i>
      </a>
      <a href="#cart-payment" class="cart-pay" v-on:click="cartPayShow">
        <i class="far fa-credit-card"></i>
      </a>
      {{-- <a v-on:click="checkout()">Checkout</a> --}}
    </div>
  </div>
  
  
  {{-- pagamento braintree --}}
  <div class="braintree-dropin-wrapper" id="cart-payment">
    <h2 class="payment-title mb-5">Concludi il tuo ordine</h2>
    <form id="payment-form" class="form-group" action="{{ route('pay') }}" method="POST">
      @csrf
      @method('POST')
      <input type="hidden" name="amount" id="amount">
      <input type="hidden" id="nonce" name="payment_method_nonce"/>
      <input type="hidden" name="slug" value="{{ $restaurant->slug }}" />
      <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}" />
      <label for="phone">Numero di Telefono</label>
      <input type="text" name="phone" value="{{ old('phone') }}" id="phone" />
      <label for="address">Indirizzo di Consegna</label>
      <input type="text" name="address" value="{{ old('address') }}" id="address" />
      <div id="dropin-container"></div>
      
      <input type="submit" class="btn-cart" value="Paga"/>
    </form>
    
    {{-- script braintree --}}
    <script type="text/javascript">
      const form = document.getElementById('payment-form');
      const clientToken = '@php echo($clientToken) @endphp';
  
      braintree.dropin.create({
        authorization: clientToken,
        container: document.getElementById('dropin-container'),
      }, (error, dropinInstance) => {
  
        if (error) console.error(error);
  
        form.addEventListener('submit', event => {
            event.preventDefault();
  
            dropinInstance.requestPaymentMethod((error, payload) => {
            if (error) {
                console.error(error);
            }
            document.getElementById('nonce').value = payload.nonce;
  
            form.submit();
            });
        });
      });
    </script>
  </div>
  
</main>


<script defer src="{{asset('js/cart.js')}}" charset="utf-8"></script>

@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />