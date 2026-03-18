@foreach($products as $prod)
      <div class="card">
          <div class="card-body" data-toggle = "modal" data-target="#productModal{{ $prod->id }}">
            <img src="{{ $prod->url }}" class="bubble" alt="">
            <h5 class="card-title">{{ $prod->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted" style="text-align:center;">{{ $prod->price }} €</h6>
            <hr>
            <p class="card-text">{{ $prod->description }}</p>
            @if(auth()->user() && auth()->user()->role_id > 0 )
            <form action="{{route('product.destroy',  $prod->id)}}" method="post">
            @method('delete')
            @csrf
            <button type = "submit" class ="btn btn-danger" style="width:100%">supprimer</button>
            </form>
        @endif
          </div>
      </div>
        @include('profilteaguest')
        @auth
        <div class="modal fade" id="productModal{{ $prod->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        @if(auth()->user() && auth()->user()->role_id < 1)
          <form onsubmit="return ajoutBbt(event, <?php echo json_encode($prod->id)?>)">
        @endif
        @if(auth()->user() && auth()->user()->role_id > 0 )
          <form action="{{route('product.update',  $prod->id)}}" method="post" enctype="multipart/form-data">
            @method('patch')
            @csrf
        @endif
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                    <img src="{{$prod->url}}" style="width:100%;">
                    @if(auth()->user() && auth()->user()->role_id > 0 )
                    <input type = "text" name ="url" value="{{$prod->url}}" id="form3Example0">
                    <label class="form-label" for="form3Example0">modifier photo</label>
                  @endif
                    <input type="hidden" name="product_id{{$prod->id}}" value="{{$prod->id}}">
                    <input type="hidden" name="product_name{{$prod->id}}" value="{{$prod->name}}">
                    <input type="hidden" name="product_price{{$prod->id}}" value="{{$prod->price}}">
                    <input type="hidden" name="description{{$prod->id}}" value="{{$prod->description}}">
                    <input type="hidden" name="url{{$prod->id}}" value="{{$prod->url}}">
                  </div>
                  <div class="modal-body">
                  <h5 class="modal-title" id="productModalLabel">{{$prod->name}}</h5>
                  @if(auth()->user() && auth()->user()->role_id > 0 )
                    <input type = "text" name ="name" value="{{$prod->name}}" id="form3Example1">
                    <label class="form-label" for="form3Example1">modifier nom</label>
                  @endif
                    <ul>
                      
                      <li>Description :  {{ $prod->description }}</li>
                      @if(auth()->user() && auth()->user()->role_id > 0 )
                      <textarea name="description" class="form-textarea" rows="4" cols="20" id="form3exempletexarea"></textarea>
                      <label for="form3exempletexare">
                      @endif
                      <li>Prix : {{ $prod->price }} €</li>
                      @if(auth()->user() && auth()->user()->role_id > 0 )
                        <input type = "text" name ="price" value="{{$prod->price}}" id="form3Example2">
                        <label class="form-label" for="form3Example2">modifier prix</label>
                       @endif
                    </ul>
                    @if(auth()->user() && auth()->user()->role_id < 1 )
                    <h5>Tailles</h5>
                    <ul>
                      <li>
                        <input type = "radio" name="product_sizes{{$prod->id}}" value="1"> Petit (0 €)
                        <input type = "hidden" name="product_sizes1{{$prod->id}}" value="0.0">
                      </li>
                      <li>
                        <input type = "radio" name="product_sizes{{$prod->id}}" value="2"> Moyen (1.0 €)
                        <input type = "hidden" name="product_sizes2{{$prod->id}}" value="1.0">
                      </li>
                      <li>
                        <input type = "radio" name="product_sizes{{$prod->id}}" value="3"> Grand (1.5 €)
                        <input type = "hidden" name="product_sizes3{{$prod->id}}" value="1.5">
                      </li>
                    </ul>
                    @endif
                    <h5>Toppings</h5>
                    <ul>
                    @foreach($toppings as $top)
                      <li><input type="radio" name="toppings{{$prod->id}}" value="{{$top->id}}"> {{$top->name}} ({{$top->price}}€)</li>
                      <input type="hidden" name="toppings{{$top->id}}{{$prod->id}}" value="{{$top->price}}"> <br>
                      @if(auth()->user() && auth()->user()->role_id > 0 )
                        <input type = "text"  value="{{$top->name}}" id="form3Example3">
                        <label class="form-label" for="form3Example3">modifier nom</label>
                        <input type = "number" value="{{$top->price}}" id="form3Example4">
                        <label class="form-label" for="form3Example4">modifier prix</label>
                      @endif
                      <input type="hidden" name="toppings{{$top->id}}{{$prod->id}}" value="{{$top->price}}">
                    @endforeach
                    </ul>
                    @if(auth()->user() && auth()->user()->role_id < 1)
                      <h5>Sucres</h5>
                      <input type = "radio" name="sucres{{$prod->id}}" value="0"> 0%
                      <input type = "radio" name="sucres{{$prod->id}}" value="25"> 25%
                      <input type = "radio" name="sucres{{$prod->id}}" value="50"> 50%
                      <input type = "radio" name="sucres{{$prod->id}}" value="75"> 75%
                      <input type = "radio" name="sucres{{$prod->id}}" value="100"> 100%
                    @endif
                  </div>
                  @if(auth()->user() && auth()->user()->role_id < 1)
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ajouter au panier</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                  @endif
                  @if(auth()->user() && auth()->user()->role_id > 0)
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                  @endif
              </div> 
            </form> 
          </div>
          @endauth
          
          @if(auth()->user() && auth()->user()->role_id < 1)
          <div id="popups-afterbuy-{{$prod->id}}" class="popups-afterbuy">
            <div class="alert btn-success alert-dismissible fade show alert-buy-success-{{$prod->id}}" style="text-align:center;background-color:#14a44d!important;color:white!important;position: fixed;bottom: 0;right: 0;display:none;" role="alert">
              {{$prod->name}} a bien été ajouté au panier.
              <button type="button" class="close" onclick="return closeNotifications('success', <?php echo $prod->id ?>)">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="alert btn-danger m-1 alert-dismissible show alert-buy-danger-{{$prod->id}}" style="text-align:center;background-color:#dc4c64!important;color:white!important;position: fixed;bottom: 0;right: 0;display:none;" role="alert">
              Veuillez cocher toutes les options possibles.
              <button type="button" class="close" onclick="return closeNotifications('danger', <?php echo $prod->id ?>)">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          @endif
        </div>
  @endforeach
  @if(auth()->user() && auth()->user()->role_id > 0 )
    <div class="card">
      <div class="card-body" data-toggle = "modal" data-target="#CreateProductModal">
        <label for="buttonCreate" class="label-form">Ajouter nouveau thé</label>
        <button id="buttonCreate" name="buttonCreate" class="btn btn-success btn-lg btn-block">+</button>
      </div>
    </div>

    <div class="modal fade" id="CreateProductModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
      <form action = "{{route('product.store')}}" method="post">
        @csrf
         <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <input type="url" name="url" id="productUrl">
                  <label class="form-label" for="productUrl">Image du produit</label>
                </div>
                <div class="modal-body">
                  <ul>
                    <input type="text" name="name" id="ProductName">
                    <label class="form-label" for="ProductName">Nom du produit</label>
                    <textarea class="form-textarea" name="description" id="ProductDescription"  rows="4" cols="20"></textarea><br>
                    <label class="form-label" for="ProductDescription">Description du produit</label>
                    <input type="number" name="price" id="ProductPrice">
                    <label class="form-label" for="ProductPrice">Prix du produit</label>
                  </ul>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Mettre à jour</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
              </div>
            </div>
        </form>
      </div>              
  @endif

  