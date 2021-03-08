<!-- sidebar -->
<aside class="admin-sidebar sidebar-hide">
  @if(! Auth::user()->restaurants->isEmpty())
    <h6 class="text-center mb-5">CREA / MODIFICA RISTORANTE</h6>
     <!-- menu -->
    <div class="side-menu mb-5">
      <h6>MENU</h6>
      <div class="cont-menu">
        <ul>
          <li>
            <a href="{{ route('admin.dishes.index') }}">Visualizza Menu</a>
          </li>
          <li>
            <a href="{{ route('admin.dishes.create') }}">Aggiungi Nuovo Piatto</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- ordini -->
    <div class="side-menu">
      <h6>ORDINI</h6>
      <div class="cont-menu">
        <ul>
          <li>
            <a href="{{ route('admin.orders.index') }}">Visualizza Ordini</a>
          </li>
          <li>
            <a href="{{ route('admin.stats.index') }}">Statistiche Ordini</a>
          </li>
        </ul>
      </div>
    </div>
  @endif
</aside>

<div class="open-sidebar">
  <i class="fas fa-th-large"></i>
</div>

<script defer src="{{ asset('js/sidebar.js') }}"></script>