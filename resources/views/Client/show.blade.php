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
        <h3 class="display-2 mt-5 mb-5">Client</h3>
        <div class="card">
            <img class="card-img-top mx-auto" src="@if(!is_null($client->photo)){{ asset('images/'. $client->photo)}}@else {{ asset('images/default_avatar.png')}} @endif">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $client->nom_complet }}</h5>
                <div class="row">
                    <div class="col-sm-2">
                        <span class="material-symbols-outlined">mail</span>
                    </div>
                    <div class="col-sm-10">
                        <p class="card-text"> {{ $client->email }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <span class="material-symbols-outlined">call</span>
                    </div>
                    <div class="col-sm-10">
                        <p class="card-text"> {{ $client->tel }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <span class="material-symbols-outlined">badge</span>
                    </div>
                    <div class="col-sm-10">
                        <p class="card-text"> {{ $client->num_cin }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <span class="material-symbols-outlined">directions_car</span>
                    </div>
                    <div class="col-sm-10">
                        <p class="card-text"> {{ $client->num_permis }}</p>
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