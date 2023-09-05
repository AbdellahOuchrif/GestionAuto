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
    <form class="container-fluid"  action="{{ route('Location.storeRetour') }}" method="POST" enctype="multipart/form-data">
      @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="row d-flex justify-content-center mb-3">
                        <h5>Locataire</h5>
                    </div>
                  <div class="row mb-2">
                    <label class="col-sm-3 d-flex align-items-center"><em><b>Nom et prenom</b></em></label>
                    <div class="col-sm-9">
                        <input type="hidden" name="client_id" id="client_id">
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
                            <input type="datetime-local" class="form-control" name="date_depart" id="date_depart" value="{{ $location->date_depart }}" disabled>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Lieu depart</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lieu_depart" placeholder="Lieu de depart" value="{{ $location->lieu_depart }}"
                                disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Date retour</b></em></label>
                        <div class="col-sm-3">
                            <input type="datetime-local" class="form-control" name="date_retour" id="date_retour" value="{{ $location->date_retour }}"
                                disabled>
                        </div>
                        <label class="col-sm-2 d-flex align-items-center"><em><b>Lieu retour</b></em></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="lieu_retour" placeholder="Lieu de retour" value="{{ $location->lieu_retour }}"
                                disabled>
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
                            <input type="number" class="form-control" value="{{ $vehicule->km_compteur }}" disabled>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label class="col-sm-12 text-center"><b><u>Pieces Vehicule</u></b></label>
                    </div>
                    <div class="row mt-3 mb-3">
                        @foreach ( $piece_vehicule_details as $piece_vehicule_detail )
                            <div class="row col-sm-6">
                                <div class="col-sm-6 mt-2 mb-2 text-capitalize">
                                    <span><em><b>{{ $piece_vehicule_detail->PieceVehicule->piece }}</b></em></span>
                                </div><div class="col-sm-6 mt-2 mb-2">
                                    <input class="ml-3" type="checkbox" checked disabled>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>Observation</b></em></label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="observation" cols="30" rows="6" disabled>{{ $etat_vehicule->observation }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                      <label class="col-sm-3 d-flex align-items-center"><em><b>Niveau Carburant</b></em></label>
                      <div class="col-sm-9">
                          <input class="form-control" type="number" name="niveau_carburant" min="0" max="100" value="{{ $etat_vehicule->niveau_carburant }}" disabled>
                      </div>
                    </div>
                </div>
                <div class="col-sm-6 mt-4 mb-5">
                    <div class="row">
                        <div class="col d-flex flex-column align-items-center">
                            <div class="canvas-container-livraison" style="cursor: not-allowed; pointer-events: none;">
                                <img id="car-image-livraison" src="{{ asset('images/vue_croque_voiture.png') }}">
                                <canvas id="canvas-livraison" width="800" height="448"></canvas>
                                <input type="hidden" name="canvas_data_livraison" id="canvas_data_livraison">
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-sm-12">
                    <div class="row d-flex justify-content-center mb-5">
                        <h5>Etat Vehicule Retour</h5>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row mb-2">
                        <label class="col-sm-3 d-flex align-items-center"><em><b>km compteur</b></em></label>
                        <div class="col-sm-9">
                            <input type="hidden" name="type_etat" value="r"><!-- type d'etat vehicule l == livraison-->
                            <input type="number" class="form-control" name="kms"
                                value="{{ $etat_vehicule->kms }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3"><em><b>Pieces Vehicule</b></em></label>
                        <div class="col-sm-9">
                            <select class="form-control" name="piece_vehicule_id" id="piece_vehicule_select">
                                <option value="" selected>Choisir...</option>
                                @foreach ($piece_vehicule_details as $piece_vehicule_detail )
                                    <option value="{{ $piece_vehicule_detail->id }}">{{ $piece_vehicule_detail->PieceVehicule->piece }}</option>
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
                @if(!is_null($prolongation))
                    <div class="col-sm-6" id="prolongation-box">
                        <div class="row d-flex justify-content-center mb-3">
                            <h5>Prolongation</h5>
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
                    </div>
                @endif
                @if(!is_null($changement_vehicule))
                    <div class="col-sm-6" id="changement-vehicule-box">
                        <div class="row d-flex justify-content-center mb-3">
                            <h5>Changement Vehicule</h5>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Marque</b></em></label>
                            <div class="col-sm-3">
                                <input type="hidden" name="changement_vehicule_id" id="changement_vehicule_id" value="{{ $changement_vehicule->vehicule_id }}">
                                <input type="text" class="form-control" name="changement_marque" id="changement_marque" value="{{ $changement_vehicule->Vehicule->ModelVehicule->MarqueVehicule->marque }}" readonly>
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Modele</b></em></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="changement_model" id="changement_model" value="{{ $changement_vehicule->Vehicule->ModelVehicule->model }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Immatriculation</b></em></label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="changement_immatriculation" id="changement_immatriculation" value="{{ $changement_vehicule->Vehicule->immatriculation_num . ' | ' . $changement_vehicule->Vehicule->immatriculation_lettre . ' | ' . $changement_vehicule->Vehicule->immatriculation_region }}"  readonly>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <label class="col-sm-3 d-flex align-items-center"><em><b>Date et Heure</b></em></label>
                            <div class="col-sm-3">
                                <input type="datetime-local" class="form-control" name="date_changement_vehicule" id="date_changement_vehicule" value="{{ $changement_vehicule->date_changement_vehicule }}">
                            </div>
                            <label class="col-sm-2 d-flex align-items-center"><em><b>Motif</b></em></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="motif" value="{{ $changement_vehicule->motif }}">
                            </div>
                        </div>
                    </div>
                @endif
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
                        <div class="col-sm-6">
                            <input type="text" class="form-control text-capitalize" value="{{ $option_assurance_details[0]->Assurance->type }}" readonly>
                        </div>
                    </div>
                    <div class="row mt-5 mb-3 selected-option-assurance">
                        <div class="col-sm-3">
                            <label class="d-flex align-items-center"><em><b>Option</b></em></label>
                        </div>
                        <div class="col-sm-9">
                            @if(!is_null($option_assurance_details[0]['assurance_id']))
                                @foreach ( $option_assurance_details as $option )
                                    <div class="row col-sm-12">
                                        <div class="col-sm-3 mt-2 mb-2 text-capitalize">
                                            <span><em><b>{{ $option->OptionAssurance->designation }}</b></em></span>
                                        </div>
                                        <div class="col-sm-9 mt-2 mb-2 text-capitalize">
                                            <textarea name="details_assurance_details" class="form-control text-capitalize" rows="2" disabled>{{ $option->OptionAssurance->details }}</textarea>
                                        </div>
                                    </div>
                                @endforeach 
                            @endif
                        </div> 
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
                    <div class="col-sm-6" id="conducteur_show">
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
    /** Canvas Livraison **/
		// Récupération du contexte de dessin
		const canvasLivraison = document.getElementById('canvas-livraison');
		const contextLivraison = canvasLivraison.getContext('2d');
        const canvasContainerLivraison = document.querySelector('.canvas-container-livraison');
        //set the dataURL on top of the canvas 

        const imageLivraison = new Image();
        imageLivraison.onload = function() {
            contextLivraison.drawImage(imageLivraison, 0, 0, canvasLivraison.width, canvasLivraison.height);
        };
        imageLivraison.src = '{{ $vehicule->canvas_data }}';

    /** Canvas Retour **/
        
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
            var dataURL = canvas.toDataURL();
            document.getElementById("canvas_data").value = dataURL;
            //document.querySelector("#submit-location-form").submit();
            event.target.form.submit();
        }

        document.querySelector("#submit-location-form").addEventListener("click", updateCanvasData);



	</script>
@endpush