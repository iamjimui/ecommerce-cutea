@include('header')
<br>
<header>
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style ="z-index :1;">
      <div class="list-group list-group-flush mx-3 mt-4">

        <a href="{{route('users.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-users fa-fw me-3"></i><span>Profil</span></a>                   
        <a href="{{route('commandes.detail')}}" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-chart-bar fa-fw me-3"></i><span>Commandes</span></a>
        @if(auth()->user()->role_id > 0)
        <a href="{{route('users.show')}}" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fa-solid fa-users fa-fw me-3"></i><span>Liste utilisateurs</span></a>
        @endif
        <a href="{{route('users.updatePasswordIndex')}}" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fa-solid fa-unlock fa-fw me-3"></i><span>Changer mdp</span></a>
        <!-- <button id = "btn2"> Commandes <button> --> 
      </div>

      <div class="list-group list-group-flush mt-auto" style ="position : absolute; bottom : 0; width : 100%; margin-left: 0;" >
      <a href="#" class="list-group-item list-group-item-action py-2 ripple logout" onclick="logout()">
      <i class="fas fa-sign-out-alt fa-fw me-3"></i><span>Se déconnecter</span>
      </a>
      </div>
           
  </nav>
</header>

<?php
if (count($orderAndDetails) === 0) {
  echo '<div style="text-align:center;">
          <p>Vous n\'avez fait aucune commande chez Cutea. Quelle honte !</p>
        </div>';
} else {
  $temporary_id = $orderAndDetails[0]->orders_id;
  $i = false;
  foreach($allOrdersByUserId as $orderByUserId) {
    echo '<div style="text-align:center;">
    <a class="btn btn-primary" data-mdb-toggle="collapse" href="#ordernumber'.$orderByUserId->id.'" role="button" aria-expanded="false" aria-controls="ordernumber'.$orderByUserId->id.'">Commande '.$orderByUserId->id.'</a>
    <span>Prix total : '.$orderByUserId->total_price.' €</span>
    <span>Date : '.$orderByUserId->created_at.'</span>
    </div>
    <div class="row command'.$orderByUserId->id.'">';
    ?>
    <form action="/generatePdf" method="POST">
      @csrf
    <?php
    echo '<input type="hidden" name="command" value="'.$orderByUserId->id.'">
      <input type="hidden" name="total_price" value="'.$orderByUserId->total_price.'">
      <input type="hidden" name="created_at" value="'.$orderByUserId->created_at.'">
      <div class="row collapse multi-collapse mt-3" id="ordernumber'.$orderByUserId->id.'">';
    foreach($orderAndDetails as $orderAndDetail) {
      if ($orderAndDetail->orders_id === $orderByUserId->id) {
        echo '<div style="display:flex;justify-content:center;">
              <hr style="width:50vw;">
              </div>
            <div class="col" style="display: flex;align-items: center;justify-content: center;">
                <div style="text-align:end;">
                  <img src="'.$orderAndDetail->products_url.'" style="width:30%">
                </div>
              </div>
              <div class="col">
                <input type="hidden" name="product_name[]" value="'.$orderAndDetail->products_name.'">
                <input type="hidden" name="product_price[]" value="'.$orderAndDetail->products_price.'">
                <span><b>'.$orderAndDetail->products_name.'</b></span>
                <br>
                <input type="hidden" name="quantity[]" value="'.$orderAndDetail->products_quantity.'">
                <span>x'.$orderAndDetail->products_quantity.'</span>
                <br>
                <input type="hidden" name="product_sizes_name[]" value="'.$orderAndDetail->product_sizes_name.'">
                <input type="hidden" name="product_sizes_price[]" value="'.$orderAndDetail->product_sizes_price.'">
                <span>Taille : Moyen (Prix : '.$orderAndDetail->product_sizes_price.' €)</span>
                <br>
                <input type="hidden" name="toppings_name[]" value="'.$orderAndDetail->toppings_name.'">
                <input type="hidden" name="toppings_price[]" value="'.$orderAndDetail->toppings_price.'">
                <span>Toppings : Gelée de the vert (Prix : '.$orderAndDetail->toppings_price.' €)</span>
                <br>
                <input type="hidden" name="sugar_quantity[]" value="'.$orderAndDetail->sugar_quantity.'">
                <span>Sucres : '.$orderAndDetail->sugar_quantity.' %</span>
                <br>
                <input type="hidden" name="bbt_price[]" value="'.$orderAndDetail->bbt_price.'">
                <span>Prix boisson : '.$orderAndDetail->bbt_price.' €</span>
                <br>
              </div>';
      }
    }
    echo '</div>
        </div>
        </div>
        <div style="display:flex;justify-content:center;">
          <button type="submit" class="btn btn-danger"><i class="far fa-file-pdf"></i></button>
        </div>
        </form>
        <hr>';
  }
}
?>

<nav aria-label="..." style="position:relative;z-index:10;display:flex;justify-content:center;margin-top:7%;">
  <ul class="pagination">
    <?php
    if (isset($_GET['page'])) {
      if ($page > 1) {
        if ($page < $numberOfPages) {
          if ($numberOfPages > 2) {
            echo '<li class="page-item">
                    <a class="page-link" href="?page='.($page-1).'" style="background-color:white;">Précédent</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" style="background-color:gray;" href="?page='.($page-1).'">'.($page-1).'</a>
                  </li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link">'.$page.'<span class="visually-hidden">(current)</span></a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" style="background-color:gray;" href="?page='.($page+1).'">'.($page+1).'</a>
                  </li>
                  <li class="page-item">
                  <a class="page-link" style="background-color:white;" href="?page='.($page + 1).'">Suivant</a>
                  </li>';
          }
        } else {
          echo '<li class="page-item">
                  <a class="page-link" style="background-color:white;" href="?page='.($page-1).'">Précédent</a>
                </li>
                <li class="page-item">
                  <a class="page-link" href="?page='.($page-1).'" style="background-color:gray;">'.($page-1).'</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="?page='.$page.'">'.$page.'</a>
                </li>
                <li class="page-item disabled">
                  <a class="page-link" style="background-color:white;">Suivant</a>
                </li>';
        }
      } else {
        if ($numberOfPages > 1) {
          echo '<li class="page-item disabled">
                  <a class="page-link" style="background-color:white;">Précédent</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link">'.$page.'</a>
                </li>
                <li class="page-item">
                  <a class="page-link" style="background-color:gray;" href="?page='.($page+1).'">'.($page+1).'</a>
                </li>
                <li class="page-item">
                  <a class="page-link" style="background-color:white;" href="?page='.($page+1).'">Suivant</a>
                </li>';
        } else {
          echo '<li class="page-item disabled">
                  <a class="page-link" style="background-color:white;">Précédent</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link">'.$page.'</a>
                </li>
                <li class="page-item disabled">
                  <a class="page-link" style="background-color:white;">Suivant</a>
                </li>';
        }
      }
    } else {
      echo '<li class="page-item disabled">
              <a class="page-link" style="background-color:white;">Précédent</a>
            </li>
            <li class="page-item active" aria-current="page">
              <a class="page-link">1<span class="visually-hidden">(current)</span></a>
            </li>';
      if ($numberOfOrders > 6) {
        echo '<li class="page-item">
              <a class="page-link" style="background-color:white;" href="?page=2">Suivant</a>
            </li>';
      } else {
        echo '<li class="page-item disabled">
                <a class="page-link" style="background-color:white;">Suivant</a>
              </li>';
      }
    }
    ?>
  </ul>
</nav>

{{$numberOfOrders}}
@include('footer')
