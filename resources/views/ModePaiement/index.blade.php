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
            <h3 class="display-2 mt-5 mb-5">Mode Paiement</h3>
            <form class="form-inline" action="{{ route("ModePaiement.store") }}" method="POST" id="form">
                @csrf
                <label class="sr-only" for="designation"></label>
                <div class="input-group mb-2 mr-sm-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text">Mode</div>
                  </div>
                  <input type="text" class="form-control" name="mode_paiement" id="SingleInputForm" required>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
              </form>
              <small class="mb-3 form-verification" id="error-message">Error message</small>
        <div class="table-container mb-5" style="width: 90%;">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Mode</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mode_paiements as $mode_paiement)
                        <tr>
                            <td style="text-transform: uppercase;">{{ $mode_paiement->mode }}</td>
                            <td class="actions d-flex justify-content-end">
                                <form action="{{ route('ModePaiement.destroy', $mode_paiement->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')" ><span class="material-symbols-outlined">delete</span></button>
                                </form>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#exampleModal" onclick="getTableId({{ $mode_paiement->id }}, '{{ $mode_paiement->mode }}')"><span class="material-symbols-outlined">edit</span></button>
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier Mode Paiement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body d-flex justify-content-center">
                <form class="form-inline mb-3 mt-3 d-flex justify-content-center" method="POST" id="update-form">
                    @csrf
                    @method("PATCH")
                    <label class="sr-only" for="mode_paiement">Mode</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Mode</div>
                      </div>
                      <input type="text" class="form-control" name="mode_paiement" id="UpdateInput" required>
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
    <script src="{{ asset("js/SingleVerification.js") }}"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        function getTableId(id, mode_paiement) {
            //let modifier_mode_form = document.querySelector("#modifier_mode_form");
            //let mode = document.querySelector("#mode_paiement");
            let modifier_action = "{{route('ModePaiement.update', '')}}"+"/"+id;
            UpdateForm.action = modifier_action;
            UpdateInput.value = mode_paiement;
        }
    </script> 
@endpush