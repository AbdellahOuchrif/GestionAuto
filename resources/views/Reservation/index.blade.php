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
            <h3 class="display-2 mt-5 mb-5">Reservation</h3>
            <a class="btn btn-primary text-color mb-3" href="{{ route("Reservation.create") }}" role="button">Nouvelle Reservation</a>
        <div class="table-container mb-5" style="width: 90%;">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th>Vehicule</th>
                        <th>Date debut</th>
                        <th>Date fin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr>
                            <td style="text-transform: capitalize;"><a href="{{ route("Client.show", $reservation->client_id) }}">{{ $reservation->Client->nom_complet }}</a></td>
                            <td style="text-transform: capitalize;"><a href="{{ route("Vehicule.show", $reservation->vehicule_id) }}">{{ $reservation->Vehicule->ModelVehicule->model}}</a></td>
                            <td style="text-transform: capitalize;">{{ $reservation->date_debut}}</td>
                            <td style="text-transform: capitalize;">{{ $reservation->date_fin}}</td>
                            <td class="actions d-flex justify-content-end">
                                <form action="{{ route('Reservation.destroy', $reservation->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')" ><span class="material-symbols-outlined">delete</span></button>
                                </form>
                                <!-- Button trigger modal -->
                                <a href="{{ route('Reservation.edit', $reservation->id) }}" class="btn btn-outline-warning btn-sm"><span class="material-symbols-outlined">edit</span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

  
@endsection

@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

    </script> 
@endpush