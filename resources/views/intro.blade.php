<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/intro.css')}}">
  <!-- Font Awesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
  />
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
  />
  <!-- MDB -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css"
    rel="stylesheet"
  />
  <script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <title>Cutea</title>

  <video class = "fullscreen" autoplay loop muted>
        <source src="http://127.0.0.1:8000/videos/YifangFruitTea.mp4" type="video/mp4">
  </video> 

</head>

<body class="body-intro">
  <div class="black-opacity">
  </div>
  
  <div class="bubblemyteaintro">
    @auth
    <a href="{{ route('commandes.detail') }}"><img class="bubbleteacutelogo" src="http://localhost:8000/images/bubbleteacutelogo.jpg"/></a>
    @endauth
    @guest
    <a href="{{ route('home.index') }}"><img class="bubbleteacutelogo" src="http://localhost:8000/images/bubbleteacutelogo.jpg"/></a>
    @endguest
  </div>

  <div id="scroll_to_top">
    <a href="#top"><img src="images/icons8-flèche-haut-100.png" alt="Retourner en haut" /></a>
</div>


<section class="projectintro">
<div class="projecintro-black-opacity">
</div>
<h1> ETNA PROJECT BubbleMyTea 🫰</h1>

<p>Né à Ivry-Sur-Seine en 2023 suite au projet BubbleMyTea, notre marque est issue de la passion commune  pour les Bubble Teas de nos co-fondateurs Emilie, Jimmy, Matthieu et Damien.</p>
<p>Afin de satisfaire l'exigence de Linda, Florence, Hubert-Henri, Elie, Daniel, Vincent et Anthony, nous avons crée une gamme de BBT issue des meilleurs thés et bobba de Taïwan ainsi qu'une sélection de fruits frais.</p>
<p>Fort d'une clientèle fidèle et engagée, nous avons développé un réseau de Franchise qui compte actuellement 187 boutiques dans 42 pays à travers le monde.</p>

<div class="franchise">
  <img  src ="http://localhost:8000/images/background3.jpeg">
  </div>
<h1> REJOIGNEZ-NOUS ! </h1>
</section>

<section class="sectionimage2">
  <video class = "fullscreen" autoplay loop muted>
  <source src="http://127.0.0.1:8000/videos/street_dance.mp4" type="video/mp4">
  </video>
 
  <style>
  body  {
    background-image: url("https://i0.wp.com/visitkoreatown.org/wp-content/uploads/2022/08/yifang-boba-teas.jpg?w=720&ssl=1");
    background-repeat: no-repeat;
    background-attachment: scroll;
  }
  </style>

  </video>
</section>

<section class="sectionimage3" style = "color:black">
  <br>
  <h1> #BUBBLETIME 😋! </h1>
  <div class="row">
    <img class="review_card col-lg-4" style="padding:50px;" src="http://localhost:8000/images/Naomy_Dubois.jpg">
    <img class="review_card col-lg-4" style="padding:50px;" src="http://localhost:8000/images/cutie_freyja.jpg">
    <img class="review_card col-lg-4" style="padding:50px;" src="http://localhost:8000/images/Naomy_Dubois_2.jpg">
  </div>
</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  </body>
</html>

