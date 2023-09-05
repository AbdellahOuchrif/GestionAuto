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
    <form class="container-fluid"  action="{{ route('Location.update', $location->id) }}" method="POST" enctype="multipart/form-data" id="form-location">
      @csrf
      @method('PATCH')
            <div class="row">
                <div class="col-sm-6">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5>Locataire</h5>
                    </div>
                    <div class="row mb-2 mr-2 d-flex justify-content-around">
                        <a style="color:#0d6efd; text-decoration:underline; cursor:pointer;" role="button" data-toggle="modal" data-target=".modal-locataire-form" onclick="ModifierClient()">Modifier Locataire</a>
                        <a style="color: #0d6efd; text-decoration:underline; cursor:pointer;" role="button" data-toggle="modal" data-target=".modal-table-show">Changer Locataire</a>
                    </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Nom et prenom</b></em></label>
                    <div class="col-sm-9">
                        <input type="hidden" name="client_id" id="client_id" value="{{ $client->id }}">
                        <input type="text" class="form-control" name="nom_complet" placeholder="Nom et prenom" id="client_nom_complet_show" value="{{ $client->nom_complet }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Date de naissance</b></em></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="date_naissance" id="client_date_naissance_show" value="{{ $client->date_naissance }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu de naissance</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="Lieu_naissance" id="client_lieu_naissance_show" value="{{ $client->lieu_naissance }}" placeholder="Lieu" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Nationalite</b></em></label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" name="nationalite" id="client_nationalite_show" value="{{ $client->nationalite }}" placeholder="Nationalite" disabled>
                    </div>
                    <label class="col-sm-2 d-flex align-items-center"><em><b>Telephone</b></em></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="tel" id="client_tel_show" placeholder="Ex: 061321311" value="{{ $client->tel }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Adresse</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="adresse" id="client_adresse_show" placeholder="Adresse" value="{{ $client->adresse }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>C.I.N</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="num_cin" id="client_num_cin_show" placeholder="Numero CIN" value="{{ $client->num_cin }}"  disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="cin_delivre" id="client_cin_delivre_show" value="{{ $client->cin_delivre }}" disabled>
                    </div>
                    <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="cin_validite" id="client_cin_validite_show" value="{{ $client->cin_validite }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Permis</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="num_permis" placeholder="Numero Permis" id="client_num_permis_show"  value="{{ $client->num_permis }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="permis_delivre" id="client_permis_delivre_show" value="{{ $client->permis_delivre }}" disabled>
                    </div>
                    <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="permis_validite" id="client_permis_validite_show" value="{{ $client->permis_validite }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Passeport</b></em></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="num_passeport" id="client_num_passeport_show" placeholder="Numero Passeport" value="{{ $client->num_passeport }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control" name="passeport_delivre" id="client_passeport_delivre_show" value="{{ $client->passeport_delivre }}" disabled>
                    </div>
                    <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                    <div class="col-sm-4">
                        <input type="date" class="form-control" name="passeport_validite" id="client_passeport_validite_show" value="{{ $client->passeport_validite }}" disabled>
                    </div>
                  </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Date d'entree au Maroc</b></em></label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" name="client_date_maroc" value="{{ $location->client_date_maroc }}">
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
                            <input type="datetime-local" class="form-control" name="date_depart" id="date_depart" value="{{ $location->date_depart }}" required>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Lieu depart</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lieu_depart" placeholder="Lieu de depart" value="{{ $location->lieu_depart }}" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Date retour</b></em></label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control" name="date_retour" id="date_retour" value="{{ $location->date_retour }}" required>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Lieu retour</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lieu_retour" placeholder="Lieu de retour" value="{{ $location->lieu_retour }}" required>
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
                            <input type="hidden" name="type_etat" value="l">
                            <input type="number" class="form-control" name="kms" value="{{ $vehicule->km_compteur }}">
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
                        @foreach ( $piece_vehicule_details as $piece_vehicule_detail )
                            <div class="row col-sm-6 default-piece">
                                <div class="col-sm-6 mt-2 mb-2 text-capitalize">
                                    <span><em><b>{{ $piece_vehicule_detail->PieceVehicule->piece }}</b></em></span>
                                </div>
                                <div class="col-sm-6 mt-2 mb-2">
                                    <input class="ml-3" type="checkbox" name="piece_disponible[]" value="{{ $piece_vehicule_detail->piece_vehicule_id }}" onclick="PieceUncheck(this, {{ $piece_vehicule_detail->piece_vehicule_id }}, '{{ $piece_vehicule_detail->PieceVehicule->piece }}')" checked>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Observation</b></em></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="observation" cols="30" rows="6">{{ $etat_vehicule->observation }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                      <label class="col-sm-3 d-flex align-items-center"><em><b>Niveau Carburant</b></em></label>
                      <div class="col-sm-9">
                          <input class="form-control" type="number" name="niveau_carburant" min="0" max="100" value="{{ $etat_vehicule->niveau_carburant }}" id="percent-input">
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
                <div class="col-sm-6" id="prolongation-box">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5>Prolongation</h5>
                    </div>
                    @if(is_null($prolongation))
                        <div class="row mb-2 mr-2 d-flex justify-content-center">
                            <button type="button" class="btn btn-info" onclick="addFormBox('prolongation-box')">Oui</button>
                        </div>
                    @else
                        <div class="row mb-2 mr-2 d-flex justify-content-center">
                            <button type="button" class="btn btn-info" onclick="deleteFormBox('prolongation-box')">Non</button>
                            <input type="hidden" name="prolongation" value="True">
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Du</b></em></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="datetime-local" name="date_depart_prolongation" id="date_depart_prolongation" value="{{ $prolongation->date_depart_prolongation }}" required>
                            </div>
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Au</b></em></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="datetime-local" name="date_retour_prolongation" id="date_retour_prolongation" value="{{ $prolongation->date_retour_prolongation }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu Depart</b></em></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="lieu_depart_prolongation" id="lieu_depart_prolongation" value="{{ $prolongation->lieu_depart_prolongation }}" required>
                            </div>
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu Retour</b></em></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="lieu_retour_prolongation" id="lieu_retour_prolongation" value="{{ $prolongation->lieu_retour_prolongation }}" required>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Autre Frais</b></em></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="autre_frais_prolongation" id="autre_frais_prolongation" value="{{ $prolongation->autre_frais_prolongation }}" required>
                            </div>
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Nature</b></em></label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="nature" id="nature" value="{{ $prolongation->nature }}" required>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-6" id="changement-vehicule-box">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5>Changement Vehicule</h5>
                    </div>
                    @if(is_null($changement_vehicule))
                        <div class="row mb-2 mr-2 d-flex justify-content-center">
                            <button type="button" class="btn btn-info" onclick="addFormBox('changement-vehicule-box')">Oui</button>
                        </div>
                    @else
                    <div class="row mb-2 mr-2 d-flex justify-content-around">
                        <a style="color:#0d6efd; text-decoration:underline; cursor:pointer;" onclick="param('changement-vehicule')" role="button" data-toggle="modal" data-target=".modal-table-vehicule">Selectionner Vehicule</a>
                        <button type="button" class="btn btn-info" onclick="deleteFormBox('changement-vehicule-box')">Non</button>
                        <input type="hidden" name="changement_vehicule" value="True">
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Marque</b></em></label>
                        <div class="col-sm-3">
                            <input type="hidden" name="changement_vehicule_id" id="changement_vehicule_id" value="{{ $changement_vehicule->vehicule_id }}">
                            <input type="text" class="form-control" name="changement_marque" id="changement_marque" value="{{ $changement_vehicule->Vehicule->ModelVehicule->MarqueVehicule->marque }}" readonly required>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Modele</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="changement_model" id="changement_model" value="{{ $changement_vehicule->Vehicule->ModelVehicule->model }}" readonly required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Immatriculation</b></em></label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="changement_immatriculation" id="changement_immatriculation" value="{{ $changement_vehicule->Vehicule->immatriculation_num . ' | ' . $changement_vehicule->Vehicule->immatriculation_lettre . ' | ' . $changement_vehicule->Vehicule->immatriculation_region }}"  readonly required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Date et Heure</b></em></label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control" name="date_changement_vehicule" id="date_changement_vehicule" value="{{ $changement_vehicule->date_changement_vehicule }}" required>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Motif</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="motif" value="{{ $changement_vehicule->motif }}">
                        </div>
                    </div>
                    @endif
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
                            <input class="form-check-input facturation-unite" type="radio" name="facturation_unite" value="{{ \App\Enums\Unite::Jour->value }}" @if($facturation->unite == \App\Enums\Unite::Jour->value) checked @endif>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>heure</b></em></label>
                        <div class="col-sm-1">
                            <input class="form-check-input facturation-unite" type="radio" name="facturation_unite" value="{{ \App\Enums\Unite::Heure->value }}" @if($facturation->unite == \App\Enums\Unite::Heure->value) checked @endif>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>km</b></em></label>
                        <div class="col-sm-1">
                            <input class="form-check-input facturation-unite" type="radio" name="facturation_unite" value="{{ \App\Enums\Unite::Km->value }}" @if($facturation->unite == \App\Enums\Unite::Km->value) checked @endif>
                        </div>
                    </div>
                    <div class="row mb-2 box-facturation">
                        <input type="hidden" name="type_facturation" value="l">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Nbr kms</b></em></label>
                        <div class="col-sm-2">
                            <input class="form-control" type="number" name="nbr" step="any" id="nbr" value="{{ $facturation->nbr }}" onkeyup="CalculTotal()" required>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Prix/km</b></em></label>
                        <div class="col-sm-2">
                            <input class="form-control" type="number" name="prix" step="any" @if( $vehicule->unite == \App\Enums\Unite::Km->value) value="{{ $facturation->prix }}" @endif id="prix" onkeyup="CalculTotal()" required>
                        </div>
                        <label class="col-sm-1 d-flex align-items-center"><em><b>Total</b></em></label>
                        <div class="col-sm-2">
                            <input class="form-control" type="number" name="total_km" step="any" id="total" value="{{ $facturation->nbr * $facturation->prix  }}" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Frais de livraison</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="frais_livraison" id="frais_livraison" step="any" value="{{ $facturation->frais_livraison }}" onkeyup="CalculTotalHt()" required>
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Frais de reprise</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="frais_reprise" id="frais_reprise" step="any" value="{{ $facturation->frais_reprise }}" onkeyup="CalculTotalHt()" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Remise</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="remise" id="remise" step="any" value="{{ $facturation->remise }}" onkeyup="CalculTotalHt()" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Total HT</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" id="total_ht" step="any" value="{{ $facturation->nbr * $facturation->prix + $facturation->frais_livraison + $facturation->frais_reprise - $facturation->remise }}" onkeyup="CalculTotalTtc()" required>
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>TVA</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="tva" step="any" id="tva" value="{{ $facturation->tva }}" onkeyup="CalculTotalTtc()" value="0" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Total TTC</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" step="any" value="{{ ((($facturation->nbr * $facturation->prix + $facturation->frais_livraison + $facturation->frais_reprise - $facturation->remise) * $facturation->tva)/100) + ($facturation->nbr * $facturation->prix + $facturation->frais_livraison + $facturation->frais_reprise - $facturation->remise) }}" 
                            id="total_ttc" onkeyup="CalculRestePayer()" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Acompte</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" name="acompte" step="any" id="acompte" value="{{ $facturation->acompte }}" onkeyup="CalculRestePayer()" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Reste a payer</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="number" step="any" id="reste_a_payer" value="{{  ((($facturation->nbr * $facturation->prix + $facturation->frais_livraison + $facturation->frais_reprise - $facturation->remise) * $facturation->tva)/100) + ($facturation->nbr * $facturation->prix + $facturation->frais_livraison + $facturation->frais_reprise - $facturation->remise) - $facturation->acompte }}" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Mode de paiement</b></em></label>
                        <div class="col-sm-3">
                            <select class="form-control" name="mode_paiement_id" id="mode_paiement_id" required>
                                <option value="">Choisir...</option>
                                @foreach ($mode_paiements as $mode_paiement)
                                    <option @if ($facturation->mode_paiement_id == $mode_paiement->id) selected @endif value="{{ $mode_paiement->id }}">{{ $mode_paiement->mode }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Organisation</b></em></label>
                        <div class="col-sm-3 d-flex align-items-center">
                            <select class="form-control" name="organisation_id" id="organisation_id">
                                <option value="">Choisir...</option>
                                @foreach ($organisations as $organisation)
                                    <option @if ($facturation->organisation_id == $organisation->id) selected @endif value="{{ $organisation->id }}">{{ $organisation->organisation }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Reference paiement</b></em></label>
                        <div class="col-sm-5">
                            <input class="form-control" type="text" name="reference" value="{{ $facturation->reference }}" placeholder="Ex: Numero de cheque ...">
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
                                <option value="">Choisir...</option>
                                @foreach ($assurances as $assurance)
                                    <option @if($option_assurance_details[0]['assurance_id'] == $assurance->id) selected @endif value="{{ $assurance->id }}">{{ $assurance->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Option</b></em></label>
                        <div class="col-sm-3 d-flex align-items-center">
                            @if(!is_null($option_assurances))
                                <select class="form-control" name="option_id" id="option_id" @if(is_null($option_assurances)) disabled @endif>
                                    <option value="">Choisir...</option>
                                        @foreach($option_assurances as $option_assurance)
                                            <option data-details="{{ $option_assurance->details }}" value="{{ $option_assurance->id }}">{{ $option_assurance->designation }}</option>
                                        @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                    <div class="row mt-5 mb-3 selected-option-assurance">
                        @if(!is_null($option_assurance_details[0]['option_assurance_id']))
                            @foreach($option_assurance_details as $option)
                                <div class="row col-sm-12">
                                    <div class="col-sm-3 mt-2 mb-2 text-capitalize">
                                        <span><em><b>{{ $option->OptionAssurance->designation }}</b></em></span>
                                    </div>
                                    <div class="col-sm-2 mt-2 mb-2">
                                        <input class="ml-3" type="checkbox" name="option_id_assurance_details[]" value="1" onclick="OptionAssuranceUncheck(this, '{{ $option->option_assurance_id }}', '{{ $option->OptionAssurance->designation }}', '{{ $option->OptionAssurance->details }}')" checked>
                                    </div>
                                    <div class="col-sm-7 mt-2 mb-2 text-capitalize">
                                        <textarea name="details_assurance_details" class="form-control text-capitalize" rows="2" readonly>{{ $option->OptionAssurance->details }}</textarea>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Observation</b></em></label>
                        <div class="col-sm-9">
                            <textarea name="observation_assurance" id="observation_assurance" class="form-control" rows="3">{{ $location->observation_assurance }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Montant Franchise</b></em></label>
                        <div class="col-sm-3 input-group">
                            <input class="form-control" type="number" name="franchise" step="any" id="montant_franchise" value="{{ $facturation->franchise }}" required> 
                            <div class="input-group-append">
                                <span class="input-group-text"> DH </span>
                            </div>
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Pourcentage Franchise</b></em></label>
                        <div class="col-sm-3 input-group">
                            <input class="form-control" type="number" step="0.01" id="pourcentage_franchise" value="{{ $facturation->pourcentage_franchise }}" required>
                            <div class="input-group-append">
                                <span class="input-group-text"> % </span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Reference Franchise</b></em></label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="reference_franchise" value="{{ $facturation->reference_franchise }}" placeholder="Ex: Numero de cheque ...">
                        </div>
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Organisation Franchise</b></em></label>
                        <div class="col-sm-3 d-flex align-items-center">
                            <select class="form-control" name="franchise_organisation_id" id="franchise_organisation_id">
                                <option value="">Choisir...</option>
                                @foreach ($organisations as $organisation)
                                    <option @if($organisation->id == $facturation->franchise_organisation_id) selected @endif value="{{ $organisation->id }}">{{ $organisation->organisation }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            @if(!is_null($conducteur))
                <div class="row mt-4 mb-5">
                    <div class="col-sm-6" id="conducteur_show" style="display: none">
                        <div class="row d-flex justify-content-center mb-3">
                            <h5> 2<sup>eme</sup> Conducteur</h5>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Nom et prenom</b></em></label>
                            <div class="col-sm-9">
                                <input type="hidden" name="conducteur_id" id="conducteur_id">
                                <input type="text" class="form-control" name="nom_complet" value="{{ $conducteur->nom_complet }}"
                                    id="conducteur_nom_complet_show" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Date de naissance</b></em></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="date_naissance" value="{{ $conducteur->date_naissance }}"
                                    id="conducteur_date_naissance_show" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu de naissance</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="lieu_naissance" value="{{ $conducteur->lieu_naissance }}"
                                    id="conducteur_lieu_naissance_show" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Nationalite</b></em></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="nationalite" value="{{ $conducteur->nationalite }}"
                                    id="conducteur_nationalite_show" readonly>
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Telephone</b></em></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="tel" id="conducteur_tel_show" value="{{ $conducteur->tel }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Adresse</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="adresse" id="conducteur_adresse_show" value="{{ $conducteur->adresse }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>C.I.N</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="num_cin" id="conducteur_num_cin_show" value="{{ $conducteur->num_cin }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="cin_delivre" value="{{ $conducteur->cin_delivre }}"
                                    id="conducteur_cin_delivre_show" readonly>
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="cin_validite" value="{{ $conducteur->cin_validite }}"
                                    id="conducteur_cin_validite_show" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Permis</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="num_permis" id="conducteur_num_permis_show" value="{{ $conducteur->num_permis }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="permis_delivre" value="{{ $conducteur->permis_delivre }}"
                                    id="conducteur_permis_delivre_show" readonly>
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" name="permis_validite" value="{{ $conducteur->permis_validite }}"
                                    id="conducteur_permis_validite_show" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Passeport</b></em></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="num_passeport" value="{{ $conducteur->num_passeport }}"
                                    id="conducteur_num_passeport_show" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Delivre le</b></em></label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="passeport_delivre" value="{{ $conducteur->passeport_delivre }}"
                                    id="conducteur_passeport_delivre_show" readonly>
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Valable jusqu'a</b></em></label>
                            <div class="col-sm-4"> 
                                <input type="date" class="form-control" name="passeport_validite" value="{{ $conducteur->passeport_validite }}"
                                    id="conducteur_passeport_validite_show" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Date d'entree au Maroc</b></em></label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="conducteur_date_maroc" value="{{ $location->conducteur_date_maroc }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
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
        function deleteFormBox(value){
            if(value === 'changement-vehicule-box'){
                var box = document.getElementById('changement-vehicule-box');
                var form = '\
                    <div class="row d-flex justify-content-center mb-3">\
                    <h5>Changement Vehicule</h5>\
                    </div>\
                <div class="row mb-2 mr-2 d-flex justify-content-center">\
                            <button type="button" class="btn btn-info" onclick="addFormBox('+"'changement-vehicule-box'"+')">Oui</button>\
                        </div>\
                ';
                box.innerHTML = " ";
                box.innerHTML = form;
            }else{
                var box = document.getElementById('prolongation-box');
                var form = '\
                    <div class="row d-flex justify-content-center mb-3">\
                    <h5>Prolongation</h5>\
                    </div>\
                <div class="row mb-2 mr-2 d-flex justify-content-center">\
                            <button type="button" class="btn btn-info" onclick="addFormBox('+"'prolongation-box'"+')">Oui</button>\
                        </div>\
                ';
                box.innerHTML = " ";
                box.innerHTML = form;
            }
        }
        function addFormBox(value){
            if(value === 'changement-vehicule-box'){
                var box = document.getElementById('changement-vehicule-box');
                var form = '\
                    <div class="row d-flex justify-content-center mb-3">\
                    <h5>Changement Vehicule</h5>\
                    </div>\
                    <div class="row mb-2 mr-2 d-flex justify-content-around">\
                        <a style="color:#0d6efd; text-decoration:underline; cursor:pointer;" onclick="param('+"'changement-vehicule'"+')" role="button" data-toggle="modal" data-target=".modal-table-vehicule">Selectionner Vehicule</a>\
                        <button type="button" class="btn btn-info" onclick="deleteFormBox('+"'changement-vehicule-box'"+')">Non</button>\
                        <input type="hidden" name="changement_vehicule" value="True">\
                    </div>\
                    <div class="row mb-2">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Marque</b></em></label>\
                        <div class="col-sm-3">\
                            <input type="hidden" name="changement_vehicule_id" id="changement_vehicule_id">\
                            <input type="text" class="form-control" name="changement_marque" id="changement_marque" readonly required>\
                        </div>\
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Modele</b></em></label>\
                        <div class="col-sm-4">\
                            <input type="text" class="form-control" name="changement_model" id="changement_model" readonly required>\
                        </div>\
                    </div>\
                    <div class="row mb-2">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Immatriculation</b></em></label>\
                        <div class="col-sm-3">\
                            <input type="text" class="form-control" name="changement_immatriculation" id="changement_immatriculation" readonly required>\
                        </div>\
                    </div>\
                    <div class="row mb-2">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Date et Heure</b></em></label>\
                        <div class="col-sm-3">\
                            <input type="datetime-local" class="form-control" name="date_changement_vehicule" id="date_changement_vehicule" required>\
                        </div>\
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Motif</b></em></label>\
                        <div class="col-sm-4">\
                            <input type="text" class="form-control" name="motif">\
                        </div>\
                    </div>\
                    ';
                box.innerHTML = "";
                box.innerHTML = form;
            }else{
                var box = document.getElementById('prolongation-box');
                var form = '\
                    <div class="row d-flex justify-content-center mb-3">\
                        <h5>Prolongation</h5>\
                    </div>\
                    <div class="row mb-2 mr-2 d-flex justify-content-center">\
                            <button type="button" class="btn btn-info" onclick="deleteFormBox('+"'prolongation-box'"+')">Non</button>\
                            <input type="hidden" name="prolongation" value="True">\
                        </div>\
                    <div class="row mb-2">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Du</b></em></label>\
                        <div class="col-sm-3">\
                            <input class="form-control" type="datetime-local" name="date_depart_prolongation" id="date_depart_prolongation" required>\
                        </div>\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Au</b></em></label>\
                        <div class="col-sm-3">\
                            <input class="form-control" type="datetime-local" name="date_retour_prolongation" id="date_retour_prolongation" required>\
                        </div>\
                    </div>\
                    <div class="row mb-2">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu Depart</b></em></label>\
                        <div class="col-sm-3">\
                            <input class="form-control" type="text" name="lieu_depart_prolongation" id="lieu_depart_prolongation" required>\
                        </div>\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Lieu Retour</b></em></label>\
                        <div class="col-sm-3">\
                            <input class="form-control" type="text" name="lieu_retour_prolongation" id="lieu_retour_prolongation" required>\
                        </div>\
                    </div>\
                    <div class="row mb-2">\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Autre Frais</b></em></label>\
                        <div class="col-sm-3">\
                            <input class="form-control" type="text" name="autre_frais_prolongation" id="autre_frais_prolongation" required>\
                        </div>\
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Nature</b></em></label>\
                        <div class="col-sm-3">\
                            <input class="form-control" type="text" name="nature" id="nature" required>\
                        </div>\
                    </div>\
                    ';
                box.innerHTML = "";
                box.innerHTML = form;
            }
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

        function ModifierClient(){
            id  = $("#client_id").val();
            nom_complet = $("#client_nom_complet_show").val();
            date_naissance = $("#client_date_naissance_show").val();
            lieu_naissance = $("#client_lieu_naissance_show").val();
            nationalite = $("#client_nationalite_show").val();
            tel = $("#client_tel_show").val();
            adresse = $("#client_adresse_show").val();
            num_cin = $("#client_num_cin_show").val();
            cin_delivre = $("#client_cin_delivre_show").val();
            cin_validite = $("#client_cin_validite_show").val();
            num_permis = $("#client_num_permis_show").val();
            permis_delivre = $("#client_permis_delivre_show").val();
            permis_validite = $("#client_permis_validite_show").val();
            num_passeport = $("#client_num_passeport_show").val();
            passeport_delivre = $("#client_passeport_delivre_show").val();
            passeport_validite = $("#client_passeport_validite_show").val();

            $("#client_id_update").val(id);
            $("#client_nom_complet_update").val(nom_complet);
            $("#client_date_naissance_update").val(date_naissance);
            $("#client_lieu_naissance_update").val(lieu_naissance);
            $("#client_nationalite_update").val(nationalite);
            $("#client_tel_update").val(tel);
            $("#client_adresse_update").val(adresse);
            $("#client_num_cin_update").val(num_cin);
            $("#client_cin_delivre_update").val(cin_delivre);
            $("#client_cin_validite_update").val(cin_validite);
            $("#client_num_permis_update").val(num_permis);
            $("#client_permis_delivre_update").val(permis_delivre);
            $("#client_permis_validite_update").val(permis_validite);
            $("#client_num_passeport_update").val(num_passeport);
            $("#client_passeport_delivre_update").val(passeport_delivre);
            $("#client_passeport_validite_update").val(passeport_validite);   
        }

      
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
        handleUpdateKeyUp();
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

        //Remove already selected piece

        function PieceUncheck(selectedoption, value, text){
            selectedOption = selectedoption.parentNode.parentNode;
            selectedOption.remove();
            var newOption = $('<option value="' +  value + '">' + text + '</option>');
            $('#piece_vehicule_select').append(newOption);
        }

        function OptionAssuranceUncheck(selectedoption, id, designation, details){
            selectedOption = selectedoption.parentNode.parentNode;
            selectedOption.remove();
            var newOption = $('<option data-details="'+ details +'" value="' +  id + '">' + designation + '</option>');
            $('#option_id').append(newOption);
        }


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
                    var selectedOptionDiv = $('<div class="row col-sm-12"><div class="col-sm-3 mt-2 mb-2 text-capitalize"><span><em><b>' + selectedText + '</b></em></span></div><div class="col-sm-2 mt-2 mb-2"><input class="ml-3" type="checkbox" name="option_id_assurance_details[]" value="' + selectedValue + '" checked></div><div class="col-sm-7 mt-2 mb-2 text-capitalize"><textarea name="details_assurance_details" class="form-control text-capitalize" rows="2" readonly>'+ selectedDetail +'</textarea></div></div>');
                
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
            TotalHt.value = (+total.value + +FraisLivraison.value + +FraisReprise.value + +Remise.value).toFixed(2); 
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

        // this updates the original vehicule and also allows us to add a new vehicule that has been used on the same location 
        function UpdateVehicule(changement_vehicule, vehicule_id, marque, model, immatriculation_num, immatriculation_region, immatriculation_lettre){
            if(changement_vehicule === 'changement-vehicule'){
                const changement_vehicule_id = document.getElementById('changement_vehicule_id');
                const changement_marque = document.getElementById('changement_marque');
                const changement_model = document.getElementById('changement_model');
                const changement_immatriculation = document.getElementById('changement_immatriculation');

                changement_vehicule_id.value = vehicule_id;
                changement_marque.value = marque;
                changement_model.value = model;
                changement_immatriculation.value = immatriculation_num +' | '+ immatriculation_lettre +' | '+ immatriculation_region;
            }else{
                const vehicule_id_vehicule = document.getElementById('vehicule_id');
                const marque_vehicule = document.getElementById('marque');
                const model_vehicule = document.getElementById('model');
                const immatriculation_vehicule = document.getElementById('immatriculation');

                vehicule_id_vehicule.value = vehicule_id;
                marque_vehicule.value = marque;
                model_vehicule.value = model;
                immatriculation_vehicule.value = immatriculation_num +' | '+ immatriculation_lettre +' | '+ immatriculation_region;
            }
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

            //set the dataURL on top of the canvas 

            const image = new Image();
            image.onload = function() {
                context.drawImage(image, 0, 0, canvas.width, canvas.height);
            };
            image.src = '{{ $vehicule->canvas_data }}';
    
    
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

                var form = document.getElementById('form-location');
                var inputs = form.querySelectorAll('input[required]');
                var isValid = true;

                for (var i = 0; i < inputs.length; i++) {
                    if (!inputs[i].value) {
                        isValid = false;
                        inputs[i].setCustomValidity('This field is required.'); // Set custom error message
                        inputs[i].reportValidity(); // Display error message
                        inputs[i].classList.add('required-field'); // Add a custom class for highlighting
                    } else {
                        inputs[i].setCustomValidity(''); // Clear any previous custom error message
                        inputs[i].classList.remove('required-field'); // Remove the custom class if previously added
                    }
                }

                if (isValid) {
                    var dataURL = canvas.toDataURL();
                    document.getElementById('canvas_data').value = dataURL;
                    event.target.form.submit();
                } 

            }

            document.querySelector("#submit-location-form").addEventListener("click", updateCanvasData);
    
    
        </script>
@endpush