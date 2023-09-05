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
            <a class="btn btn-primary text-color mb-3" href="{{ route("Client.create") }}" role="button">Ajouter Client</a>
        <div class="table-container mb-5" style="width: 90%;">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nom et Prenom</th>
                        <th>Email</th>
                        <th>Tel</th>
                        <th>Identite</th>
                        <th>Num Permis</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        <tr>
                            <td><img class="rounded-circle" src="@if(!is_null($client->photo)){{ asset('images/'. $client->photo)}}@else {{ asset('images/default_avatar.png')}} @endif" width="50px" height="50px" alt="image"></td>
                            <td class="text-capitalize">{{ $client->nom_complet }}</td>
                            <td>{{ $client->email }}</td>
                            <td>{{ $client->tel }}</td>
                            <td>{{ $client->num_cin }}</td>
                            <td>{{ $client->num_permis }}</td>
                            <td class="actions">
                                <form action="{{ route('Client.destroy', $client->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')" ><span class="material-symbols-outlined">delete</span></button>
                                </form>
                                <a class="btn btn-outline-info mr-2 btn-sm" href="{{ route('Client.show', $client->id) }}"><span class="material-symbols-outlined">visibility</span></a>
                                <a class="btn btn-outline-warning btn-sm" href="{{ route('Client.edit', $client->id) }}"><span class="material-symbols-outlined">edit</span></a>
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
            $('#myTable').DataTable( {
                "columnDefs": [
                    { "width": "3%", "targets": 0 }
                ],
                "columns": [
                    { "orderable": false },
                    null,
                    null,
                    null,
                    null,
                    null,
                    null
                ]
                
            } );
        } );
    </script> 
@endpush