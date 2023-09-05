@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection
@section('content')

<section class="container-fluid d-flex flex-column align-items-center">
    <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ URL::previous() }}" role="button">Retour</a>
    </div>
    <h3 class="display-2 mt-5 mb-5">Formulaire Vehicule</h3>
    <form  class="form-edit-width" action="{{ route("Vehicule.store") }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-sm-3">
                <label><em><b>Immatriculation</b></em></label>
            </div>
            <div class="form-group col-sm-4">
                <input type="number" class="form-control" name="immatriculation_num" id="immatriculation1" placeholder="Ex: 54492" required>
            </div>
            <div class="form-group col-sm-2">
                <select class="form-control" lang="ar" name="immatriculation_lettre">
                    @foreach ($arabic_alphabets as $arabic_alphabet)
                        <option value="{{ $arabic_alphabet->lettre }}">{{ $arabic_alphabet->lettre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-3">
                <input type="number" class="form-control" name="immatriculation_region" id="immatriculation3" placeholder="Ex: 33" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Model</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="model_vehicule_id" required>
                    <option value="" disabled selected>Choisir...</option>
                    @foreach ($model_vehicules as $model_vehicule)
                        <option value="{{ $model_vehicule->id }}">{{ $model_vehicule->model }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Type</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="type_vehicule_id" required>
                    <option value="" disabled selected>Choisir...</option>
                    @foreach ($type_vehicules as $type_vehicule)
                        <option value="{{ $type_vehicule->id }}">{{ $type_vehicule->type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Couleur</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="couleur_vehicule_id" required>
                    <option value="" disabled selected>Choisir...</option>
                    @foreach ($couleur_vehicules as $couleur_vehicule)
                        <option value="{{ $couleur_vehicule->id }}">{{ $couleur_vehicule->couleur }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Transmission</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="transmission_vehicule_id" required>
                    <option value="" disabled selected>Choisir...</option>
                    @foreach ($transmission_vehicules as $transmission_vehicule)
                        <option value="{{ $transmission_vehicule->id }}">{{ $transmission_vehicule->transmission }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Etat</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="etat_id" required>
                    <option value="" disabled selected>Choisir...</option>
                    @foreach ($etats as $etat)
                        <option value="{{ $etat->id }}">{{ $etat->designation }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Date acquisition</b></em></label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="date_acquisition" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Nombre places</b></em></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="nbr_place" placeholder="Saisir un nombre" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Documents</b></em></label>
            <div class="col-sm-9">
                <select class="form-control" name="document_id" id="document_select">
                    <option value="" selected>Choisir...</option>
                    @foreach ($documents as $document)
                        <option value="{{ $document->id }}">{{ $document->type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row selected-option">

        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Date disponibilite</b></em></label>
            <div class="col-sm-9">
                <input type="date" class="form-control" name="date_disponibilite" value="{{ date("Y-m-d") }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Km compteur</b></em></label>
            <div class="col-sm-9">
                <input type="number" class="form-control" name="km_compteur" placeholder="Saisir un nombre" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Tarification</b></em></label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="tarif" placeholder="Tarif en DH" required>
            </div>
            <div class="col-sm-5 d-flex justify-content-around">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="unite" id="unite1" value="{{ \App\Enums\Unite::Km->value }}" checked>
                    <label class="form-check-label" for="unite1">Km</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="unite" id="unite2" value="{{ \App\Enums\Unite::Heure->value }}">
                    <label class="form-check-label" for="unite2">Heure</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="unite" id="unite3" value="{{ \App\Enums\Unite::Jour->value }}">
                    <label class="form-check-label" for="unite3">Jour</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-3"><em><b>Credit</b></em></label>
            <div class="col-sm-9 d-flex justify-content-around">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="credit" id="credit_oui" value="oui">
                    <label class="form-check-label" for="credit_oui">Oui</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="credit" id="credit_non" value="non" checked>
                    <label class="form-check-label" for="credit_non">Non</label>
                </div>
            </div>
        </div>    
        <div id="credit_div" style="display: none;">
            <div class="form-group row">
                <label for="organisation_id" class="col-sm-3"><em><b>Organisation</b></em></label>
                <div class="col-sm-9">
                    <select class="form-control" name="organisation_id" id="organisation_id">
                        <option value="">Choisir...</option>
                        @foreach ($organisations as $organisation)
                            <option value="{{ $organisation->id }}">{{ $organisation->organisation }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="montant_total" class="col-sm-3"><em><b>Prix vehicule</b></em></label>
                <div class="col-sm-3">
                      <input class="form-control" type="text" name="prix_vehicule" placeholder="Montant en DH">
                </div>
                <label for="montant_total" class="col-sm-2"><em><b>Apport</b></em></label>
                <div class="col-sm-4">
                      <input class="form-control" type="text" name="apport" placeholder="Montant en DH">
                </div>
            </div>
            <div class="form-group row">
                <label for="mensualite" class="col-sm-3"><em><b>Mensualité</b></em></label>
                <div class="col-sm-4">
                    <input class="form-control" type ="text" name="mensualite" placeholder="Montant en DH">
                </div>
            </div>
            <div class="form-group row">
                <label for="date_debut" class="col-sm-3"><em><b>Date de début</b></em></label>
                <div class="col-sm-3">
                    <input class="form-control" type="date" name="date_debut">
                </div>
                <label for="date_fin" class="col-sm-2"><em><b>Date de fin</b></em></label>
                <div class="col-sm-4">
                    <input class="form-control" type="date" name="date_fin">
                </div>
            </div>
        </div>
        @foreach ($type_entretiens as $type_entretien)
            <div class="form-group row">
                <label class="col-sm-3 text-capitalize"><em><b>{{ $type_entretien->type }}</b></em></label>
                <div class="col-sm-4">
                    <input type="hidden" name="type_entretien_id[]" value="{{ $type_entretien->id }}">
                    <input type="number" class="form-control" name="km_visee[]" placeholder="Intervalle Kilometrage">
                </div>
                <div class="col-sm-5">
                    <input type="number" class="form-control" name="km_rappel[]" placeholder="Notification Km restante">
                </div>
            </div>
        @endforeach
        <div class="form-group row mt-4">
            <div class="col-sm-9 offset-sm-3">
                <button type="button" onclick="AddImg()" class="btn btn-outline-success btn-lg btn-block">Ajouter Images Vehicule</button>
            </div>
        </div>
        <div class="box-img">
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
    $(document).ready(function() {
    $('#document_select').change(function() {
        var selectedOption = $(this).find(':selected');
        var selectedValue = selectedOption.val();
        var selectedText = selectedOption.text();

        if(selectedValue) {
            // Create a new row element with columns for the document name, two date inputs, and a checkbox
            var row1 = $('<div class="form-group row col-sm-12 mt-2 ml-2 document-row">' +
                '<div class="col-sm-3 text-capitalize">' +
                '<span><em><b><u>' + selectedText + '</u></b></em></span>' +
                '</div>' +
                '<div class="form-floating col-sm-4">' +
                '<label class="m-0"><b>Date Debut</b></label>' +
                '<input class="form-control" type="date" name="document_date_debut[]" required>' +
                '</div>' +
                '<div class="col-sm-4">' +
                '<label class="m-0"><b>Date Fin</b></label>' +
                '<input class="form-control" type="date" name="document_date_fin[]" required>' +
                '</div>' +
                '</div>');

            // Create a new row element with columns for the document number, "disponible" input, and a checkbox
            var row2 = $('<div class="form-group row col-sm-12 mt-2 mb-3 ml-2 document-row">' +
                '<label class="col-sm-3"><em><b>Rappel</b></em></label>' +
                '<div class="col-sm-4">' +
                '<input class="form-control" type="text" name="document_rappel[]" placeholder="Nbr jour" required>' +
                '</div>' +
                '<label class="col-sm-3"><em><b>Selectionne</b></em></label>' +
                '<div class="col-sm-2">' +
                '<input  type="checkbox" name="document[]" value="' + selectedValue + '" checked>' +
                '</div>' +
                '</div>');

            // Store the value of the selected option in a data attribute of the row
            selectedOption.data('option-value', selectedValue);
            row2.data('option-value', selectedValue);
            
            //Useless block of code .
            /*
            row1.find('input[type="checkbox"]').change(function() {
                if(!$(this).is(':checked')) {
                    var optionValue = $(this).parent().parent().data('option-value');
                    var selectOption = $('#document_select').find('option[value="' + optionValue + '"]');
                    selectOption.prop('selected', false);

                    // Create a new option element and append it to the select element
                    var newOption = $('<option value="' + optionValue + '">' + selectedText + '</option>');
                    $('#document_select').append(newOption);

                    $(this).parent().parent().remove();
                    row2.remove();
                }
            });*/

            row2.find('input[type="checkbox"]').change(function() {
                if(!$(this).is(':checked')) {
                    var optionValue = $(this).parent().parent().data('option-value');
                    var selectOption = $('#document_select').find('option[value="' + optionValue + '"]');
                    selectOption.prop('selected', false);

                    // Create a new option element and append it to the select element
                    var newOption = $('<option value="' + optionValue + '">' + selectedText + '</option>');
                    $('#document_select').append(newOption);

                    $(this).parent().parent().remove();
                    row1.remove();
                }
            });

            // Add the new rows to the "selected-option" div and remove the selected option from the select element
            $('.selected-option').append(row1, row2);
            selectedOption.remove();
        }
    });
});
    function toggleForm() {
        const form = document.querySelector('form');
        form.classList.toggle('file-open');
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
        toggleForm();
    }

    function RemovePj(element) {
        const div = element.parentNode.parentNode;
        div.remove();
    }


    const IMG=`
    <div class="form-group col-sm-9">
        <label><b>Image</b></label>
        <input type="file" class="form-control-file" name="image[]" accept=".jpg, .jpeg, .png .pdf" required>
    </div>
    <div class="col-sm-3 mt-3 mb-2">
        <button type="button" onclick="RemovePj(this)" class="btn btn-outline-danger btn-sm">Supprimer</button>
    </div>
    `;

    function AddImg() {
        const boxImg = document.querySelector(".box-img");
        const div = document.createElement("div");
        div.classList.add("border-bottom");
        div.classList.add("border-success");
        div.classList.add("form-group");
        div.classList.add("row");
        div.innerHTML = IMG;
        boxImg.appendChild(div);
        toggleForm();
    }

    function RemovePj(element) {
        const div = element.parentNode.parentNode;
        div.remove();
    }


    // Get a reference to the radio buttons and the div
    const creditOui = document.getElementById('credit_oui');
    const creditNon = document.getElementById('credit_non');
    const creditDiv = document.getElementById('credit_div');
    // Add an event listener to the radio buttons
    creditOui.addEventListener('change', () => {
    // Show the div when "Oui" is selected
    creditDiv.style.display = 'block';
    
    // Add the "required" attribute to the inputs and select inside the div
    creditDiv.querySelectorAll('input, select').forEach((input) => {
        input.setAttribute('required', true);
    });
    });
    creditNon.addEventListener('change', () => {
    // Hide the div and clear its input values when "Non" is selected
    creditDiv.style.display = 'none';
    creditDiv.querySelectorAll('input, select').forEach((input) => {
        input.value = '';
        input.removeAttribute('required');
    });
    });

</script>
@endpush