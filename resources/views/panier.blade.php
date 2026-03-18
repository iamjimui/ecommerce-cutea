@include('header')

<br>

<div class="row row-panier">
    <form class="cart-checkout-form" action="" method="post" onsubmit="return checkout(event)">
      @csrf
      <div class="row">
        <div class="col-lg-8 cart-checkout-form1">
        </div>
        <div class="col-lg-4 cart-checkout-form2">
          <div class="card" style="position: sticky;top: 100px;">
            <div class="card-body">
              <h5 class="card-title">Prix total</h5>
              <span>Prix : <span class="total_price_span">0</span> €</span>
              <br>
              <br>
              <span>Frais : <span>0</span> €</span>
              <br>
              <br>
              <hr>
              <span>Le prix total : <span class="total_price_span">0</span> €</span>
              <br>
              <br>
              <div style="display:flex;justify-content:center;">
              @auth
              <button type="submit" class="btn btn-success">Checkout</button>
              @endauth
              @guest
              <button disabled type="submit" class="btn btn-success">Checkout</button>
              @endguest
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
</div>
<div id="popups-afterbuy" class="popups-afterbuy">
  <div class="alert btn-success alert-dismissible fade show alert-buy-success" style="text-align:center;background-color:#14a44d!important;color:white!important;position: fixed;display:none;z-index:50;" role="alert">
    Edité avec succès !
    <button type="button" class="close" onclick="return closeNotifications('success', null)">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="alert btn-danger m-1 alert-dismissible show alert-buy-danger" style="text-align:center;background-color:#dc4c64!important;color:white!important;position: fixed;display:none;z-index:50;" role="alert">
    Le panier a été vidé !
    <button type="button" class="close" onclick="return closeNotifications('danger', null)">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="alert btn-danger m-1 alert-dismissible show alert-buy-danger-missing-cart" style="text-align:center;background-color:#dc4c64!important;color:white!important;position: fixed;display:none;z-index:50;" role="alert">
    Il n'y a rien a payer !
    <button type="button" class="close" onclick="return closeNotifications('missing-cart', null)">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
  if (session()->get('success')) {
    ?><div class="alert btn-success m-1 alert-dismissible show alert-buy-success-checkout" style="text-align:center;background-color:#14a44d!important;color:white!important;position: fixed;display:inline-block;z-index:50;" role="alert">
    Vous avez payé avec succès !
    <button type="button" class="close" onclick="return closeNotifications('success-checkout', null)">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
  }
  ?>
</div>

<script src="http://localhost:8000/js/panierActions.js"></script>

@include('footer')