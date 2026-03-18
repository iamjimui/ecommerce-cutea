<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <title>Cutea</title>
  <link rel="stylesheet" href="{{asset('css/profiltest.css')}}">
  <link rel="stylesheet" href="{{asset('css/nav.css')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="body-{{substr(strrchr(url()->current(),"/"),1)}}">
  <div id="burger">
    <div style="position: absolute;
        margin-top: 5%;
        width:100%;
        display: flex;
        justify-content: end;
        padding-right: 5%;">
      <button class="navbar-toggler collapsed burger-button-menu">
        <i class="fas fa-bars" style="color: #fee1e2;font-size: 5rem;"></i>
      </button>
    </div>
    <br>
    <br>
    <div style="display:flex;justify-content:center;">
      <div style="height:20vh">
        <a href="{{route('home.index')}}" class="navbar-logo-center"><img src="http://localhost:8000/images/bubbleteacutelogo.jpg" style="height:100%;border-radius:70%"/></a>
      </div>
    </div>
    <br>
    <br>
    <div style="display:flex;justify-content:center;align-items:center;height:20vh">
    @auth
    {{auth()->user()->firstname}}
    {{auth()->user()->lastname}}  
    <a href="{{route('users.index')}}" class="navbar-logo-center" style="display:flex;align-items:center;"><img src="http://localhost:8000/images/navs/profil.png" style="height:50%;"/></a>
    @endauth
      <a href="{{route('cart.showcart')}}" class="navbar-logo-center" style="display:flex;align-items:center;"><img src="http://localhost:8000/images/navs/cart.png" style="height:70%;"/></a>
    </div>
    <div style="display:flex;justify-content:center;align-items:center;height:20vh">
    @auth
      <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2 logout-em">Logout</a>
    @endauth
    @guest
    <a href="{{ route('login.show') }}" class="btn btn-outline-light me-2 login-em">Login</a>
    @endguest
    </div>
  </div>
  <div class="black-opacity">
  </div>
  <nav class="navbar navbar-light navbar-top" style="z-index: 10; position:relative;">
    <div class="navbar-top-second">
      <div class="navbar-div-logo-center-above">
        <div class="navbar-div-logo-center">
          <a href="/home" class="navbar-logo-center"><img src="http://localhost:8000/images/bubbleteacutelogo.jpg" style="height:100%"/></a>
        </div>
      </div>
      <div class="navbar-div-logo-left">
        <img class="navbar-logo-left" src="http://localhost:8000/images/navs/Raskrasil.png"/>
      </div>
      <div class="navbar-div-logo-right">
        <!-- Mettre le nom de l'user -->
        @auth
        {{auth()->user()->firstname}}
        {{auth()->user()->lastname}} 
        <a href="{{route('users.index')}}" class="navbar-logo-right" style="height:40%;"><img src="http://localhost:8000/images/navs/profil.png" style="height:100%;"/></a>
        @endauth
        <a href="{{route('cart.showcart')}}" class="navbar-logo-right"><img class="navbar-logo-right" src="http://localhost:8000/images/navs/cart.png" style="height:100%;"/></a>
        @auth
          <a href="{{ route('logout.perform') }}" class="btn btn-outline-light me-2 logout-em">Logout</a>
        @endauth
        @guest
          <a href="{{ route('login.show') }}" class="btn btn-outline-light me-2 login-em">Login</a>
        @endguest
        <button class="navbar-toggler collapsed burger-button">
          <i class="fas fa-bars" style="color: #e6989b;font-size: 2rem;"></i>
        </button>
      </div>
    </div>
  </nav>
<script src="{{ asset('js/navs.js')}}"></script>
