@extends('layouts.app')

@section("css")
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection
@section('content')
<section class="container-fluid d-flex flex-column align-items-center">
    <div class="container-fluid ml-5 mt-5 d-flex justify-content-start w-25">
        <a class="btn btn-success text-color mb-3" href="{{ route("Location.index") }}" role="button">Retour</a>
    </div>
    <h3 class="display-2 mt-5 mb-5">Formulaire Location</h3>
    <form class="container-fluid"  action="{{ route('Location.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5>Locataire</h5>
                    </div>
                    <div class="row mb-2 mr-2 d-flex justify-content-around">
                        <a style="color:#0d6efd; text-decoration:underline; cursor:pointer;" role="button" data-toggle="modal" data-target=".modal-locataire-form">Modifier Locataire</a>
                        <a style="color: #0d6efd; text-decoration:underline; cursor:pointer;" role="button" data-toggle="modal" data-target=".modal-table-show">Changer Locataire</a>
                    </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Nom et prenom</b></em></label>
                    <div class="col-sm-9">
                        <input type="hidden" name="client_id" id="client_id">
                        <input type="text" class="form-control" name="nom_complet" placeholder="Nom et prenom" id="client_nom_complet_show" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Date de naissance</b></em></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="date_naissance" id="client_date_naissance_show" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu de naissance</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Lieu_naissance" id="client_lieu_naissance_show" placeholder="Lieu" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Nationalite</b></em></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nationalite" id="client_nationalite_show" placeholder="Nationalite" disabled>
                    </div>
                    <label class="col-sm-2 d-flex align-items-center"><em><b>Telephone</b></em></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="tel" id="client_tel_show" placeholder="Ex: 061321311" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Adresse</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="adresse" id="client_adresse_show" placeholder="Adresse" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>C.I.N</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="num_cin" id="client_num_cin_show" placeholder="Numero CIN" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="cin_delivre" id="client_cin_delivre_show" disabled>
                    </div>
                    <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="cin_validite" id="client_cin_validite_show" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Permis</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="num_permis" placeholder="Numero Permis" id="client_num_permis_show" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="permis_delivre" id="client_permis_delivre_show" disabled>
                    </div>
                    <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="permis_validite" id="client_permis_validite_show" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Passeport</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="num_passeport" id="client_num_passeport_show" placeholder="Numero Passeport" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="passeport_delivre" id="client_passeport_delivre_show" disabled>
                    </div>
                    <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="passeport_validite" id="client_passeport_validite_show" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Date d'entree au Maroc</b></em></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="client_date_maroc" value="{{ date("Y-m-d") }}">
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5>Vehicule en location</h5>
                    </div>
                    <div class="row mb-2 mr-2 d-flex justify-content-end">
                        <a style="color:#0d6efd; text-decoration:underline; cursor:pointer;" onclick="param('vehicule-update')" role="button" data-toggle="modal" data-target=".modal-table-vehicule">Modifier Vehicule</a>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Marque</b></em></label>
                        <div class="col-sm-3">
                            <input type="hidden" name="vehicule_id" id="vehicule_id" value="{{ $vehicule->id }}">
                            <input type="text" class="form-control" name="marque" id="marque"
                                value="{{ $vehicule->ModelVehicule->MarqueVehicule->marque }}" readonly>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Modele</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="model" id="model"
                                value="{{ $vehicule->ModelVehicule->model }}" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Immatriculation</b></em></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="immatriculation" id="immatriculation"
                                value="{{ $vehicule->immatriculation_num . ' | ' . $vehicule->immatriculation_lettre . ' | ' . $vehicule->immatriculation_region }}"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Date depart</b></em></label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control" name="date_depart" id="date_depart" onchange="CalculDate(); CalculTotal();"
                             required>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Lieu depart</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lieu_depart" placeholder="Lieu de depart"
                                required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Date retour</b></em></label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control" name="date_retour" id="date_retour" onchange="CalculDate(); CalculTotal();"
                                required>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Lieu retour</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lieu_retour" placeholder="Lieu de retour"
                                required>
                        </div>
                    </div>
                    <div id="conducteur_ajout_box" style="display: block;">
                        <div class="row d-flex flex-column align-items-center justify-content-center mb-3 mt-5">
                            <h5> 2<sup>eme</sup> Conducteur</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-primary text-color mt-4 mr-4" data-toggle="modal"
                                    data-target=".modal-ajouter-conducteur" role="button">Ajouter</a>
                                <a class="btn btn-success mt-4 ml-4" role="button" data-toggle="modal" data-target=".modal-table-conducteur-show">Choisir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class="row d-flex justify-content-center mb-5">
                        <h5>Etat Vehicule a La Livraison</h5>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>km compteur</b></em></label>
                        <div class="col-sm-9">
                            <input type="hidden" name="type_etat" value="l"><!-- type d'etat vehicule l == livraison-->
                            <input type="number" class="form-control" name="kms"
                                value="{{ $vehicule->km_compteur }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3"><em><b>Pieces Vehicule</b></em></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="piece_vehicule_id" id="piece_vehicule_select">
                                <option value="" selected>Choisir...</option>
                                @foreach ($piece_vehicules as $piece_vehicule)
                                    <option value="{{ $piece_vehicule->id }}">{{ $piece_vehicule->piece }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3 selected-option">
                        
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Observation</b></em></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="observation" cols="30" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                      <label class="col-sm-3 d-flex align-items-center"><em><b>Niveau Carburant</b></em></label>
                      <div class="col-sm-9">
                          <input class="form-control" type="number" name="niveau_carburant" min="0" max="100" value="0" id="percent-input">
                      </div>
                    </div>
                    <div class="row mb-2 d-flex justify-content-center align-items-center row-gauge">
                        <div class="position-relative">
                            <div class="container-gauge">
                                <div class="gauge-a"></div>
                                <div class="gauge-b"></div>
                                <div class="gauge-c"></div>
                                <div class="gauge-data">
                                    <h1 id="percent">0%</h1>
                                </div>
                            </div>
                        </div>
                        <div class="position-relative">
                            <div class="button-container">
                                <div class="level level0" data-level="0"></div>
                                <div class="level level1 my-button" data-level="1"></div>
                                <div class="level level2" data-level="2"></div>
                                <div class="level level3" data-level="3"></div>
                                <div class="level level4" data-level="4"></div>
                                <div class="level level5" data-level="5"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-4 mb-5">
                    <div class="row">
                        <div class="col d-flex flex-column align-items-center">
                            <div class="canvas-container">
                                <div class="cursor small"></div>
                                <img id="car-image" src="{{ asset('images/vue_croque_voiture.png') }}">
                                <canvas id="canvas" width="800" height="448"></canvas>
                                <input type="hidden" name="canvas_data" id="canvas_data">
                                <br>
                            </div>
                            <div class="d-flex justify-content-between canvas-button-container mt-2">
                                <button type="button" id="clear-button" data-toggle="tooltip" data-placement="bottom" title="Effacer Tout" class="btn btn-outline-primary"><span class="material-symbols-outlined">
                                    delete_forever
                                    </span></button>
                                <button type="button" id="color-black" data-toggle="tooltip" data-placement="bottom" title="Noir" class="btn btn-outline-dark"><span class="material-symbols-outlined">
                                    brush
                                    </span></button>
                                <button type="button" id="color-red" data-toggle="tooltip" data-placement="bottom" title="Rouge" class="btn btn-outline-danger"><span class="material-symbols-outlined">
                                    brush
                                    </span></button>
                                <button type="button" id="color-yellow" data-toggle="tooltip" data-placement="bottom" title="Jaune" class="btn btn-outline-warning"><span class="material-symbols-outlined">
                                    brush
                                    </span></button>
                                <button type="button" id="eraser-button" data-toggle="tooltip" data-placement="bottom" title="Gomme" class="btn btn-outline-secondary"><span class="material-symbols-outlined">
                                    layers_clear
                                    </span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-5">
                <div class="col-sm-6">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5>Facturation a La Livraison</h5>
                    </div>
                    <div class="row mb-2">
                        <input type="hidden" name="type_facturation" value="l">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Facturation en </b></em></label>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>jour</b></em></label>
                        <div class="col-sm-1">
                            <input class="form-check-input facturation-unite" type="radio" name="facturation_unite" value="{{ \App\Enums\Unite::Jour->value }}" @if($vehicule->unite == \App\Enums\Unite::Jour->value) checked @endif>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>heure</b></em></label>
                        <div class="col-sm-1">
                            <input class="form-check-input facturation-unite" type="radio" name="facturation_unite" value="{{ \App\Enums\Unite::Heure->value }}" @if($vehicule->unite == \App\Enums\Unite::Heure->value) checked @endif>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>km</b></em></label>
                        <div class="col-sm-1">
                            <input class="form-check-input facturation-unite" type="radio" name="facturation_unite" value="{{ \App\Enums\Unite::Km->value }}" @if($vehicule->unite == \App\Enums\Unite::Km->value) checked @endif>
                        </div>
                    </div>
                    <div class="row mb-2 box-facturation">
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Frais de livraison</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="frais_livraison" id="frais_livraison" step="any" value="0" onkeyup="CalculTotalHt()" required>
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Frais de reprise</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="frais_reprise" id="frais_reprise" step="any" value="0" onkeyup="CalculTotalHt()" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Remise</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="remise" id="remise" step="any" value="0" onkeyup="CalculTotalHt()" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Total HT</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" id="total_ht" step="any" value="0" onkeyup="CalculTotalTtc()" required>
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>TVA</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="tva" step="any" id="tva" value="{{ $tva->valeur }}" onkeyup="CalculTotalTtc()" value="0" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Total TTC</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" step="any" value="0" id="total_ttc" onkeyup="CalculRestePayer()" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Acompte</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="acompte" step="any" id="acompte"  value="0" onkeyup="CalculRestePayer()" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Reste a payer</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" step="any" id="reste_a_payer" value="0" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Mode de paiement</b></em></label>
                        <div class="col-sm-3">
                            <select class="form-control" name="mode_paiement_id" id="mode_paiement_id" required>
                                <option value="">Choisir...</option>
                                @foreach ($mode_paiements as $mode_paiement)
                                    <option value="{{ $mode_paiement->id }}">{{ $mode_paiement->mode }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Organisation</b></em></label>
                        <div class="col-sm-3 d-flex align-items-center">
                            <select class="form-control" name="organisation_id" id="organisation_id">
                                <option value="">Choisir...</option>
                                @foreach ($organisations as $organisation)
                                    <option value="{{ $organisation->id }}">{{ $organisation->organisation }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Reference paiement</b></em></label>
                        <div class="col-sm-5">
                            <input class="form-control" type="text" name="reference" placeholder="Ex: Numero de cheque ...">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5>Assurance</h5>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Assurance</b></em></label>
                        <div class="col-sm-3">
                            <select class="form-control" name="assurance_id" id="assurance_id" onchange="GetOptionAssurance(this)" required>
                                <option value="" selected disabled>Choisir...</option>
                                @foreach ($assurances as $assurance)
                                    <option value="{{ $assurance->id }}">{{ $assurance->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Option</b></em></label>
                        <div class="col-sm-3 d-flex align-items-center">
                            <select class="form-control" name="option_id" id="option_id" disabled>
                                <option value="">Choisir...</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-5 mb-3 selected-option-assurance">
                        
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Observation</b></em></label>
                        <div class="col-sm-9">
                            <textarea name="observation_assurance" id="observation_assurance" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Montant Franchise</b></em></label>
                        <div class="col-sm-3 input-group">
                            <input class="form-control" type="number" name="franchise" step="any" id="montant_franchise" value="0" required> 
                            <div class="input-group-append">
                                <span class="input-group-text"> DH </span>
                            </div>
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Pourcentage Franchise</b></em></label>
                        <div class="col-sm-3 input-group">
                            <input class="form-control" type="number" step="0.01" id="pourcentage_franchise" value="0" required>
                            <div class="input-group-append">
                                <span class="input-group-text"> % </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Reference Franchise</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="reference_franchise" placeholder="Ex: Numero de cheque ...">
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Organisation Franchise</b></em></label>
                        <div class="col-sm-3 d-flex align-items-center">
                            <select class="form-control" name="franchise_organisation_id" id="franchise_organisation_id">
                                <option value="">Choisir...</option>
                                @foreach ($organisations as $organisation)
                                    <option value="{{ $organisation->id }}">{{ $organisation->organisation }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-5">
                <div class="col-sm-6" id="conducteur_show" style="display: none">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5> 2<sup>eme</sup> Conducteur</h5>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Nom et prenom</b></em></label>
                        <div class="col-sm-9">
                            <input type="hidden" name="conducteur_id" id="conducteur_id">
                            <input type="text" class="form-control" name="nom_complet"
                                id="conducteur_nom_complet_show" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Date de naissance</b></em></label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="date_naissance"
                                id="conducteur_date_naissance_show" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu de naissance</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="lieu_naissance"
                                id="conducteur_lieu_naissance_show" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Nationalite</b></em></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nationalite"
                                id="conducteur_nationalite_show" readonly>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Telephone</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="tel" id="conducteur_tel_show" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Adresse</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="adresse" id="conducteur_adresse_show"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>C.I.N</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="num_cin" id="conducteur_num_cin_show"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="cin_delivre"
                                id="conducteur_cin_delivre_show" readonly>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="cin_validite"
                                id="conducteur_cin_validite_show" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Permis</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="num_permis" id="conducteur_num_permis_show"
                                readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="permis_delivre"
                                id="conducteur_permis_delivre_show" readonly>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="permis_validite"
                                id="conducteur_permis_validite_show" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Passeport</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="num_passeport"
                                id="conducteur_num_passeport_show" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="passeport_delivre"
                                id="conducteur_passeport_delivre_show" readonly>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" name="passeport_validite"
                                id="conducteur_passeport_validite_show" readonly>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Date d'entree au Maroc</b></em></label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="conducteur_date_maroc">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4 mb-5">
                <div class="col d-flex justify-content-center">
                    <button class="btn btn-secondary" type="reset">Annuler</button>
                </div>
                <div class="col d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" id="submit-location-form">Valider</button>
                </div>
            </div>
    </form>
</section>

<a class="btn btn-danger d-none" id="client_table" role="button" data-toggle="modal" data-target=".modal-table-show"></a>

<!-- Large Modal -->
<div class="modal fade bd-example-modal-lg modal-table-show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalTableShow">Choisir Un Client</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modal-table-box">
                <div class="table-container mb-2 container-fluid" style="width: 100%;">
                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom et Prenom</th>
                                <th>Cin</th>
                                <th>Permis</th>
                                <th>Tel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $client)
                                <tr id="{{ $client->id }}">
                                    <td><img class="rounded-circle" src="@if(!is_null($client->photo)){{ asset('images/'. $client->photo)}}@else {{ asset('images/default_avatar.png')}} @endif" width="50px" height="50px" alt="image"></td>
                                    <td class="text-capitalize">{{ $client->nom_complet }}</td>
                                    <td>{{ $client->num_cin }}</td>
                                    <td>{{ $client->num_permis }}</td>
                                    <td>{{ $client->tel }}</td>
                                    <td class="actions">
                                        <a class="btn btn-outline-success btn-sm" data-dismiss="modal" onclick="GetClient({{ $client->id }})"><span class="material-symbols-outlined">add</span></a>
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

<!-- Large Modal -->
<div class="modal fade modal-ajouter-conducteur bd-example-modal-lg modal-conducteur" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Ajouter 2<sup>eme</sup> Conducteur</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row mt-3">
                <div class="col-sm-12">
                    <form method="POST">
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Nom et prenom</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nom_complet"
                                    id="conducteur_nom_complet" placeholder="Nom et prenom" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Date de
                                        naissance</b></em></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date_naissance"
                                    id="conducteur_date_naissance">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu de
                                        naissance</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lieu_naissance"
                                    id="conducteur_lieu_naissance" placeholder="Lieu">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Nationalite</b></em></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="nationalite"
                                    id="conducteur_nationalite" placeholder="Nationalite">
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Telephone</b></em></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="conducteur_tel"
                                    id="conducteur_tel" placeholder="Ex: 061321311" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Adresse</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="adresse"
                                    id="conducteur_adresse" placeholder="Adresse">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>C.I.N</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="num_cin"
                                    id="conducteur_num_cin" placeholder="Numero CIN">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="cin_delivre"
                                    id="conducteur_cin_delivre">
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Valable
                                        jusqu'a</b></em></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="cin_validite"
                                    id="conducteur_cin_validite">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Permis</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="num_permis"
                                    id="conducteur_num_permis" placeholder="Numero Permis" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="permis_delivre"
                                    id="conducteur_permis_delivre">
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Valable
                                        jusqu'a</b></em></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="permis_validite"
                                    id="conducteur_permis_validite">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Passeport</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="num_passeport"
                                    id="conducteur_num_passeport" placeholder="Numero Passeport">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="passeport_delivre"
                                    id="conducteur_passeport_delivre">
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Valable
                                        jusqu'a</b></em></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="passeport_validite"
                                    id="conducteur_passeport_validite">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col d-flex justify-content-center">
                                <button class="btn btn-secondary" type="reset"
                                    data-dismiss="modal">Annuler</button>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary" id="conducteur-store"
                                    data-dismiss="modal">Valider</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!--MODAL 2eme CONDUCTEUR-->
<div class="modal fade bd-example-modal-lg modal-table-conducteur-show" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalTableShow">Choisir 2<sup>eme</sup> Conducteur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modal-table-box">
                <div class="table-container mb-5" style="width: 100%;">
                    <table id="myTableConducteur" class="display">
                        <thead>
                            <tr>
                                <th>Nom et Prenom</th>
                                <th>Cin</th>
                                <th>Permis</th>
                                <th>Tel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($conducteurs as $conducteur)
                                <tr id="{{ $conducteur->id }}">
                                    <td style="text-transform: capitalize;">{{ $conducteur->nom_complet }}</td>
                                    <td style="text-transform: capitalize;">{{ $conducteur->num_cin}}</td>
                                    <td style="text-transform: capitalize;">{{ $conducteur->num_permis}}</td>
                                    <td style="text-transform: capitalize;">{{ $conducteur->tel}}</td>
                                    <td class="actions d-flex justify-content-end">
                                        <!-- Button trigger modal -->
                                        <a data-dismiss="modal" onclick="GetConducteur({{ $conducteur->id }})" class="btn btn-outline-info btn-sm"><span class="material-symbols-outlined">edit</span></a>
                                        <a data-dismiss="modal" onclick="MigrateConducteur($(this).closest('tr'))" class="btn btn-outline-secondary btn-sm text-center"><b>Rendre Client</b></a>
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


<div class="modal fade bd-example-modal-lg modal-locataire-form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalTableShow">Formulaire Locataire</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modal-table-box">
                <form method="POST">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Nom et prenom</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nom_complet" id="client_nom_complet_update" placeholder="Nom et Prenom" required>
                            <input type="hidden" name="client_id" id="client_id_update" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><em><b>Date de naissance</b></em></label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" name="date_naissance" id="client_date_naissance_update" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><em><b>Lieu de naissance</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lieu_naissance" id="client_lieu_naissance_update" placeholder="Lieu de naissance">
                        </div>
                        <label class="col-sm-2 col-form-label"><em><b>Nationalite</b></em></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="nationalite" id="client_nationalite_update" placeholder="Nationalite">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><em><b>Telephone</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tel" id="client_tel_update" placeholder="Numero de Telephone 1" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Adresse</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="adresse" id="client_adresse_update" placeholder="Adresse" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>C.I.N</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="num_cin" id="client_num_cin_update" placeholder="Numero de CIN">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="cin_delivre" id="client_cin_delivre_update" placeholder="Delivre le">
                        </div>
                        <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="cin_validite" id="client_cin_validite_update">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Permis</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="num_permis" id="client_num_permis_update" placeholder="Numero de Permis" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="permis_delivre" id="client_permis_delivre_update" placeholder="Delivre le">
                        </div>
                        <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="permis_validite" id="client_permis_validite_update">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Passeport</b></em></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="num_passeport" id="client_num_passeport_update" placeholder="Numero de Passeport">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label"><em><b>Delivre le</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="passeport_delivre" id="client_passeport_delivre_update" placeholder="Delivre le">
                        </div>
                        <label class="col-sm-3 col-form-label"><em><b>Valide jusqu'a</b></em></label>
                        <div class="col-sm-3">
                            <input type="date" class="form-control" name="passeport_validite" id="client_passeport_validite_update">
                        </div>
                    </div>
                    <div class="form-group row mt-3 mb-3 d-flex justify-content-around">
                        <div class="col-sm-2 mt-1">
                            <button class="btn btn-secondary" type="reset">Annuler</button>
                        </div>
                        <div class="col-sm-2 mt-1">
                            <button type="submit" class="btn btn-primary" id="locataire-update" data-dismiss="modal">Valider</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Large Modal -->
<div class="modal fade bd-example-modal-lg modal-table-vehicule" tabindex="-1" role="dialog" aria-labelledby="ModalTableVehicule" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalTableVehicule">Changer Vehicule</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body" id="modal-table-vehicule">
                
            </div>
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
        $(document).ready( function () {
            $('#myTableConducteur').DataTable();
        } );
    </script>
    <script>

        //This function is used to make the Conducteur a client and it deletes only the row migrated and adds it to the client table in the view so that the server
        // wont have to deal with all the rows.  
        function MigrateConducteur(row){
            var tableConducteur = $('#myTableConducteur').DataTable();
            var tableClient = $('#myTable').DataTable();
            var rowId = tableConducteur.row(row).id();

            tableConducteur.row(row).remove().draw();
            $.ajax({
                    type: 'GET',
                    url: "/Conducteur/migrate/"+rowId,
                    data: { id: rowId },
                    success: function(data) {
                        toastr.success(data.success);
                        var newRowData = data.newRow;
                        var newRow = tableClient.row.add([
                            "",
                            newRowData.nom_complet,
                            newRowData.num_cin,
                            newRowData.num_permis,
                            newRowData.tel,
                            '<a class="btn btn-outline-success btn-sm" data-dismiss="modal" onclick="GetClient(' + newRowData.id + ')"><span class="material-symbols-outlined">add</span></a>'
                        ]).draw().node();

                        $(newRow).attr('id', newRowData.id);
                    }
                });
        }

        function OpenClientForm(){
            test = document.querySelector("#client_table");
            test.click();
        }

        OpenClientForm();
        ChangeFacturationUnite();
      const ClientInput = document.getElementById("client");
      const VehiculeInput = document.getElementById("vehicule");
      const DateDebutInput = document.getElementById("date_debut");
      const DateFinInput = document.getElementById("date_fin");
      const ReservationInput = document.getElementById("reservation_id");
      const VehiculeIdInput = document.getElementById("vehicule_id");
      function TableInfos(client, vehicule, date_debut, date_fin, reservation_id, vehicule_id){
        ClientInput.value = client;
        VehiculeInput.value = vehicule;
        DateDebutInput.value = date_debut;
        DateFinInput.value = date_fin;
        ReservationInput.value = reservation_id;
        VehiculeIdInput.value = vehicule_id;
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

      //get the conducteur Selected 
      function GetConducteur(id){
            $.ajax({
                    type: 'GET',
                    url: "/Conducteur/"+id,
                    data: { id: id },
                    success: function(data) {
                        $("#conducteur_ajout_box").css("display", "none");
                        $("#conducteur_show").css("display", "block");
                        $("#conducteur_id").val(data.id);
                        $("#conducteur_nom_complet_show").val(data.nom_complet);
                        $("#conducteur_date_naissance_show").val(data.date_naissance);
                        $("#conducteur_lieu_naissance_show").val(data.lieu_naissance);
                        $("#conducteur_nationalite_show").val(data.nationalite);
                        $("#conducteur_tel_show").val(data.tel);
                        $("#conducteur_adresse_show").val(data.adresse);
                        $("#conducteur_num_cin_show").val(data.num_cin);
                        $("#conducteur_cin_delivre_show").val(data.cin_delivre);
                        $("#conducteur_cin_validite_show").val(data.cin_validite);
                        $("#conducteur_num_permis_show").val(data.num_permis);
                        $("#conducteur_permis_delivre_show").val(data.permis_delivre);
                        $("#conducteur_permis_validite_show").val(data.permis_validite);
                        $("#conducteur_num_passeport_show").val(data.num_passeport);
                        $("#conducteur_passeport_delivre_show").val(data.passeport_delivre);
                        $("#conducteur_passeport_validite_show").val(data.passeport_validite);
                    }
                });
        }

      //get the client Selected 
      function GetClient(id){
            $.ajax({
                    type: 'GET',
                    url: "/Location/Client/"+id,
                    data: { id: id },
                    success: function(data) {
                        //Show Client
                        $("#client_id").val(data.id);
                        $("#client_nom_complet_show").val(data.nom_complet);
                        $("#client_date_naissance_show").val(data.date_naissance);
                        $("#client_lieu_naissance_show").val(data.lieu_naissance);
                        $("#client_nationalite_show").val(data.nationalite);
                        $("#client_tel_show").val(data.tel);
                        $("#client_adresse_show").val(data.adresse);
                        $("#client_num_cin_show").val(data.num_cin);
                        $("#client_cin_delivre_show").val(data.cin_delivre);
                        $("#client_cin_validite_show").val(data.cin_validite);
                        $("#client_num_permis_show").val(data.num_permis);
                        $("#client_permis_delivre_show").val(data.permis_delivre);
                        $("#client_permis_validite_show").val(data.permis_validite);
                        $("#client_num_passeport_show").val(data.num_passeport);
                        $("#client_passeport_delivre_show").val(data.passeport_delivre);
                        $("#client_passeport_validite_show").val(data.passeport_validite);

                        //Update Client

                        $("#client_id_update").val(data.id);
                        $("#client_nom_complet_update").val(data.nom_complet);
                        $("#client_date_naissance_update").val(data.date_naissance);
                        $("#client_lieu_naissance_update").val(data.lieu_naissance);
                        $("#client_nationalite_update").val(data.nationalite);
                        $("#client_tel_update").val(data.tel);
                        $("#client_adresse_update").val(data.adresse);
                        $("#client_num_cin_update").val(data.num_cin);
                        $("#client_cin_delivre_update").val(data.cin_delivre);
                        $("#client_cin_validite_update").val(data.cin_validite);
                        $("#client_num_permis_update").val(data.num_permis);
                        $("#client_permis_delivre_update").val(data.permis_delivre);
                        $("#client_permis_validite_update").val(data.permis_validite);
                        $("#client_num_passeport_update").val(data.num_passeport);
                        $("#client_passeport_delivre_update").val(data.passeport_delivre);
                        $("#client_passeport_validite_update").val(data.passeport_validite);
                    }
                });
        }

        $("#locataire-update").click(function(e) {

            e.preventDefault();

            id = $("#client_id_update").val();
            nom_complet = $("#client_nom_complet_update").val();
            date_naissance = $("#client_date_naissance_update").val();
            lieu_naissance = $("#client_lieu_naissance_update").val();
            nationalite = $("#client_nationalite_update").val();
            tel = $("#client_tel_update").val();
            adresse = $("#client_adresse_update").val();
            num_cin = $("#client_num_cin_update").val();
            cin_delivre = $("#client_cin_delivre_update").val();
            cin_validite = $("#client_cin_validite_update").val();
            num_permis = $("#client_num_permis_update").val();
            permis_delivre = $("#client_permis_delivre_update").val();
            permis_validite = $("#client_permis_validite_update").val();
            num_passeport = $("#client_num_passeport_update").val();
            passeport_delivre = $("#client_passeport_delivre_update").val();
            passeport_validite = $("#client_passeport_validite_update").val();

            $("#client_id").val(id);
            $("#client_nom_complet_show").val(nom_complet);
            $("#client_date_naissance_show").val(date_naissance);
            $("#client_lieu_naissance_show").val(lieu_naissance);
            $("#client_nationalite_show").val(nationalite);
            $("#client_tel_show").val(tel);
            $("#client_adresse_show").val(adresse);
            $("#client_num_cin_show").val(num_cin);
            $("#client_cin_delivre_show").val(cin_delivre);
            $("#client_cin_validite_show").val(cin_validite);
            $("#client_num_permis_show").val(num_permis);
            $("#client_permis_delivre_show").val(permis_delivre);
            $("#client_permis_validite_show").val(permis_validite);
            $("#client_num_passeport_show").val(num_passeport);
            $("#client_passeport_delivre_show").val(passeport_delivre);
            $("#client_passeport_validite_show").val(passeport_validite);

            $.ajax({
                type: 'POST',
                url: "/Client/indirectUpdate/" +id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "PATCH",
                    nom_complet: nom_complet,
                    date_naissance: date_naissance,
                    lieu_naissance: lieu_naissance,
                    nationalite: nationalite,
                    tel: tel,
                    adresse: adresse,
                    num_cin: num_cin,
                    cin_delivre: cin_delivre,
                    cin_validite: cin_validite,
                    num_permis: num_permis,
                    permis_delivre: permis_delivre,
                    permis_validite: permis_validite,
                    num_passeport: num_passeport,
                    passeport_delivre: passeport_delivre,
                    passeport_validite: passeport_validite,
                },
                success: function(data) {
                    console.log(data);
                }
            });
        });

      $("#conducteur-store").click(function(e) {

        e.preventDefault();
              
        nom_complet = $("#conducteur_nom_complet").val();
        date_naissance = $("#conducteur_date_naissance").val();
        lieu_naissance = $("#conducteur_lieu_naissance").val();
        nationalite = $("#conducteur_nationalite").val();
        tel = $("#conducteur_tel").val();
        adresse = $("#conducteur_adresse").val();
        num_cin = $("#conducteur_num_cin").val();
        cin_delivre = $("#conducteur_cin_delivre").val();
        cin_validite = $("#conducteur_cin_validite").val();
        num_permis = $("#conducteur_num_permis").val();
        permis_delivre = $("#conducteur_permis_delivre").val();
        permis_validite = $("#conducteur_permis_validite").val();
        num_passeport = $("#conducteur_num_passeport").val();
        passeport_delivre = $("#conducteur_passeport_delivre").val();
        passeport_validite = $("#conducteur_passeport_validite").val();
              
        $("#conducteur_nom_complet_show").val(nom_complet);
        $("#conducteur_date_naissance_show").val(date_naissance);
        $("#conducteur_lieu_naissance_show").val(lieu_naissance);
        $("#conducteur_nationalite_show").val(nationalite);
        $("#conducteur_tel_show").val(tel);
        $("#conducteur_adresse_show").val(adresse);
        $("#conducteur_num_cin_show").val(num_cin);
        $("#conducteur_cin_delivre_show").val(cin_delivre);
        $("#conducteur_cin_validite_show").val(cin_validite);
        $("#conducteur_num_permis_show").val(num_permis);
        $("#conducteur_permis_delivre_show").val(permis_delivre);
        $("#conducteur_permis_validite_show").val(permis_validite);
        $("#conducteur_num_passeport_show").val(num_passeport);
        $("#conducteur_passeport_delivre_show").val(passeport_delivre);
        $("#conducteur_passeport_validite_show").val(passeport_validite);
              
        $.ajax({
            type: 'POST',
            url: "{{ route('Conducteur.store') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                nom_complet: nom_complet,
                date_naissance: date_naissance,
                lieu_naissance: lieu_naissance,
                nationalite: nationalite,
                tel: tel,
                adresse: adresse,
                num_cin: num_cin,
                cin_delivre: cin_delivre,
                cin_validite: cin_validite,
                num_permis: num_permis,
                permis_delivre: permis_delivre,
                permis_validite: permis_validite,
                num_passeport: num_passeport,
                passeport_delivre: passeport_delivre,
                passeport_validite: passeport_validite,
            },
            success: function(data) {
                $("#conducteur_ajout_box").css("display", "none");
                $("#conducteur_show").css("display", "block");
                $("#conducteur_id").val(data);
            }
        });
      });
      /* Fuel Gauge Script*/
      const gaugeC = document.querySelector('.gauge-c');
        const gaugeData = document.querySelector('.gauge-data');
        const levels = document.querySelectorAll('.level');
        const percentInput = document.querySelector('#percent-input');
        const updateButton = document.querySelector('#update-gauge');
        let counter = 0;
        function updateGauge(percent) {
            gaugeC.style.transform = `rotate(${percent / 100 * 180}deg)`;
            gaugeData.querySelector('#percent').textContent = `${percent}%`;

            levels.forEach((levelElement, index) => {
                const levelValue = index + 1;
                levelElement.setAttribute('data-level', levelValue);
            });
        }

        function handleLevelClick(event) {
            const level = parseInt(event.target.getAttribute('data-level'));
            if (level === 0) {
                updateGauge(0);
                percentInput.value = 0;
            } else {
                //this counter variable and this if statement is meant to solve the problem, wich is 
                //when i click the first time on a level it gives me always it's inferior level's pourcentage
                //this if statement says if the handleLevelClick function is called for the first time apply (level * 20)
                if(counter != 0){
                    updateGauge((level - 1) * 20);
                    percentInput.value = (level - 1) * 20;
                }else{
                    updateGauge(level * 20);
                    percentInput.value = level * 20;
                }
            }
            counter++;
        }

        function handleUpdateKeyUp(event) {
            let percent = parseInt(percentInput.value);

            if (isNaN(percent)) {
                percent = 0;
                percentInput.value = percent;
            }

            const clampedPercent = Math.max(0, Math.min(100, percent));
            percentInput.value = clampedPercent;
            updateGauge(clampedPercent);
            counter++;
        }

        for (const level of levels) {
            level.addEventListener('click', handleLevelClick);
        }

        percentInput.addEventListener('keyup', handleUpdateKeyUp);


        /*Select Piece Script*/

        $(document).ready(function() {
            $('#piece_vehicule_select').change(function() {
                var selectedOption = $(this).find(':selected');
                var selectedValue = selectedOption.val();
                var selectedText = selectedOption.text();
                
                if(selectedValue) {
                    // Create a new div element with two columns to display the selected option and checkbox
                    var selectedOptionDiv = $('<div class="row col-sm-6"><div class="col-sm-6 mt-2 mb-2 text-capitalize"><span><em><b>' + selectedText + '</b></em></span></div><div class="col-sm-6 mt-2 mb-2"><input class="ml-3" type="checkbox" name="piece_disponible[]" value="' + selectedValue + '" checked></div></div>');
                
                    // Store the value of the selected option in a data attribute of the div
                    selectedOptionDiv.data('option-value', selectedValue);
                
                    selectedOptionDiv.find('input').change(function() {
                        if(!$(this).is(':checked')) {
                            var optionValue = $(this).parent().parent().data('option-value');
                            var selectOption = $('#piece_vehicule_select').find('option[value="' + optionValue + '"]');
                            selectOption.prop('selected', false);
                        
                            // Create a new option element and append it to the select element
                            var newOption = $('<option value="' + optionValue + '">' + selectedText + '</option>');
                            $('#piece_vehicule_select').append(newOption);
                        
                            $(this).parent().parent().remove();
                        }
                    });
                
                    // Add the new div to the "selected-option" div and remove the selected option from the select element
                    $('.selected-option').append(selectedOptionDiv);
                    selectedOption.remove();
                }
            });
        });


        /***************************** Assurance Select********************************/
        function GetOptionAssurance(SelectedValue){
            var id = SelectedValue.value;
            var option = document.getElementById("option_id");
            $.ajax({
                    type: 'GET',
                    url: "/OptionAssurance/Select/"+id,
                    data: { id: id },
                    success: function(data) {
                        if (!$.trim(data)){   //if data is empty disable the OptionAssurance select and empty the box that has the options checked if something is there 
                            option.disabled = true;
                            $("#option_id").empty();
                            $(".selected-option-assurance").empty();
                            $('#option_id').append('<option value="" selected>Choisir...</option>');
                        }
                        else{   
                            $("#option_id").empty();
                            $('#option_id').append('<option value="" selected>Choisir...</option>');
                            option.disabled = false;
                            $(".selected-option-assurance").empty();
                            $.each(data, function(index, item){
                                $('#option_id').append('<option data-details="'+ item.details +'" value="' + item.id + '">' + item.designation + '</option>');
                            });
                        }

                    }
                });
        }


        /*Select OptionAssurance Script*/

        $(document).ready(function() {
            $('#option_id').change(function() {
                var selectedOption = $(this).find(':selected');
                var selectedValue = selectedOption.val();
                var selectedDetail = selectedOption.attr('data-details');
                var selectedText = selectedOption.text();

                if(selectedDetail === "null"){
                    // I check for null like this instead of checking with length because null is written in the variable and it's not considerd empty.
                    selectedDetail = " ";
                }
                if(selectedValue) {
                    // Create a new div element with two columns to display the selected option and checkbox
                    var selectedOptionDiv = $('<div class="row col-sm-12"><div class="col-sm-3 mt-2 mb-2 text-capitalize"><span><em><b>' + selectedText + '</b></em></span></div><div class="col-sm-2 mt-2 mb-2"><input class="ml-3" type="checkbox" name="option_id_assurance_details[]" value="' + selectedValue + '" checked></div><div class="col-sm-7 mt-2 mb-2 text-capitalize"><textarea name="details_assurance_details" class="form-control text-capitalize" rows="2" disabled>'+ selectedDetail +'</textarea></div></div>');
                
                    // Store the value of the selected option in a data attribute of the div
                    selectedOptionDiv.data('option-assurance-value', selectedValue);
                    selectedOptionDiv.data('data-details', selectedDetail);

                
                    selectedOptionDiv.find('input').change(function() {
                        if(!$(this).is(':checked')) {
                            var optionValue = $(this).parent().parent().data('option-assurance-value');
                            var optionDetail = $(this).parent().parent().data('data-details');
                            var selectOption = $('#option_id').find('option[value="' + optionValue + '"]');
                            selectOption.prop('selected', false);
                        
                            // Create a new option element and append it to the select element
                            var newOption = $('<option data-details="' + optionDetail+ '" value="' + optionValue + '">' + selectedText + '</option>');
                            $('#option_id').append(newOption);
                        
                            $(this).parent().parent().remove();
                        }
                    });
                
                    // Add the new div to the "selected-option-assurance" div and remove the selected option from the select element
                    $('.selected-option-assurance').append(selectedOptionDiv);
                    selectedOption.remove();
                }
            });
        });

        /*************************************************************************/
        //How many days this car is rented 
        function CalculDate(){
            var date_depart = new Date(document.getElementById('date_depart').value);
            var date_retour = new Date(document.getElementById('date_retour').value);
            var facturationValue = $('input[name=facturation_unite]:checked').val();
            var nbr = document.getElementById('nbr');

            var DiffInTime = date_retour.getTime() - date_depart.getTime();
            //var DiffInDays = DiffInTime / (1000 * 3600 * 24);
            if(facturationValue == "{{ \App\Enums\Unite::Heure->value }}"){
                nbr.value = (DiffInTime / (1000 * 3600)).toFixed(2);
            }else if(facturationValue == "{{ \App\Enums\Unite::Jour->value }}"){
                date_depart.setHours(0,0,0,0);
                date_retour.setHours(0,0,0,0);
                var diffInMs = Math.abs(date_retour.getTime() - date_depart.getTime()); //diff in milliseconds
                // Convert milliseconds to days
                var DiffInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));
                nbr.value = DiffInDays.toFixed(2);
            }
        }

        $(document).ready(function() {
            $('.facturation-unite').change(function() {
                ChangeFacturationUnite();
                CalculTotal();
            });
        });

        function ChangeFacturationUnite(){
            var facturationValue = $('input[name=facturation_unite]:checked').val();
                $('.box-facturation').empty();
                if(facturationValue == "{{ \App\Enums\Unite::Km->value }}"){
                    $('.box-facturation').html(
                        '<input type="hidden" name="type_facturation" value="l">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Nbr kms</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="number" name="nbr" step="any" id="nbr" onkeyup="CalculTotal()" required>\
                        </div>\
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Prix/km</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="number" name="prix" step="any" @if( $vehicule->unite == \App\Enums\Unite::Km->value) value="{{ $vehicule->tarif }}" @endif id="prix" onkeyup="CalculTotal()" required>\
                        </div>\
                        <label class="col-sm-1 d-flex align-items-center"><em><b>Total</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="number" name="total_km" step="any" id="total" required>\
                        </div>'
                        );
                }else if(facturationValue == "{{ \App\Enums\Unite::Jour->value }}"){
                    $('.box-facturation').html(
                        '<input type="hidden" name="type_facturation" value="l">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Nbr jours</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="number" name="nbr" step="any" id="nbr" onkeyup="CalculTotal()" required>\
                        </div>\
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Prix/jour</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="number" name="prix" step="any" @if( $vehicule->unite == \App\Enums\Unite::Jour->value) value="{{ $vehicule->tarif }}" @endif id="prix" onkeyup="CalculTotal()" required>\
                        </div>\
                        <label class="col-sm-1 d-flex align-items-center"><em><b>Total</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="number" name="total_jr" step="any" id="total" required>\
                        </div>'
                        );
                        CalculDate();
                }else if(facturationValue == "{{ \App\Enums\Unite::Heure->value }}"){
                    $('.box-facturation').html(
                        '<input type="hidden" name="type_facturation" value="l">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Nbr heures</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="text" name="nbr" step="any" id="nbr" onkeyup="CalculTotal()" required>\
                        </div>\
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Prix/heure</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="number" name="prix" step="any" @if( $vehicule->unite == \App\Enums\Unite::Heure->value) value="{{ $vehicule->tarif }}" @endif id="prix" onkeyup="CalculTotal()" required>\
                        </div>\
                        <label class="col-sm-1 d-flex align-items-center"><em><b>Total</b></em></label>\
                        <div class="col-sm-2">\
                            <input class="form-control" type="number" name="total_heures" step="any" id="total" required>\
                        </div>'
                        );
                        CalculDate();
                }
        }
         

        function CalculTotal(){
            var nbr = document.getElementById('nbr');
            var prix = document.getElementById('prix');
            var total = document.getElementById('total');
            total.value = (+nbr.value * +prix.value).toFixed(2);
            CalculTotalHt();
        }

        const FraisLivraison = document.getElementById('frais_livraison');
        const FraisReprise = document.getElementById('frais_reprise');
        const Remise = document.getElementById('remise');
        const TotalHt = document.getElementById('total_ht');
        const TotalTtc = document.getElementById('total_ttc');
        const Tva = document.getElementById('tva');
        const Acompte = document.getElementById('acompte');
        const RestePayer = document.getElementById('reste_a_payer');

        function CalculTotalHt(){
            var total = document.getElementById('total');
            TotalHt.value = (+total.value + +FraisLivraison.value + +FraisReprise.value - +Remise.value).toFixed(2); 
            CalculTotalTtc();
        }

        function CalculTotalTtc(){
            TotalTtc.value = ( +TotalHt.value + (+TotalHt.value * +Tva.value) / 100).toFixed(2);
            CalculRestePayer();
        }

        function CalculRestePayer(){
            RestePayer.value = (+TotalTtc.value - +Acompte.value).toFixed(2);
        }

        function param(value){
            $(document).ready(function() {
                let query = value;
                $.ajax({
                    type: 'GET',
                    url: "/LocationTable",
                    data:{query, query},
                    success: function(data) {
                        $('#modal-table-vehicule').empty();
                        $('#modal-table-vehicule').html(data);
                        $('#ModalShowTable').DataTable();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                      // If the AJAX call fails, display an error message
                      alert('Error: ' + errorThrown);
                    }
                });
            });
        };

        function UpdateVehicule(vehicule_id, marque, model, immatriculation_num, immatriculation_region, immatriculation_lettre){
            const vehicule_id_vehicule = document.getElementById('vehicule_id');
            const marque_vehicule = document.getElementById('marque');
            const model_vehicule = document.getElementById('model');
            const immatriculation_vehicule = document.getElementById('immatriculation');

            vehicule_id_vehicule.value = vehicule_id;
            marque_vehicule.value = marque;
            model_vehicule.value = model;
            immatriculation_vehicule.value = immatriculation_num +' | '+ immatriculation_lettre +' | '+ immatriculation_region;
        }

    </script>
    <script>

    $(function () {
      $('[data-toggle="tooltip"]').tooltip();
    })

		// Récupération du contexte de dessin
		const canvas = document.getElementById('canvas');
		const context = canvas.getContext('2d');
        const canvasContainer = document.querySelector('.canvas-container');
        const cursorSmall = document.querySelector('.small');
        const canvasRect = canvas.getBoundingClientRect();
        const cursorOffsetX = -3; // adjust this value to align the center of the custom cursor with the old cursor tip
        const cursorOffsetY = -3; // adjust this value to align the center of the custom cursor with the old cursor tip


        const positionElement = (e) => {
            cursorSmall.style.display = "block";
            const mouseY = e.clientY;
            const mouseX = e.clientX;
            const canvasRect = canvas.getBoundingClientRect();
            const cursorX = mouseX - canvasRect.left + cursorOffsetX;
            const cursorY = mouseY - canvasRect.top + cursorOffsetY;
            cursorSmall.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0)`;
        }

        canvasContainer.addEventListener('mouseleave', function(e){
            isDrawing = false;
            cursorSmall.style.display = "none";
        });

        canvasContainer.addEventListener('mousemove', positionElement);
		// Initialisation des variables de dessin
		let isDrawing = false;
		let lastX = 0;
		let lastY = 0;
		let brushColor = 'black';

		// Gestionnaire d'événements pour le début du dessin
		canvas.addEventListener('mousedown', function(e) {
			isDrawing = true;
			lastX = e.offsetX;
			lastY = e.offsetY;
		});

		// Gestionnaire d'événements pour la fin du dessin
		canvas.addEventListener('mouseup', function(e) {
			isDrawing = false;
		});

		// Gestionnaire d'événements pour le dessin en mouvement
		canvas.addEventListener('mousemove', function(e) {
			if (isDrawing) {
				// Dessin de la ligne
				context.beginPath();
				context.moveTo(lastX, lastY);
				context.lineTo(e.offsetX, e.offsetY);
				context.strokeStyle = brushColor;
				context.stroke();

				// Mise à jour des variables de dessin
				lastX = e.offsetX;
				lastY = e.offsetY;
			}
		});

        function resizeEraser(){
            cursorSmall.style.borderRadius = "50%";
            cursorSmall.style.borderWidth = "2px";
        }

		// Gestionnaire d'événements pour le bouton Effacer
		document.getElementById('clear-button').addEventListener('click', function() {
			context.clearRect(0, 0, canvas.width, canvas.height);
		});

		// Gestionnaire d'événements pour le bouton Effaceur
		document.getElementById('eraser-button').addEventListener('click', function() {
            brushColor = 'black';
            context.globalCompositeOperation = 'destination-out';
            context.strokeStyle = "rgba(0,0,0,0)";
            context.lineWidth = 4;
            cursorSmall.style.borderColor = brushColor;
            cursorSmall.style.borderRadius = "15%";
            cursorSmall.style.borderWidth = "1px";
		});

		// Gestionnaire d'événements pour les boutons de couleur
		document.getElementById('color-black').addEventListener('click', function() {
            context.globalCompositeOperation = 'source-over';
            context.lineWidth = 1;
			brushColor = 'black';
            cursorSmall.style.borderColor = brushColor;
            resizeEraser();
		});

		document.getElementById('color-red').addEventListener('click', function() {
            context.globalCompositeOperation = 'source-over';
            context.lineWidth = 1;
			brushColor = 'red';
            cursorSmall.style.borderColor = brushColor;
            resizeEraser();
		});

		document.getElementById('color-yellow').addEventListener('click', function() {
            context.globalCompositeOperation = 'source-over';
            context.lineWidth = 1;
			brushColor = 'yellow';
            cursorSmall.style.borderColor = brushColor;
            resizeEraser();
		});

        //Save Canvas

        function updateCanvasData(event){
            event.preventDefault();
            var dataURL = canvas.toDataURL();
            document.getElementById("canvas_data").value = dataURL;
            //document.querySelector("#submit-location-form").submit();
            event.target.form.submit();
        }

        document.querySelector("#submit-location-form").addEventListener("click", updateCanvasData);


	</script>
@endpush