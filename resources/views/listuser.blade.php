@include('header')

<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white" style ="z-index :1;">
      <div class="list-group list-group-flush mx-3 mt-4">

        <a href="{{route('users.index')}}" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-users fa-fw me-3"></i><span>Profil</span></a>                   
        <a href="{{route('commandes.detail')}}" class="list-group-item list-group-item-action py-2 ripple"><i
            class="fas fa-chart-bar fa-fw me-3"></i><span>Commandes</span></a>
        @if(auth()->user()->role_id > 0)
        <a href="{{route('users.updatePasswordIndex')}}" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fa-solid fa-users fa-fw me-3"></i><span>Liste utilisateurs</span></a>
        @endif
        <a href="{{route('users.updatePasswordIndex')}}" class="list-group-item list-group-item-action py-2 ripple">
        <i class="fa-solid fa-unlock fa-fw me-3"></i><span>Changer mdp</span></a>
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

<!--Main layout-->
<main style="margin-top: 58px;">
<div style="display:flex;justify-content:center;flex-direction:column;margin-bottom:10rem;">
<h2 style="text-align:center;">Liste des utilisateurs</h2>
<table class ='form-table'>
    <tr>
        <th>id</th>
        <th>lastname</th>
        <th>firstname</th>
        <th>email</th>
        <th>rôle</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->lastname}}</td>
        <td>{{$user->firstname}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->role_id}}</td>
    </tr>
    @endforeach
</table>
</div>

    



</main>
<!--Main layout-->

  <!-- <div class="black-opacity">
  </div>
  <div class="bubblemyteaintro">
    <a href="/home"><img class="bubbleteacutelogo" src="http://localhost:8000/images/bubbleteacutelogo.jpeg"/></a>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.js"></script> -->


@include('footer')