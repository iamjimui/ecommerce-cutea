@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-warning" role="alert">
        <ul class="list-unstyled mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-warning" role="alert">
                <i class="fa fa-check"></i>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-warning" role="alert">
            <i class="fa fa-check"></i>
            {{ $data }}
        </div>
    @endif
@endif

<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style ="z-index :1;">
      <div class="list-group list-group-flush mx-3 mt-4">

        <a href="{{route('users.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-users fa-fw me-3"></i><span>Profil</span></a>                   
        <a href="{{route('commandes.detail')}}" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-chart-bar fa-fw me-3"></i><span>Commandes</span></a>
        <a href="{{route('users.updatePasswordIndex')}}" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fa-solid fa-unlock fa-fw me-3"></i><span>Changer mdp</span></a><span>changement de mot de passe</span></a>
        <!-- <button id = "btn2"> Commandes <button> --> 
      </div>

      <div class="list-group list-group-flush mt-auto" style ="position : absolute; bottom : 0; width : 100%; margin-left: 0;" >
      <a href="{{ route('logout.perform') }}" class="list-group-item list-group-item-action py-2 ripple logout" >
      <i class="fas fa-sign-out-alt fa-fw me-3"></i><span>Se déconnecter</span>
      </a>
      </div>   
  </nav>
  <!-- Sidebar -->


  <!-- Navbar -->
 </div>
    <!-- Container wrapper -->
  </nav> 
  <!-- Navbar -->
</header>
<!--Main Navigation-->
<main style="margin-top: 58px;">
<div class="container pt-4"></div>
  <form method ="post" action="{{route('users.updatePassword',auth()->user()->id)}}" class="profilsideform">
  @method('patch')
  @csrf
  <div class="form-outline mb-4">
    <input  name="newpassword" type="password" id="newpassword" class="form-control" />
    <label for ="newpassword" class="form-label">Nouveau mot de passe</label>
  </div>
  <div class="form-edit-profil">
    <button  type="submit" class="btn btn-danger btn-floating">
    <i class="fas fa-magic"></i>
    <p style="color:black,!important"> EDITER MOT DE PASSE</p>
  </div>
  </form>
</main>
<!--Main layout-->

  <!-- <div class="black-opacity">
  </div>
  <div class="bubblemyteaintro">
    <a href="/home"><img class="bubbleteacutelogo" src="http://localhost:8000/images/bubbleteacutelogo.jpeg"/></a>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script> -->


