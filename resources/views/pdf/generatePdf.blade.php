<h1>Facture du {{$created_at}}</h1>
<h2>Commande n°{{$command}}</h2>
<?php
for ($i = 0; $i < count($array); $i++) {
  echo '<hr><p>'.$array[$i]["product_name"].' ('.$array[$i]["product_price"].' €)</p>
        <p><span>Taille : </span>'.$array[$i]["product_sizes_name"].' ('.$array[$i]["product_sizes_price"].' €)</p>
        <p><span>Toppings : </span>'.$array[$i]["toppings_name"].' ('.$array[$i]["toppings_price"].' €)</p>
        <p><span>Sucres : </span>'.$array[$i]["sugar_quantity"].' %</p>
        <p><span>Quantité : </span>'.$array[$i]["quantity"].'</p>
        <p>Prix total de la boisson : '.$array[$i]["bbt_price"].' €</p>
        ';
}
echo '<hr>
      <p>Prix total : '.$total_price.' €</p>';
?>