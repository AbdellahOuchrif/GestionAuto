@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('content')
    <section class="container-fluid d-flex flex-column align-items-center ">
      <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ URL::previous() }}" role="button">Retour</a>
      </div>
        <h3 class="display-2 mt-5 mb-5 ">Options Assurance</h3>
        <form class="form-inline mb-3" action="{{ route("OptionAssurance.store") }}" method="POST" id="form">
            @csrf
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Assurance</label>
                </div>
                <select class="custom-select" name="assurance_id" id="inputGroupSelect01" required>
                    <Option value="">Choisissez...</Option>
                    @foreach ($assurances as $assurance )
                    <Option value="{{ $assurance->id }}">{{ $assurance->type }}</Option>
                    @endforeach
                </select>
            </div>
            <label class="sr-only" for="designation">Option</label>
            <div class="d-flex flex-column">
              <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <div class="input-group-text">Option</div>
                </div>
                <input type="text" class="form-control" name="designation" id="SingleInputForm" required>
              </div>
              <div class="input-group">
                <small class="mb-1 mr-1" id="error-message">Error message</small>
              </div>
            </div>
            <label class="sr-only" for="details">Details</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Details</div>
              </div>
              <textarea class="form-control" name="details" id="details" cols="30" rows="2"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
          </form>
        <div class="table-container mb-5" style="width: 90%;">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Assurance</th>
                        <th>Option</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($options as $option)
                        <tr>
                            <td style="text-transform: uppercase;">{{ $option->Assurance->type }}</td>
                            <td style="text-transform: capitalize;">{{ $option->designation }}</td>
                            <td class="actions d-flex justify-content-end">
                                <form action="{{ route('OptionAssurance.destroy', $option->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#exampleModal" onclick='getTableId({{ $option->id }}, "{{ $option->assurance_id }}", "{{ $option->designation }}", "{{ $option->details }}")'><span class="material-symbols-outlined">edit</span></button>
                                
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier Option Assurance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body d-flex justify-content-center">
        <form class="form-inline mb-3" id="update-form" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="input-group mb-2 mr-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="assurance-update">Assurance</label>
                        </div>
                        <select class="custom-select" name="assurance_id" id="assurance-update" required>
                            <option value="" disabled>Choisissez...</option>
                            @foreach ($assurances as $assurance )
                            <Option value="{{ $assurance->id }}">{{ $assurance->type }}</Option>
                            @endforeach
                        </select>
                    </div>
                    <label class="sr-only" for="UpdateInput">Option</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Option</div>
                      </div>
                      <input type="text" class="form-control" name="designation" id="UpdateInput" required>
                    </div>
                    <div class="input-group">
                      <small class="mb-3" id="update-error">Error message</small>
                    </div>
                    <label class="sr-only" for="details-update">Details</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Details</div>
                      </div>
                      <textarea class="form-control" name="details" id="details-update" cols="30" rows="2"></textarea>
                    </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Modifier</button>
              </div>
            </form>
            </div>
        </div>
    </div>



@push('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
    <script src="{{ asset("js/SingleVerification.js") }}"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        
        //const UpdateForm = document.querySelector("#update-form");
        const UpdateAssurance = document.querySelector("#assurance-update");
        //const UpdateDesignation = document.querySelector("#designation-update");
        const UpdateDetails = document.querySelector("#details-update");
        
        function getTableId(id, assurance_id, designation, details) {
            let modifier_action = "{{route('OptionAssurance.update', '')}}"+"/"+id;
            UpdateForm.action = modifier_action;
            UpdateAssurance.value = assurance_id;
            UpdateInput.value = designation;
            UpdateDetails.value = details;
        }
        
    </script> 
@endpush

@endsection       