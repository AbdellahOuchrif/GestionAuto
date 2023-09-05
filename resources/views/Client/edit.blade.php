@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection
@section('content')

<section class="container-fluid d-flex flex-column align-items-center">
    <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ URL::previous() }}" role="button">Retour</a>
    </div>
    <h3 class="display-2 mt-5 mb-5">Modifier Client</h3>
    @foreach($clients as $client)
        <form class="form-edit-width" action="{{ route("Client.update", $client->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="form-group row d-flex justify-content-center">
                <div>
                    <input type="hidden" name="old_photo" value="{{ $client->photo }}">
                    <input class="form-control-file" onchange="loadFile(event)" id="hidden_upload" type="file" name="photo" accept=".jpg, .jpeg, .png" hidden/>
                    <img class="rounded-circle clickable-image" id="output" onclick="hiddenUpload()" src="@if(!is_null($client->photo)){{ asset('images/'. $client->photo)}}@else {{ asset('images/default_avatar.png')}} @endif" 
                        width="120px" height="120px" alt="image" data-toggle="tooltip" data-placement="top" title="Modifier photo">
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">person</span>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nom_complet" id="nom_complet" placeholder="Nom et Prenom"  value="{{ $client->nom_complet }}" data-toggle="tooltip" data-placement="top" title="Nom et Prenom" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><em><b>Date de naissance</b></em></label>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="date_naissance" value="{{ $client->date_naissance }}" required>
                </div>
                <label class="col-sm-1 col-form-label"><em><b>Sexe</b></em></label>
                <div class="col-sm-4 d-flex justify-content-around">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="masculin" value="M" @if ($client->sexe == "M") checked @endif>
                        <label class="form-check-label" for="masculin">Masculin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexe" id="feminin" value="F" @if ($client->sexe == "F") checked @endif >
                        <label class="form-check-label" for="feminin">Feminin</label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><em><b>Lieu de naissance</b></em></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="lieu_naissance" value="{{ $client->lieu_naissance }}" placeholder="Lieu de naissance">
                </div>
                <label class="col-sm-2 col-form-label"><em><b>Nationalite</b></em></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="nationalite" value="{{ $client->nationalite }}" placeholder="Nationalite">
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">mail</span>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $client->email }}"  data-toggle="tooltip" data-placement="top" title="Email" required>
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">call</span>
                <div class="col-sm-9">
                    <input type="tel" class="form-control" name="tel" id="tel" placeholder="Numero de Telephone" value="{{ $client->tel }}" data-toggle="tooltip" data-placement="top" title="Numero de Telephone" required>
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">call</span>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tel_2"  placeholder="Numero de Telephone 2" value="{{ $client->tel_2 }}">
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">flag</span>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pays"  placeholder="Pays" value="{{ $client->pays }}" required>
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">location_city</span>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ville"  placeholder="Ville" value="{{ $client->ville }}" required>
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">home</span>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="adresse"  placeholder="Adresse" value="{{ $client->adresse }}" required>
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">badge</span>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="num_cin" value="{{ $client->num_cin }}" id="identite" placeholder="Numero de CIN">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="cin_delivre"value="{{ $client->cin_delivre }}"  placeholder="Delivre le">
                </div>
                <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" value="{{ $client->cin_validite }}" name="cin_validite">
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">badge</span>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="num_passeport" value="{{ $client->num_passeport }}" placeholder="Numero de Passeport">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="passeport_delivre" value="{{ $client->passeport_delivre }}"  placeholder="Delivre le">
                </div>
                <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="passeport_validite" value="{{ $client->passeport_validite }}">
                </div>
            </div>
            <div class="form-group row">
                <span class="material-symbols-outlined col-sm-3 col-form-label">directions_car</span>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="num_permis" id="num_permis" value="{{ $client->num_permis }}" placeholder="Numero de Permis" required>
                </div>
                <label class="col-sm-1 col-form-label"><em><b>Type</b></em></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="type_permis" value="{{ $client->type_permis }}"  placeholder="Ex: B..." required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="permis_delivre" value="{{ $client->permis_delivre }}" placeholder="Delivre le">
                </div>
                <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="permis_validite" value="{{ $client->permis_validite }}">
                </div>
            </div>
    @endforeach
    @php
        $i = 0;
    @endphp
    @foreach($piece_jointes as $piece_jointe)
            <div id="pj_row{{ $i }}">
                <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><em><b>{{ $piece_jointe->pj_nom }}</b></em></label>
                        <div class="col-sm-9">
                            <a href="{{ asset('images/'. $piece_jointe->pj_url) }}" target="_blank" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="{{ $piece_jointe->pj_nom }}"><b>Voir Contenu</b></a>
                            <button type="button" class="btn btn-outline-danger" onclick="getDeletedId({{ $i }}, {{ $piece_jointe->id }})">Supprimer Piece Jointe</button>
                            <input type="hidden" id="pj_delete{{ $i }}" name="pj_delete[]"> 
                        </div> 
                </div>
            </div>
        @php
            $i++;
        @endphp
    @endforeach
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
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </div>
            </div>
        </form>
</section>

@endsection

@push('scripts')
<script>
    var loadFile = function(event) {
              var image = document.getElementById('output');
              image.src=URL.createObjectURL(event.target.files[0]);
          };
    function getDeletedId(counter, id){
        if(confirm('En cliquant sur OK vous allez supprimer definitivement la piece jointe')){
            document.querySelector('#pj_delete'+ counter).value = id;
            document.querySelector('#pj_row'+ counter).classList.add('d-none');
        }
    }

    function hiddenUpload(){
            document.querySelector("#hidden_upload").click();
        }

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
</script>
@endpush