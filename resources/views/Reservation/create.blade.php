@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection
@section('content')



<section class="container-fluid d-flex flex-column align-items-center">
    <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ URL::previous() }}" role="button">Retour</a>
    </div>
    <h3 class="display-2 mt-5 mb-5">Formulaire Reservation</h3>
    <form  class="form-edit-width" action="{{ route("Reservation.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Client</b></em></label>
            <div class="col-sm-6">
                <select class="form-control" name="client_id" id="ClientSelect" required>
                    <option value="" disabled selected>Choisir...</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nom_complet }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <a class="btn btn-info" role="button"  data-toggle="modal" data-target=".modal-client-form">Nouveau Client</a>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Vehicule</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="vehicule_id" required>
                    <option value="" disabled selected>Choisir...</option>
                    @foreach ($vehicules as $vehicule)
                        <option class="remove-hover-color" @if($vehicule->Etat->designation != "Disponible") style="background-color: rgba(255, 0, 0, 0.6);"@endif value="{{ $vehicule->id }}">{{ $vehicule->ModelVehicule->model }} ==> <span>{{ $vehicule->immatriculation_num }}|{{ $vehicule->immatriculation_lettre }}|{{ $vehicule->immatriculation_region }}</span></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="date_debut"><em><b>Date debut</em></b></label>
            <div class="col-sm-9">
                <input type="datetime-local" class="form-control" name="date_debut" id="date_debut" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="date_fin"><em><b>Date fin</em></b></label>
            <div class="col-sm-9">
                <input type="datetime-local" class="form-control" name="date_fin" id="date_fin" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="tarif"><em><b>Tarif</em></b></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="tarif" id="tarif" value="0" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Avance</b></em></label>
            <div class="col-sm-9 d-flex justify-content-around">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="avance" id="avance_oui" value="oui" onchange="showInputs(1)">
                    <label class="form-check-label" for="avance_oui">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="avance" id="avance_non" value="non" checked>
                    <label class="form-check-label" for="avance_non">Non</label>
                </div>
            </div>
        </div>
        <div id="avance_div" style="display: none;">
            <div class="form-group row">
                <label for="mode_paiement_id" class="col-sm-3"><em><b>Mode Paiement</b></em></label>
                <div class="col-sm-4">
                    <select class="form-control" name="mode_paiement_id" id="mode_paiement_id" onchange="showInputs(this.value)">
                        <option value="">Choisir...</option>
                        @foreach ($mode_paiements as $mode_paiement)
                            <option value="{{ $mode_paiement->id }}">{{ $mode_paiement->mode }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="montant_total" class="col-sm-2"><em><b>Montant</b></em></label>
                <div class="col-sm-3">
                    <input class="form-control" type ="number" step="0.01" name="avance" placeholder="Montant en DH">
                </div>
            </div>
            <div id="OrganisationReferenceBox" style="display: none;">
                <div class="form-group row">
                    <label for="organisation_id" class="col-sm-3"><em><b>Organisation</b></em></label>
                    <div class="col-sm-7 d-flex align-items-center">
                        <select class="form-control" name="organisation_id" id="organisation_id">
                            <option value="" selected disabled>Choisir...</option>
                            @foreach ($organisations as $organisation)
                                <option value="{{ $organisation->id }}">{{ $organisation->organisation }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="reference" class="col-sm-3"><em><b>Reference</b></em></label>
                    <div class="col-sm-7 d-flex align-items-center">
                        <input type="text" class="form-control" name="reference" id="reference" placeholder="Ex: Numero de cheque">
                        <sup style="color:red;" class="ml-3">optionnel</sup>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3" for="description"><em><b>Description</em></b></label>
            <div class="col-sm-9">
                <textarea name="description" class="form-control" id="description" rows="3"></textarea>
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

<div class="modal fade bd-example-modal-lg modal-client-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalTableShow">Formulaire Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modal-table-box">
                <form method="POST">
                    @csrf
                    <div class="form-group row">
                        <span class="material-symbols-outlined col-sm-3 col-form-label">person</span>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nom_complet" id="client_nom_complet" placeholder="Nom et Prenom" required>
                        </div>
                        <div class="col-sm-1">
                            <p style="color:red">*</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><em><b>Sexe</b></em></label>
                        <div class="col-sm-8 d-flex justify-content-around">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="client_sexe" value="M" checked>
                                <label class="form-check-label" for="masculin">Masculin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexe" id="client_sexe" value="F">
                                <label class="form-check-label" for="feminin">Feminin</label>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <p style="color:red">*</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="material-symbols-outlined col-sm-3 col-form-label">call</span>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tel" id="client_tel" placeholder="Numero de Telephone 1" required>
                        </div>
                        <div class="col-sm-1">
                            <p style="color:red">*</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <span class="material-symbols-outlined col-sm-3 col-form-label">badge</span>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="num_cin" id="client_num_cin" placeholder="Numero de CIN">
                        </div>
                    </div>
                    <div class="form-group row mt-3 mb-3 d-flex justify-content-around">
                        <div class="col-sm-2 mt-1">
                            <button class="btn btn-secondary" type="reset">Annuler</button>
                        </div>
                        <div class="col-sm-2 mt-1">
                            <button type="submit" class="btn btn-primary" id="client-store" data-dismiss="modal">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    $("#client-store").click(function(e) {

        e.preventDefault();

        nom_complet = $("#client_nom_complet").val();
        sexe = $("#client_sexe").val();
        tel = $("#client_tel").val();
        num_cin = $("#client_num_cin").val();

        console.log(nom_complet);
        console.log(sexe);
        console.log(tel);
        console.log(num_cin);

        $.ajax({
            type: 'POST',
            url: "{{ route('ClientIncomplete.store') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                nom_complet: nom_complet,
                sexe: sexe,
                tel: tel,
                num_cin: num_cin,
            },
            success: function(data) {
                $('#ClientSelect').append($('<option>', {
                    value: data,
                    text: nom_complet
                }));
                $('#ClientSelect').val(data);
            }
        });
    });
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

    const OrganisationReference = document.getElementById('OrganisationReferenceBox');

    function showInputs(id){
        if(id != 1 && id != "") {
            OrganisationReference.style.display = "block";
        }else{
            OrganisationReference.style.display = "none";
        }
    }
</script>
@endpush