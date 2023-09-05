@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection
@section('content')

<section class="container-fluid d-flex flex-column align-items-center">
    <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ route("Client.index") }}" role="button">Retour</a>
    </div>
    <h3 class="display-2 mt-5 mb-5">Formulaire Client</h3>
    <form  class="form-edit-width" action="{{ route("Client.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">person</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nom_complet" id="nom_complet" placeholder="Nom et Prenom" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><em><b>Date de naissance</b></em></label>
            <div class="col-sm-4">
                <input type="date" class="form-control" name="date_naissance" required>
            </div>
            <label class="col-sm-1 col-form-label"><em><b>Sexe</b></em></label>
            <div class="col-sm-4 d-flex justify-content-around">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="masculin" value="M" checked>
                    <label class="form-check-label" for="masculin">Masculin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexe" id="feminin" value="F">
                    <label class="form-check-label" for="feminin">Feminin</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><em><b>Lieu de naissance</b></em></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="lieu_naissance" placeholder="Lieu de naissance">
            </div>
            <label class="col-sm-2 col-form-label"><em><b>Nationalite</b></em></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="nationalite" placeholder="Nationalite">
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">mail</span>
            <div class="col-sm-9">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">call</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="tel" id="tel" placeholder="Numero de Telephone 1" required>
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">call</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="tel_2"  placeholder="Numero de Telephone 2">
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">flag</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="pays"  placeholder="Pays" required>
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">location_city</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ville"  placeholder="Ville" required>
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">home</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="adresse"  placeholder="Adresse" required>
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">badge</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="num_cin" id="identite" placeholder="Numero de CIN">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="cin_delivre" placeholder="Delivre le">
            </div>
            <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="cin_validite">
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">badge</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="num_passeport" placeholder="Numero de Passeport">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="passeport_delivre" placeholder="Delivre le">
            </div>
            <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="passeport_validite">
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">directions_car</span>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="num_permis" id="num_permis" placeholder="Numero de Permis" required>
            </div>
            <label class="col-sm-1 col-form-label"><em><b>Type</b></em></label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="type_permis" placeholder="Ex: B..." required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="permis_delivre" placeholder="Delivre le" required>
            </div>
            <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="permis_validite" required>
            </div>
        </div>
        <div class="form-group row">
            <span class="material-symbols-outlined col-sm-3 col-form-label">face</span>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="photo" id="photo" placeholder="Choisir photo client" readonly>
                <input type="file" class="d-none" id="photo-input" name="photo" accept=".jpg, .jpeg, .png">
              </div>
        </div>
        <div class="form-group row mt-4">
            <div class="col-sm-9 offset-sm-3">
                <button type="button" onclick="AddPj()" class="btn btn-outline-info btn-lg btn-block">Ajouter Piece Jointe</button>
            </div>
        </div>
        <div class="box-pj">
        </div>
        <div class="form-group row mt-3 mb-5">
            <div class="col">
                <button class="btn btn-secondary" type="reset">Annuler</button>
            </div>
            <div class="col d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </form>
</section>

@endsection

@push('scripts')
<script>
    function togglePj() {
        const form = document.querySelector('form');
        form.classList.toggle('pj-open');
    }
    const PJ=`
    <div class="form-group col-sm-9">
            <label>Piece Jointe</label>
            <input type="text" class="form-control" name="pj_nom[]" placeholder="Exemple: Cin, Passeport,..."required>
    </div>
    <div class="form-group col-sm-9">
            <input type="file" class="form-control-file" name="piece_jointe[]" accept=".jpg, .jpeg, .png .pdf" required>
    </div>
    <div class="col-sm-3 mt-2">
        <button type="button" onclick="RemovePj(this)" class="btn btn-outline-danger btn-sm">Supprimer</button>
    </div>
    `;
    function AddPj() {
    const boxPj = document.querySelector(".box-pj");
    const div = document.createElement("div");
    div.classList.add("row");
    div.innerHTML = PJ;
    boxPj.appendChild(div);
    togglePj();
}

function RemovePj(element) {
    const div = element.parentNode.parentNode;
    div.remove();
}

// Get the input elements
const photoInput = document.getElementById('photo-input');
  const photoTextInput = document.getElementById('photo');

  // Add a click event listener to the text input
  photoTextInput.addEventListener('click', function() {
    // Trigger the file input click event
    photoInput.click();
  });

  // Add a change event listener to the file input
  photoInput.addEventListener('change', function() {
    // Get the selected file name and display it in the text input
    const fileName = photoInput.value.split('\\').pop();
    photoTextInput.value = fileName;
  });


</script>
@endpush