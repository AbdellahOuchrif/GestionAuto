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
        <h3 class="display-2 mt-5 mb-5 ">Model Vehicule</h3>
        <form class="form-inline mb-3" action="{{ route("ModelVehicule.store") }}" method="POST" id="form">
            @csrf
            <div class="input-group mb-2 mr-sm-2">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Marque</label>
                </div>
                <select class="custom-select" name="marque_id" id="inputGroupSelect01" required>
                    <Option value="">Choisissez...</Option>
                    @foreach ($marques as $marque )
                    <Option value="{{ $marque->id }}">{{ $marque->marque }}</Option>
                    @endforeach
                </select>
            </div>
            <div class="input-group">
                <small class="mb-1" id="error-select">Error message</small>
            </div>
            <label class="sr-only" for="model">Model</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Model</div>
              </div>
              <input type="text" class="form-control" name="model" id="model" required>
            </div>
            <div class="input-group">
                <small class="mb-1 mr-1" id="error-input">Error message</small>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
          </form>
        <div class="table-container mb-5" style="width: 90%;">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <th>Marque</th>
                        <th>Model</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($models as $model)
                        <tr>
                            <td style="text-transform: uppercase;">{{ $model->MarqueVehicule->marque }}</td>
                            <td style="text-transform: capitalize;">{{ $model->model }}</td>
                            <td class="actions d-flex justify-content-end">
                                <form action="{{ route('ModelVehicule.destroy', $model->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick="return confirm('En cliquant sur OK vous allez supprimer l\'enregistrement')"><span class="material-symbols-outlined">delete</span></button>
                                </form>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#exampleModal" onclick='getTableId({{ $model->id }}, "{{ $model->model }}", "{{ $model->marque_vehicule_id }}")'><span class="material-symbols-outlined">edit</span></button>
                                
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
                <h5 class="modal-title" id="exampleModalLabel">Modifier Model Vehicule</h5>
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
                          <label class="input-group-text" for="inputGroupSelect02">Marque</label>
                        </div>
                        <select class="custom-select" name="marque_id" id="inputGroupSelect02" required>
                            <option value="" disabled>Choisissez...</option>
                            @foreach ($marques as $marque )
                            <Option value="{{ $marque->id }}">{{ $marque->marque }}</Option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group">
                        <small class="mb-1" id="update-error-select">Error message</small>
                    </div>
                    <label class="sr-only" for="model">Model</label>
                    <div class="input-group mb-2 mr-sm-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Model</div>
                      </div>
                      <input type="text" class="form-control" name="model" id="model-update" required>
                    </div>
                    <div class="input-group">
                        <small class="mb-1" id="update-error-input">Error message</small>
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
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );

        const UpdateSelect = document.querySelector("#inputGroupSelect02");
        const UpdateForm = document.querySelector("#update-form");
        const UpdateInput = document.querySelector("#model-update");
        const UpdateSmall = document.getElementById('update-error-input');
        const UpdateSmallSelect = document.getElementById('update-error-select');
        UpdateForm.addEventListener('submit', e => {
            e.preventDefault();
            validateUpdate();
          });
        
        function getTableId(id, modelV, marque_id) {
            let modifier_action = "{{route('ModelVehicule.update', '')}}"+"/"+id;
            UpdateForm.action = modifier_action;
            UpdateSelect.value = marque_id;
            UpdateInput.value = modelV;
        }
        
        const validateUpdate = () => {
            let FLAG = true;
            const UpdateValue = UpdateInput.value?.trim() || '';
            const UpdateSelectValue = UpdateSelect.value?.trim() || '';
            if(UpdateValue === '' || UpdateValue === null) {
              UpdateSmall.innerText = "Ce champ est obligatoire";
              FLAG = false;
            } else if(UpdateValue.length < 2) {
              UpdateSmall.innerText = "Ce champ doit dépasser 1 caractère";
              UpdateSmall.style.display = "block";
              FLAG = false;
            }else {
              UpdateSmall.innerText = "";
              UpdateSmall.style.display = "none";
            }

            if(UpdateSelectValue === '' || UpdateSelectValue === null) {
              UpdateSmallSelect.innerText = "Ce champ est obligatoire";
              UpdateSmallSelect.style.display = "block";
              FLAG = false;
            }else {
              UpdateSmallSelect.innerText = "";
              UpdateSmallSelect.style.display = "none";
            }

            if(FLAG){
                UpdateForm.submit();
            }
        };

        const Select = document.querySelector("#inputGroupSelect01");
        const Form = document.querySelector("#form");
        const Input = document.querySelector("#model");
        const Small = document.getElementById('error-input');
        const SmallSelect = document.getElementById('error-select');
        Form.addEventListener('submit', e => {
            e.preventDefault();
            validateInputs();
          });
        
        const validateInputs = () => {
            let FLAG = true;
            const Value = Input.value?.trim() || '';
            const SelectValue = Select.value?.trim() || '';
            if(Value === '' || Value === null) {
              Small.innerText = "Ce champ est obligatoire";
              FLAG = false;
            } else if(Value.length < 2) {
              Small.innerText = "Ce champ doit dépasser 1 caractère";
              Small.style.display = "block";
              FLAG = false;
            }else {
              Small.innerText = "";
              Small.style.display = "none";
            }

            if(SelectValue === '' || SelectValue === null) {
              SmallSelect.innerText = "Ce champ est obligatoire";
              SmallSelect.style.display = "block";
              FLAG = false;
            }else {
              SmallSelect.innerText = "";
              SmallSelect.style.display = "none";
            }

            if(FLAG){
                Form.submit();
            }
        };
    </script> 
@endpush

@endsection       