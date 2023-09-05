@php
    use Illuminate\Support\Facades\Blade;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    @yield('css')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex">
        <div class="container-fluid mr-lg-5 ml-lg-5 mr-md-4 ml-md-4">
            <a class="navbar-brand" href="{{ route('home') }}">GAUTO</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                    @if(!auth()->user()->isSousAdmin())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Parametrage
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('Utilisateur.index') }}">Utilisateur</a>
                                    <a class="dropdown-item" href="{{ route('Client.index') }}">Client</a>
                                    <a class="dropdown-item" href="{{ route('Vehicule.index') }}">Vehicule</a>
                                    <a class="dropdown-item" href="{{ route('Assurance.index') }}">Assurance</a>
                                    <a class="dropdown-item" href="{{ route('OptionAssurance.index') }}">Option Assurance</a>
                                    <a class="dropdown-item" href="{{ route('Organisation.index') }}">Organisme</a>
                                    <a class="dropdown-item" href="{{ route('CouleurVehicule.index') }}">Couleur Vehicule</a>
                                    <a class="dropdown-item" href="{{ route('TransmissionVehicule.index') }}">Transmission Vehicule</a>
                                    <a class="dropdown-item" href="{{ route('MarqueVehicule.index') }}">Marque Vehicule</a>
                                    <a class="dropdown-item" href="{{ route('ModelVehicule.index') }}">Model Vehicule</a>
                                    <a class="dropdown-item" href="{{ route('TypeVehicule.index') }}">Type Vehicule</a>
                                    <a class="dropdown-item" href="{{ route('TypeEntretien.index') }}">Type Entretien</a>
                                    <a class="dropdown-item" href="{{ route('Etat.index') }}">Etat Reservation</a>
                                    <a class="dropdown-item" href="{{ route('Document.index') }}">Documents</a>
                                    <a class="dropdown-item" href="{{ route('ModePaiement.index') }}">Mode Paiement</a>
                                    <a class="dropdown-item" href="{{ route('PieceVehicule.index') }}">Piece Vehicule</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Traitement
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{ route('Reservation.index') }}">Reservation</a>
                                    <a class="dropdown-item" href="{{ route('Location.index') }}">Location</a>
                                    <a class="dropdown-item" href="{{ route('IncidentVehicule.index') }}">Incident Vehicule</a>
                                    
                            </div>
                        </li>
                    @endif
                        <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-link nav-link">{{ __('Logout') }}</button>
                                </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    {{-- dd(Auth::user()->role->actions) --}}

    @if(session('success'))
        <div class="alert alert-success">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if(session('danger'))
        <div class="alert alert-danger">
            <strong>{{ session('danger') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div>
            @foreach ( $errors->all() as $error)
                <div class="alert alert-danger">
                    <strong>{{ $error }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endforeach
        </div>
    @endif
    
  @yield('content')
        <!-- Removed this part and used the jQuery CDN minified instead of Slim
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    </script>
    @stack('scripts')
</body>
</html>
