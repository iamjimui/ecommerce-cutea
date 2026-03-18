@guest
<div class="modal fade" id="productModal{{ $prod->id }}" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <form onsubmit="return ajoutBbt(event, <?php echo json_encode($prod->id)?>)">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="{{$prod->url}}" style="width:100%;">
                    <input type="hidden" name="product_id{{$prod->id}}" value="{{$prod->id}}">
                    <input type="hidden" name="product_name{{$prod->id}}" value="{{$prod->name}}">
                    <input type="hidden" name="product_price{{$prod->id}}" value="{{$prod->price}}">
                    <input type="hidden" name="description{{$prod->id}}" value="{{$prod->description}}">
                    <input type="hidden" name="url{{$prod->id}}" value="{{$prod->url}}">
                </div>
                <div class="modal-body">
                <h5 class="modal-title" id="productModalLabel">{{$prod->name}}</h5>
                <ul>
                      
                      <li>Description :  {{ $prod->description }}</li>
                      <li>Prix : {{ $prod->price }} €</li>
                </ul>
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
                    h5>Toppings</h5>
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
                    <h5>Sucres</h5>
                      <input type = "radio" name="sucres{{$prod->id}}" value="0"> 0%
                      <input type = "radio" name="sucres{{$prod->id}}" value="25"> 25%
                      <input type = "radio" name="sucres{{$prod->id}}" value="50"> 50%
                      <input type = "radio" name="sucres{{$prod->id}}" value="75"> 75%
                      <input type = "radio" name="sucres{{$prod->id}}" value="100"> 100%
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Ajouter au panier</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
            </div>
        </form>
    </div>
@endguest