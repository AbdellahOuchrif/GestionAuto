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
            <h3 class="display-2 mt-5 mb-5">Location</h3>
            <a class="btn btn-primary text-color mb-3" data-toggle="modal" data-target=".bd-example-modal-lg" role="button">Nouvelle Location</a>
        <div class="table-container mb-5" style="width: 90%;">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Vehicule</th>
                        <th>Date Depart</th>
                        <th>Date Retour</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($locations as $location)
                        <tr>
                            <td style="text-transform: capitalize;">{{ $location->Client->nom_complet }}</td>
                            <td style="text-transform: capitalize;">{{ $location->Vehicule->ModelVehicule->model}}</td>
                            <td style="text-transform: capitalize;">{{ $location->date_depart}}</td>
                            <td style="text-transform: capitalize;">{{ $location->date_retour}}</td>
                            <td class="actions d-flex justify-content-end">
                                {{-- @if (!($location->location_retour))
                                    <a href="{{ route('Location.createRetour', $location->id) }}">Retour</a>
                                @endif
                                 --}}
                                <a href="{{ route('Location.contrat', $location->id) }}" class="ml-2 mr-2">Imprimer</a>
                                <form action="{{ route('Location.destroy', $location->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')" ><span class="material-symbols-outlined">delete</span></button>
                                </form>
                                <!-- Button trigger modal -->
                                <a href="{{ route('Location.edit', $location->id) }}" class="btn btn-outline-warning btn-sm"><span class="material-symbols-outlined">edit</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Large Modal -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Est ce que c'est deja reserver ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-around">
                <a class="btn btn-danger" onclick="param('vehicules')" role="button"  data-toggle="modal" data-target=".modal-table-show">Non</a>
                <a class="btn btn-primary" onclick="param('reservations')" role="button"  data-toggle="modal" data-target=".modal-table-show">Oui</a>
            </div>
        </div>
      </div>
    </div>

    <!-- Large Modal -->
    <div class="modal fade bd-example-modal-lg modal-table-show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ModalTableShow">Choisir la ligne en question</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-table-box">
                    
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
    <script>
        
    </script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        function param(value){
            $(document).ready(function() {
                let query = value;
                $.ajax({
                    type: 'GET',
                    url: "/LocationTable",
                    data:{query, query},
                    success: function(data) {
                        $('#modal-table-box').empty();
                        $('#modal-table-box').html(data);
                        $('#ModalShowTable').DataTable();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                      // If the AJAX call fails, display an error message
                      alert('Error: ' + errorThrown);
                    }
                });
            });
        };

    </script> 
@endpush