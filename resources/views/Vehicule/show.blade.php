@extends('layouts.app')

@section('css')  
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('content')
    <section class="container-fluid d-flex flex-column align-items-center">
        <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
            <a class="btn btn-success text-color mb-3" href="{{ URL::previous() }}" role="button">Retour</a>
        </div>
        <h3 class="display-2 mt-3 mb-5">{{ $vehicule->ModelVehicule->MarqueVehicule->marque . ' '. $vehicule->ModelVehicule->model }}</h3>
        <div class="h-100" style="width: 90%;">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 pt-5">
                    <div id="carouselExampleControls" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner" style=" width:100%; height: 400px !important;">
                            @if(!is_null($vehicule->ImageVehicules->pluck('url')->first()))
                                @foreach ($vehicule->ImageVehicules as $image)
                                    @if($loop->first)
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset('images/'. $image->url) }}">
                                        </div>
                                    @else
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="{{ asset('images/'. $image->url) }}">
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('images/default_vehicule.png')}}" alt="First slide">
                                </div>
                            @endif
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="cell over">
                        <p class="head">
                            Information Vehicule
                        </p>
                        <ul class="params my-panel">
                            <li class="row border-bottom">
                                <p class="col-6 text-right param">Immatriculation</p>
                                <p class="value d-flex col-6"><span>{{ $vehicule->immatriculation_num }}|</span><span>{{ $vehicule->immatriculation_lettre }}|</span><span>{{ $vehicule->immatriculation_region}}</span></p>
                            </li>
                            <li class="row border-bottom">
                                <p class="col-6 text-right param">Couleur</p>
                                <p class="col-6 value">{{ $vehicule->CouleurVehicule->couleur }}</p>
                            </li>
                            <li class="row border-bottom">
                                <p class="col-6 text-right param">Etat Vehicule</p>
                                <p class="col-6 value">{{ $vehicule->Etat->designation }}</p>
                            </li>
                            <li class="row border-bottom">
                                <p class="col-6 text-right param">Type Vehicule</p>
                                <p class="col-6 value">{{ $vehicule->TypeVehicule->type }}</p>
                            </li>
                            <li class="row border-bottom">
                                <p class="col-6 text-right param">Date d'acquisition</p>
                                <p class="col-6 value">{{ $vehicule->date_acquisition }}</p>
                            </li>
                            <li class="row border-bottom">
                                <p class="col-6 text-right param">Nombre de place</p>
                                <p class="col-6 value">{{ $vehicule->nbr_place }}</p>
                            </li>
                            <li class="row border-bottom">
                                <p class="col-6 text-right param">Date disponibilite</p>
                                <p class="col-6 value">{{ $vehicule->date_disponibilite }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
    //
    </script> 
@endpush