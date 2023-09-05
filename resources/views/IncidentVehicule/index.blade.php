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
        <h3 class="display-2 mt-5 mb-5">Incident Vehicule</h3>
            <a class="btn btn-primary text-color mb-3" role="button" data-toggle="modal" data-target=".bd-example-modal-lg">Ajouter Incident</a>
        <div class="table-container mb-5" style="width: 90%;">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Model</th>
                        <th>Immatriculation</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incidents as $incident)
                        <tr>
                            <td class="text-capitalize">{{ $incident->Vehicule->ModelVehicule->model }}</td>
                            <td><div class="d-flex"><span>{{ $incident->Vehicule->immatriculation_num }}|</span><span>{{ $incident->Vehicule->immatriculation_lettre }}|</span><span>{{ $incident->Vehicule->immatriculation_region }}</span></div></td>
                            <td>{{ $incident->date_incident }}</td>
                            <td class="actions">
                                <form action="{{ route('IncidentVehicule.destroy', $incident->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')" ><span class="material-symbols-outlined">delete</span></button>
                                </form>
                                <a class="btn btn-outline-info mr-2 btn-sm" href="{{ route('IncidentVehicule.show', $incident->id) }}"><span class="material-symbols-outlined">visibility</span></a>
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('IncidentVehicule.edit', $incident->id) }}"><span class="material-symbols-outlined">edit</span></a>
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
                <h4 class="modal-title" id="myLargeModalLabel">Est ce que c'est en relation avec une location ?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-around">
                <a class="btn btn-danger" href="{{ route("IncidentVehicule.create", ["param" => "Vehicule"]) }}" role="button">Non</a>
                <a class="btn btn-primary" href="{{ route("IncidentVehicule.create", ["param" => "Location"]) }}" role="button">Oui</a>
            </div>
        </div>
      </div>
    </div>
@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script> 
@endpush