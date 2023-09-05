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
        <h3 class="display-2 mt-5 mb-5">Vehicules</h3>
        <a class="btn btn-primary text-color mb-3" href="{{ route("Vehicule.create") }}" role="button">Ajouter Vehicule</a>
        <div class="mt-3 search-container container-fluid d-flex justify-content-end">
            <form class="input-group search-form" id="search-form">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Model</label>
                </div>
                <input type="text" class="form-control" name="query" id="search-input" placeholder="Rechercher ...">
            </form>
        </div>
        <div class="table-container mb-5" style="width: 90%;">
            <div class="card-deck mt-5" id="card-container">
                    @foreach ($vehicules as $vehicule)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="@if(!is_null($vehicule->ImageVehiculePfp())) {{ asset("images/". $vehicule->ImageVehiculePfp()->url) }}
                                        @else{{ asset("images/default_vehicule.png")}} @endif" alt="Card image cap">
                                <div class="card-body w-100 text-center">
                                    <h5 class="card-title">{{ $vehicule->ModelVehicule->MarqueVehicule->marque . ' '. $vehicule->ModelVehicule->model}}</h5>
                                    <div class="d-flex justify-content-center">
                                        <p class="card-text lead m-0">{{ $vehicule->immatriculation_num }}|</p>
                                        <p class="card-text lead ar-size m-0" lang="ar">{{ $vehicule->immatriculation_lettre }}</p>
                                        <p class="card-text lead m-0">|{{ $vehicule->immatriculation_region}}</p>
                                    </div>
                                    <p class="card-text"><em>Couleur: </em><b>{{ $vehicule->CouleurVehicule->couleur }}</b></p>
                                </div>
                                <div class="card-footer d-flex justify-content-around">
                                        <form action="{{ route('Vehicule.destroy', $vehicule->id) }}" method="POST" style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')" ><span class="material-symbols-outlined">delete</span></button>
                                        </form>
                                        <a href="{{ route('Vehicule.show', $vehicule->id) }}"class="btn btn-outline-info p-2"><b>Afficher details</b></a>
                                        <a href="{{ route('Vehicule.edit', $vehicule->id) }}" class="btn btn-outline-warning btn-sm"><span class="material-symbols-outlined">edit</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
    $(document).ready(function() {
        $('#search-input').on('keyup', function() {
            // Get the value of the search input field
            var query = $(this).val();
            // Make the AJAX call
            $.ajax({
                type: 'GET',
                url: "/Search",
                data: {query: query},
                dataType: 'json',
                success: function(data) {
                  // If the AJAX call is successful, clear the card container and display the results
                  $('#card-container').empty();
                  $('#card-container').html(data);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                  // If the AJAX call fails, display an error message
                  alert('Error: ' + errorThrown);
                }
            });
        });
    });



    </script> 
@endpush