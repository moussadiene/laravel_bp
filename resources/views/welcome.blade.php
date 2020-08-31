<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        <div id="app">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="">Logo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/entreprise">Entreprise </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" to="/service">Service </router-link>
                    </li>

                  </ul>
                  <span class="navbar-text">
                    Navbar
                  </span>
                </div>
              </nav>
              <router-view></router-view>
            {{-- <div class="col-md-12 mt-5">
                <div class="row">
                    <div class="col-3">
                        <div class="card">
                            <div class="card-body row">
                                <img src="{{ asset('image/Profil.jpg') }}" class="img-responsive rounded-circle col-lg-4" alt="Profil">
                                <div class="col-lg-8">
                                  <h6 class="card-title">Moussa DIENE</h6>
                                  <p class="card-text"><i> Responsable</i>.</p>
                                    <a href="https://github.com/moussadiene" class="btn btn-dark btn-block"  target="_blank">profil</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <router-view></router-view>
                    </div>
                </div> --}}
                <!--example-component></!--example-component-->

            </div>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
