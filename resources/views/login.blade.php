@include('header')

<div class = "body_login">
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card emiliecard rounded-3 text-black" style="margin-top: 5% !important;">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="http://localhost:8000/images/logo_round.png"
                    style="width: 185px;" alt="logo">
                  <!-- <h4 class="mt-1 mb-5 pb-1">Bubble MyTea</h4> -->
                </div>

                  <!-- <p>Connexion</p> -->
                  <form method="post" action="">
                  @csrf
                  <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                  <div class="form-outline mb-4">
                    <input type="email" id="form2Example11" class="form-control"
                      name="email" required="required" autofocus>
                    <label class="form-label" for="form2Example11">E-mail</label>
                    @if ($errors->has('email'))
                      <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example22" class="form-control" name="password" value="{{ old('password') }}" required="required" />
                    <label class="form-label" for="form2Example22">Mot de Passe</label>
                    @if ($errors->has('password'))
                      <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                    @endif
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    @error('message')
                    <p>{{ $message }}</p>
                    @enderror
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Connexion</button>
                  </div>
                  </form>
                    <!-- <a href=""class="text-muted" href="#!">Forgot password?</a> -->

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2">Pas encore de compte ?</p>
                    <a href="/inscription">
                    <button type="button" class="btn btn-outline-danger">S'inscrire</button>
                    </a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6  ">
              <div class="text-white px-3 py-4 ">
                <img class = login_img src = "http://localhost:8000/images/cutie_freyja_logo.png">
                <!-- <h4 class="mb-4">We love Bubble tea</h4>
                <p class="small mb-0">Nous aimons les Bubble tea et ça c'est bien</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('footer')