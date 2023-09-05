@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection
@section('content')

<section class="container-fluid d-flex flex-column align-items-center">
    <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ URL::previous() }}" role="button">Retour</a>
    </div>
    <h3 class="display-2 mt-5 mb-5">Modifier Reservation</h3>
    <form  class="form-edit-width" action="{{ route("Reservation.update", $reservation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Client</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="client_id" required>
                    @foreach ($clients as $client)
                        <option @if($reservation->client_id == $client->id) selected @endif value="{{ $client->id }}">{{ $client->nom_complet }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Vehicule</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="vehicule_id" required>
                    @foreach ($vehicules as $vehicule)
                        <option @if($reservation->vehicule_id == $vehicule->id) selected @endif value="{{ $vehicule->id }}">{{ $vehicule->ModelVehicule->model }} ==> <span>{{ $vehicule->immatriculation_num }}|{{ $vehicule->immatriculation_lettre }}|{{ $vehicule->immatriculation_region }}</span></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="date_debut"><em><b>Date debut</em></b></label>
            <div class="col-sm-9">
                <input type="datetime-local" class="form-control" name="date_debut" id="date_debut" value="{{ $reservation->date_debut }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="date_fin"><em><b>Date fin</em></b></label>
            <div class="col-sm-9">
                <input type="datetime-local" class="form-control" name="date_fin" id="date_fin" value="{{ $reservation->date_fin }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="tarif"><em><b>Tarif</em></b></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="tarif" step="0.01" id="tarif" value="{{ $reservation->tarif }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Avance</b></em></label>
            <div class="col-sm-9 d-flex justify-content-around">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="avance" id="avance_oui" value="oui" @if(!is_null($reservation->mode_paiement_id)) checked @endif>
                    <label class="form-check-label" for="avance_oui">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="avance" id="avance_non" value="non" @if(is_null($reservation->mode_paiement_id)) checked @endif>
                    <label class="form-check-label" for="avance_non">Non</label>
                </div>
            </div>
        </div>
        <div id="avance_div" @if(!is_null($reservation->mode_paiement_id)) style="display: block;" @else style="display: none;" @endif>
            <div class="form-group row">
                <label for="mode_paiement_id" class="col-sm-3"><em><b>Mode Paiement</b></em></label>
                <div class="col-sm-4">
                    <select class="form-control" name="mode_paiement_id" id="mode_paiement_id">
                        <option value="">Choisir...</option>
                        @foreach ($mode_paiements as $mode_paiement)
                            <option @if($reservation->mode_paiement_id == $mode_paiement->id) selected @endif value="{{ $mode_paiement->id }}">{{ $mode_paiement->mode }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="montant_total" class="col-sm-2"><em><b>Montant</b></em></label>
                <div class="col-sm-3">
                    <input class="form-control" type ="text" name="avance" value="{{ $reservation->avance }}" placeholder="Montant en DH">
                </div>
            </div>
            <div class="form-group row">
                <label for="organisation_id" class="col-sm-3"><em><b>Organisation</b></em></label>
                <div class="col-sm-7 d-flex align-items-center">
                    <select class="form-control" name="organisation_id" id="organisation_id">
                        <option value="">Choisir...</option>
                        @foreach ($organisations as $organisation)
                            <option @if($reservation->organisation_id == $organisation->id) selected @endif value="{{ $organisation->id }}">{{ $organisation->organisation }}</option>
                        @endforeach
                    </select>
                    <sup style="color:red;" class="ml-3">optionnel</sup>
                </div>
            </div>
            <div class="form-group row">
                <label for="reference" class="col-sm-3"><em><b>Reference</b></em></label>
                <div class="col-sm-7 d-flex align-items-center">
                    <input type="text" class="form-control" name="reference" value="{{ $reservation->reference }}" id="reference" placeholder="Ex: Numero de cheque">
                    <sup style="color:red;" class="ml-3">optionnel</sup>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="description"><em><b>Description</em></b></label>
            <div class="col-sm-9">
                <textarea name="description" class="form-control" id="description" rows="3">{{ $reservation->description }} </textarea>
            </div>
        </div>
        @if (count($piece_jointes) > 0)
            <div class="d-flex justify-content-center mb-3">
                <h5>Piece Jointe Vehicule</h5>
            </div>
        @endif
        @php
            $i = 0;
        @endphp
        @foreach($piece_jointes as $piece_jointe)
                <div id="pj_row{{ $i }}">
                    <div class="form-group row">
                            <label class="col-sm-3 col-form-label"><em><b>{{ $piece_jointe->pj_nom }}</b></em></label>
                            <div class="col-sm-9">
                                <a href="{{ asset('images/'. $piece_jointe->pj_url) }}" target="_blank" class="btn btn-outline-info" data-toggle="tooltip" data-placement="top" title="{{ $piece_jointe->pj_nom }}"><b>Voir Contenu</b></a>
                                <button type="button" class="btn btn-outline-danger" onclick="getDeletedIdPj({{ $i }}, {{ $piece_jointe->id }})">Supprimer Piece Jointe</button>
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
                <button type="submit" class="btn btn-primary">Valider</button>
            </div>
        </div>
    </form>
</section>

@endsection

@push('scripts')
<script>
    function getDeletedIdPj(counter, id){
        if(confirm('En cliquant sur OK vous allez supprimer definitivement la piece jointe')){
            document.querySelector('#pj_delete'+ counter).value = id;
            document.querySelector('#pj_row'+ counter).classList.add('d-none');
        }
    }
    
    const PJ=`
    <div class="form-group col-sm-9 mt-3">
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
        div.classList.add("border-bottom");
        div.classList.add("border-info");
        div.classList.add("row");
        div.innerHTML = PJ;
        boxPj.appendChild(div);
    }

    function RemovePj(element) {
        const div = element.parentNode.parentNode;
        div.remove();
    }
    // Get a reference to the radio buttons and the div
    const avanceOui = document.getElementById('avance_oui');
    const avanceNon = document.getElementById('avance_non');
    const avanceDiv = document.getElementById('avance_div');
    // Add an event listener to the radio buttons
    avanceOui.addEventListener('change', () => {
        // Show the div when "Oui" is selected
        avanceDiv.style.display = 'block';
        
        // Add the "required" attribute to the inputs and select inside the div
        avanceDiv.querySelectorAll('input, select').forEach((input) => {
            input.setAttribute('required', true);
        });
    });
    avanceNon.addEventListener('change', () => {
        // Hide the div and clear its input values when "Non" is selected
        avanceDiv.style.display = 'none';
        avanceDiv.querySelectorAll('input, select').forEach((input) => {
            input.value = '';
            input.removeAttribute('required');
        });
    });
</script>
@endpush