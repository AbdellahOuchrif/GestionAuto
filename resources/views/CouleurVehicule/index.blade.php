@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('content')
    <section class="container-fluid d-flex flex-column align-items-center form-verification">
        <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
            <a class="btn btn-success text-color mb-3" href="{{ URL::previous() }}" role="button">Retour</a>
        </div>
            <h3 class="display-2 mt-5 mb-5">Couleur Vehicule</h3>
            <form class="form-inline" action="{{ route("CouleurVehicule.store") }}" id="form" method="POST">
                @csrf
                <label class="sr-only" for="couleur"></label>
                <div class="input-group mb-2 mr-sm-2 verif-input">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="InputLabel">Couleur</div>
                  </div>
                  <input type="text" class="form-control" name="couleur" id="SingleInputForm" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
              </form>
              <small class="mb-3" id="error-message">Error message</small>
        <div class="table-container mb-5" style="width: 90%;">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Couleur</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($couleurs as $couleur)
                        <tr>
                            <td style="text-transform: uppercase;">{{ $couleur->couleur }}</td>
                            <td class="actions d-flex justify-content-end">
                                <form action="{{ route('CouleurVehicule.destroy', $couleur->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')" ><span class="material-symbols-outlined">delete</span></button>
                                </form>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="getTableId({{ $couleur->id }}, '{{ $couleur->couleur }}')"><span class="material-symbols-outlined">edit</span></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

  
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Couleur Vehicule</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body d-flex justify-content-center">
            <form class="form-inline mb-3 mt-3 d-flex justify-content-center" method="POST" id="update-form">
                    @csrf
                    @method("PATCH")
                    <label class="sr-only" for="couleur">Couleur</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Couleur</div>
                      </div>
                      <input type="text" class="form-control" name="couleur" id="UpdateInput" required>
                    </div>
                    <div class="input-group">
                        <small class="mb-3" id="update-error">Error message</small>
                    </div>
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </form>
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
    <script src="{{ asset("js/SingleVerification.js") }}"></script>
    <script>
        function getTableId(id, couleurV) {
            //let modifier_couleur_form = document.querySelector("#update-form");
            //let couleur = document.querySelector("#UpdateInput");
            let modifier_action = "{{route('CouleurVehicule.update', '')}}"+"/"+id;
            UpdateForm.action = modifier_action;
            UpdateInput.value = couleurV;
        }
    </script> 
@endpush