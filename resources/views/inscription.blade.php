@include('header')

<section class="h-100 bg-dark">
    <form method="post" action="{{ route('register.perform') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <input type="hidden" name="role_id" value="0" />
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card emiliecard card-registration my-4">
                    <div class="row g-0">
                        <div class="col-xl-6 d-none d-xl-block">
                            <img src="images/bubbletea/bubbletea_instagram.jpg" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                        </div>
                        <div class="col-xl-6">
                            <div class="card-body p-md-5 text-black">
                                <center>
                                <h3 class="mb-5 text-uppercase"> Formulaire d'inscription </h3>
                                </center>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1m" class="form-control form-control-lg" name="firstname" value="{{ old('firstname') }}" required="required" autofocus />
                                            <label class="form-label" for="form3Example1m">Prénom</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1n" class="form-control form-control-lg" name="lastname" value="{{ old('lastname') }}" required="required" autofocus  />
                                            <label class="form-label" for="form3Example1n">Nom</label>
                                        </div>
                                    </div>
                                </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
                                        <label class="form-label" for="form3Example90">E-mail</label>
                                        @if ($errors->has('email'))
                                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example99" class="form-control form-control-lg" name="password" value="{{ old('password') }}" placeholder="Password" required="required" />
                                        <label class="form-label" for="form3Example99">Mot de passe</label>
                                        @if ($errors->has('password'))
                                        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example97" class="form-control form-control-lg" name="password_confirmation" value="{{ old('password_confirmation') }}" required="required" />
                                        <label class="form-label" for="form3Example97">Confirmer mot de passe</label>
                                        @if ($errors->has('password_confirmation'))
                                        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-end pt-3">
                                        <button type="submit" class="btn btn-warning btn-lg ms-2">S'inscrire</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@include('footer')