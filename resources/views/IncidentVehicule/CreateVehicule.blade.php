@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection
@section('content')

<section class="container-fluid d-flex flex-column align-items-center">
    <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ route("IncidentVehicule.index") }}" role="button">Retour</a>
    </div>
    <h3 class="display-2 mt-5 mb-5">Formulaire Incident</h3>
    <form class="w-75 container-fluid" action="{{ route("IncidentVehicule.storeIncidentVehicule") }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-5" id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Vehicules
              </button>
            </h5>
          </div>
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body d-flex justify-content-center">
              <div class="table-container mb-3 mt-3" style="width: 90%;">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Model Vehicule</th>
                            <th>Immatriculation</th>
                            <th>Date debut</th>
                            <th>Date fin</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicules as $vehicule)
                            <tr>
                                <td style="text-transform: capitalize;">{{ $vehicule->ModelVehicule->model}}</td>
                                <td><div class="d-flex"><span>{{ $vehicule->immatriculation_num }}|</span><span>{{ $vehicule->immatriculation_lettre }}|</span><span>{{ $vehicule->immatriculation_region }}</span></div></td>
                                <td style="text-transform: capitalize;">{{ $vehicule->date_debut}}</td>
                                <td style="text-transform: capitalize;">{{ $vehicule->date_fin}}</td>
                                <td class="actions d-flex justify-content-end">
                                  <button type="button" class="btn btn-success rounded-circle" onclick="TableInfos('{{  $vehicule->ModelVehicule->model }}', '{{ $vehicule->immatriculation_num }}', '{{ $vehicule->immatriculation_lettre }}', '{{ $vehicule->immatriculation_region }}', '{{ $vehicule->id }}', '{{ $vehicule->model_id }}')"
                                    data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span class="material-symbols-outlined">add</span></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column align-items-center w-100">
        <div class="form-group row w-75">
          <label class="col-sm-3"><em><b>Vehicule</em></b></label>
          <input type="hidden" class="form-control" name="vehicule_id" id="vehicule_id">
          <input type="hidden" class="form-control" name="model_id" id="model_id">
          <div class="col-sm-3">
            <p>Model</p>
            <input type="text" class="form-control" name="model" id="model" disabled>
          </div>
          <div class="col-sm-2">
            <p>Immatriculation</p>
            <input type="text" class="form-control" name="immatriculation" id="immatriculation" disabled>
          </div>
        </div>
        <div class="form-group row w-75">
          <label class="col-sm-3" ><em><b>Date Incident</em></b></label>
          <div class="col-sm-9">
              <input type="date" class="form-control" name="date_incident" id="date_incident" required>
          </div>
        </div>
        <div class="form-group row w-75">
          <label class="col-sm-3"><em><b>Pieces</b></em></label>
          <div class="col-sm-3 mb-3">
            <button type="button" onclick="AddBP()" class="btn btn-info rounded-circle"><span class="material-symbols-outlined">add</span></button>
          </div>
        </div>
        <div class="box-pieces w-75 d-flex flex-column align-items-center mb-5">
          <div class="w-75 border-bottom border-info form-group">
            <div class="form-group row w-100">
              <label class="col-sm-2"><em><b>Piece</b></em></label>
              <div class="col-sm-7">
                <input type="text" class="form-control" name="piece[]" placeholder="Saisir ici ...">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group row w-75">
          <label class="col-sm-3"><em><b>Description</b></em></label>
          <div class="col-sm-9 mb-3">
            <textarea name="description" class="w-100" rows="5"></textarea>
          </div>
        </div>
        <div class="form-group row w-75 mt-3 mb-5">
          <div class="col d-flex justify-content-center">
              <button class="btn btn-secondary" type="reset">Annuler</button>
          </div>
          <div class="col d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">Valider</button>
          </div>
        </div>
      </div>
    </form>
</section>

@endsection

@push('scripts')
<script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script> 
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
    <script>
        const VehiculeIdInput = document.getElementById("vehicule_id");
        const ModelIdInput = document.getElementById("model_id");
        const ModelInput = document.getElementById("model");
        const ImmatriculationInput = document.getElementById("immatriculation");
        function TableInfos(model, immatriculation_num, immatriculation_lettre, immatriculation_region, vehicule_id, model_id){
            VehiculeIdInput.value = vehicule_id;
            ModelIdInput.value = model_id;
            ModelInput.value = model;
            ImmatriculationInput.value = immatriculation_num + '|' + immatriculation_lettre + '|' + immatriculation_region;
            
        }

        const BoxPiecesContent = `
        <div class="form-group row w-100">
            <label class="col-sm-2"><em><b>Piece</b></em></label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="piece[]" placeholder="Saisir ici ...">
            </div>
            <div class="col-sm-1">
              <button type="button" onclick="RemoveBP(this)" class="btn btn-outline-danger btn-sm">Supprimer</button>
            </div>
          </div>
          `;

        function AddBP() {
          const BoxPieces = document.querySelector(".box-pieces");
          const div = document.createElement("div");
          div.classList.add("border-bottom");
          div.classList.add("w-75");
          div.classList.add("form-group");
          div.classList.add("border-info");
          div.classList.add("row");
          div.innerHTML = BoxPiecesContent;
          BoxPieces.appendChild(div);
        }

        function RemoveBP(element) {
          const div = element.parentNode.parentNode.parentNode;
          div.remove();
        }
    </script>
@endpush