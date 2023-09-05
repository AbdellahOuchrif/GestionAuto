<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Rental Contract</title>
    <style>

        @font-face {
            font-family: 'Amiri';
            src: url("{{ $data['amiri'] }}") format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
        }

        h1, img { 
            margin: 0;
        }

        img {
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
        }

        ul {
            list-style: none;
        }

        .small-text {
            font-size: 13px;
        }

        .font-amiri {
            font-family: "Amiri";
        }

        .page-left{
            width: 50%;
            margin: 2px 0 2px 2px;
        }

        .page-right{
            width: 50%;
            margin: 2px 2px 2px 0;
            position: absolute;
            right: 0%;
            top: 0%;
        }

        .header {
            height: 100px;
        }

        .company-name {
            font-size: 35px;
        }

        .piece-vehicule {
            width: 100%;
            margin-top: 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        .piece-vehicule-column {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            position: absolute;
            text-transform: capitalize;
        }

        .check_svg {
            position:absolute;
            left: 40%;
        }

        .personne-table td{
            line-height: 22px;
        }

        .champ {
            font-size: 16px;
            font-weight: 500;
        }

        .informations {
            font-size: 17px;
            font-weight: 400;
            padding-left: 10px;
            text-transform: capitalize;
        }
        
        .section-title {
            font-size: 21px;
            margin-bottom: 6px;
        }

        .section-title-column {
            border: 1px solid black;
        }

        .image-wrapper {
            position: relative;
            padding-left: 65px;
        }

        #canvas {
            position: absolute;
            top: 0;
            left: 65px;
            width: 260px;
            height: 145.6px;
        }

    </style>
</head>
<body>
    <section class="page">
        <section class="page-left">
            <section class="header company-details">
                <div class="company-upper-wrapper">
                    <table style="border-spacing: 10px 3px; border-collapse: separate;">
                        <tr>
                            <td><img src="{{ $data['car_logo'] }}" width="79px" height="27.32px"></td>
                            <td><h1 class="company-name">ZAS CARS</h1></td>
                        </tr>
                    </table>
                </div>
                <div class="company-bottom-wrapper">
                    <table>
                        <tr>
                            <td class="small-text ">Programme Tiguemi it, N° 57 Imm N° 28 Av, Des Fat - Agadir</td>
                        </tr>
                        <tr>
                            <td class="small-text "><b>Tel/Fax: </b><span style="font-size:12px">05 28 84 12 21</span><b> E-mail: </b><span style="font-size:13.5px">zas.car@menara.ma</span></td>
                        </tr>
                        <tr>
                            <td class="small-text"><b>GSM: </b><span style="font-size:12px">06 75 36 44 13 / 06 67 19 24 44</span></td>
                        </tr>
                    </table>
                </div>
            </section>
            <section style="width: 100%;" class="page-left-middle-border">
                <section style="width: 100%;" class="personne locataire">
                    <div class="personne-middle-wrapper">
                        <table class="personne-table" style="width: 100%; margin-top: 20px; margin-bottom: 10px;"> 
                            <tr>
                                <th class="section-title-column" colspan="2"><h3 class="section-title" style="">Locataire</h3></th>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Nom et Prenom: <span class="informations">{{ replaceNullWithPeriod($data['client']->nom_complet) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ" style="padding-right:5px" colspan="2">Adresse: <span class="informations">{{ replaceNullWithPeriod($data['client']->adresse) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Tel: <span class="informations">{{ replaceNullWithPeriod($data['client']->tel) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">C.I.N.N°: <span class="informations">{{ replaceNullWithPeriod($data['client']->num_cin) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Delivre le: <span class="informations">{{ replaceNullWithPeriod($data['client']->cin_delivre) }}</span></td> 
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">{{ replaceNullWithPeriod($data['client']->cin_validite) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">N° Permis: <span class="informations">{{ replaceNullWithPeriod($data['client']->num_permis) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Delivre le: <span class="informations">{{ replaceNullWithPeriod($data['client']->permis_delivre) }}</span></td> 
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">{{ replaceNullWithPeriod($data['client']->permis_validite) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">N° Passeport: <span class="informations">{{ replaceNullWithPeriod($data['client']->num_passeport) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Delivre le: <span class="informations">{{ replaceNullWithPeriod($data['client']->passeport_delivre) }}</span></td> 
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">{{ replaceNullWithPeriod($data['client']->passeport_validite) }}</span></td>
                            </tr>
                        </table>
                    </div>
                </section>
                <section class="personne conducteur">
                    <div style="width: 100%;" class="personne-middle-wrapper">
                        @if(!is_null($data['conducteur']))
                            <table class="personne-table" style="width: 99%;" id="conducteur-table"> 
                                <tr>
                                    <th class="section-title-column" colspan="2"><h3 class="section-title">2<sup>eme</sup> Conducteur</h3></th>
                                </tr>
                                <tr>
                                    <td colspan="2" class="champ">Nom et Prenom: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->nom_complet) }} </span></td>
                                </tr>
                                <tr>
                                    <td class="champ" style="padding-right:5px" colspan="2">Adresse: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->adresse) }}</span></td>
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">Tel: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->tel) }}</span></td>
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">C.I.N.N°: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->num_cin) }}</span></td>
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">Delivre le: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->cin_delivre) }}</span></td> 
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->cin_validite) }}</span></td>
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">N° Permis: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->num_permis) }}</span></td>
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">Delivre le: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->permis_delivre) }}</span></td> 
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->permis_validite) }}</span></td>
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">N° Passeport: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->num_passeport) }}</span></td>
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">Delivre le: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->passeport_delivre) }}</span></td> 
                                </tr>
                                <tr>
                                    <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">{{ replaceNullWithPeriod($data['conducteur']->passeport_validite) }}</span></td>
                                </tr>
                            </table>
                        @else
                        <table class="personne-table" style="width: 99%;"> 
                            <tr>
                                <th class="section-title-column" colspan="2"><h3 class="section-title">2<sup>eme</sup> Conducteur</h3></th>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Nom et Prenom: <span class="informations">.................................................</span></td>
                            </tr>
                            <tr>
                                <td class="champ" style="padding-right:5px;" colspan="2">Adresse: <span class="informations">................................................................. ..................................................................................</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Tel: <span class="informations">.................................................</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">C.I.N.N°: <span class="informations">.................................................</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Delivre le: <span class="informations">.................................................</span></td> 
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">.................................................</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">N° Permis: <span class="informations">................................................</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Delivre le: <span class="informations">.................................................</span></td> 
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">.................................................</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">N° Passeport: <span class="informations">.................................................</span></td>
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Delivre le: <span class="informations">.................................................</span></td> 
                            </tr>
                            <tr>
                                <td class="champ" colspan="2">Valable jusqu'au: <span class="informations">.................................................</span></td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </section>
            </section>   
            <section class="assurance">
                <table style="width:99%">
                    <tr>
                        <th class="section-title-column" style="text-align: center;"><h3 class="section-title">Assurance</h3></th>
                    </tr>
                    <tr>
                        <td class="champ">Type: <span class="informations">@if(count($data['assurance']) == 0) {{ periods() }} @else {{  replaceNullWithPeriod($data['assurance'][0]->Assurance->type) }} @endif</span></td>
                    </tr>
                    <tr>
                        <td class="champ">Options: <span class="informations">@if(count($data['assurance']) != 0 && !is_null($data['assurance'][0]->OptionAssurance->designation)) @foreach ( $data['assurance'] as $option) @if(!($loop->first)) / @endif {{ $option->OptionAssurance->designation }} @endforeach @else {{ periods() }} @endif</span></td>
                    </tr>
                    <tr>
                        <td class="champ">Montant Franchise: <span class="informations">{{ $data['facturation']->franchise }} DH</span></td>
                    </tr>
                    <tr>
                        <td class="champ">Methode de paiement: <span class="informations">cheque</span></td>
                    </tr>
                </table>
            </section>
            <section class="footer-container">
                <table style="width: 199%; border-bottom: 1px black solid;" >
                    <tr>
                        <th class="section-title-column"><h3 class="section-title">Reglement</h3></th>
                        <th class="section-title-column" style="text-align: center;"><h5>Locataire</h5></th><th class="section-title-column" style="text-align: center;"><h5>2<sup>eme</sup> conducteur</h5></th>
                    </tr>
                    <tr>
                        <td class="small-text" style="width: 100%;">- J'ai Lu et accepte les tarifs et conditions appliquees et stipulees ci-contre.</td>
                        <td rowspan="2" style="width: 50%; border-left: 1px black solid; border-right: 1px black solid;"></td><td rowspan="2" style="width: 50%; border-left: 1px black solid; border-right: 1px black solid;"></td>
                    </tr>
                    <tr>
                        <td class="small-text">- Je m'engage a rendre la voiture en bon etat tel qu'elle m'a ete confiee.</td>
                        <td></td><td></td>
                    </tr>
                    <tr>
                        <td class="small-text">- Je suis le seul responsable des infractions de la legislation en vigueur relative a la circulation routiere.</td>
                        <td class="section-title-column" colspan="2" style="text-align: center; "><h5>Signature et Cachet d'agent</h5></td>
                    </tr>
                    <tr>
                        <td style="height: 50px; width:100%"></td>
                        <td style="width:50%" style="border-left: 1px black solid;"></td><td style="width: 50%; border-right: 1px black solid;"></td>
                    </tr>
                </table>
            </section>
        </section>
        <section class="page-right">
            <section class="header" style="width: 100%;">
                <table style="width: 100%;padding-right: 10px;">
                    <tr>
                        <th style="width: 100%; text-align: right"><h3>CONTRAT DE LOCATION</h3></th>
                    </tr>
                    <tr>
                        <th style="width: 100%; text-align: right"><h3>RENTAL AGREEMENT</h3></th>
                    </tr>
                    <tr>
                        <td style="text-align: right;"><u>N° <span>0055483</span></u></td>
                    </tr>
                </table>
            </section>
            <section class="page-right-middle-border">
                <section style="width:100%" class="vehicule">
                    <table style="width:100%; margin-top: 20px; margin-bottom: 10px;">
                        <tr>
                            <th colspan="2" class="section-title-column" style="text-align:center"><h3 class="section-title">Vehicule En Location</h3></th>
                        </tr>
                        <tr>
                            <td colspan="2" class="champ">Marque / Modele: <span class="informations">{{ $data['vehicule']->ModelVehicule->MarqueVehicule->marque ." ". $data['vehicule']->ModelVehicule->model}}</span></td>
                        </tr>
                        <tr>
                            <td class="champ">Immatriculation: <span class="informations">{{ $data['vehicule']->immatriculation_num ." | ". $data['vehicule']->immatriculation_region . " | " }}</span></td>
                            <td style="position: absolute;"><span style="font-family: Amiri, serif; font-size: 23px; position:absolute; top: -2.1%; left: -30%">{{ $data['vehicule']->immatriculation_lettre }}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="champ">Lieu de depart: <span class="informations">{{ $data['location']->lieu_depart }}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="champ">Date et heure de depart: <span class="informations">{{ $data['location']->date_depart }}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="champ">Lieu de retour: <span class="informations">{{ $data['location']->lieu_retour }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="champ">Date et heure de retour: <span class="informations">{{ $data['location']->date_retour }}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="champ">Duree de location: <span class="informations" >{{ calculDateTime($data['location']->date_depart, $data['location']->date_retour) }}</span></td>
                        </tr>
                    </table>
                </section>
                @if (!is_null($prolongation))
                    <section class="prolongation">
                        <table style="width:100%">
                            <tr>
                                <th class="section-title-column" style="text-align: center;"><h3 class="section-title">Prolongation</h3></th>
                            </tr>
                            <tr>
                                <td class="champ">Du: <span class="informations">{{ replaceNullWithPeriod($prolongation->date_depart_prolongation) }}</span> <span class="champ" style="padding-left: 10px">Au: </span><span class="informations">{{ replaceNullWithPeriod($prolongation->date_retour_prolongation) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ">Lieu depart: <span class="informations">{{ replaceNullWithPeriod($prolongation->lieu_depart_prolongation) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ">Lieu Retour: <span class="informations">{{ replaceNullWithPeriod($prolongation->lieu_retour_prolongation) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ">Autre Frais: <span class="informations">{{ replaceNullWithPeriod($prolongation->autre_frais_prolongation) }} DH</span></td>
                            </tr>
                            <tr>
                                <td class="champ">Nature: <span class="informations">{{ replaceNullWithPeriod($prolongation->nature) }}</span></td>
                            </tr>
                        </table>
                    </section>
                @else
                <section class="prolongation">
                    <table style="width:100%">
                        <tr>
                            <th class="section-title-column" style="text-align: center;"><h3 class="section-title">Prolongation</h3></th>
                        </tr>
                        <tr>
                            <td class="champ">Du: <span class="informations">.................................................</span> <span class="champ" style="padding-left: 10px">Au: </span><span class="informations">.................................................</span></td>
                        </tr>
                        <tr>
                            <td class="champ">Lieu depart: <span class="informations">.................................................</span></td>
                        </tr>
                        <tr>
                            <td class="champ">Lieu Retour: <span class="informations">.................................................</span></td>
                        </tr>
                        <tr>
                            <td class="champ">Autre Frais: <span class="informations">.................................................</span></td>
                        </tr>
                        <tr>
                            <td class="champ">Nature: <span class="informations">.................................................</span></td>
                        </tr>
                    </table>
                </section>
                @endif
                @if (!is_null($changement_vehicule))
                    <section class="changement-vehicule">
                        <table style="width:100%; margin-top: 20px; margin-bottom: 10px;">
                            <tr>
                                <th colspan="2" class="section-title-column" style="text-align:center"><h3 class="section-title">Changement Vehicule</h3></th>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Marque / Modele: <span class="informations">{{ replaceNullWithPeriod($changement_vehicule->Vehicule->ModelVehicule->MarqueVehicule->marque) }} {{ replaceNullWithPeriod($changement_vehicule->Vehicule->ModelVehicule->model) }}</span></td>
                            </tr>
                            <tr>
                                <td class="champ">Immatriculation: <span class="informations">{{ replaceNullWithPeriod($changement_vehicule->Vehicule->immatriculation_num) }} | {{ replaceNullWithPeriod($changement_vehicule->Vehicule->immatriculation_region) }} |</span></td>
                                <td style="position: absolute;"><span style="font-family: Amiri, serif; font-size: 23px; position:absolute; top: -3.1%; left: -32%">{{ replaceNullWithPeriod($changement_vehicule->Vehicule->immatriculation_lettre) }}</span></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Date et heure de depart: <span class="informations">{{ replaceNullWithPeriod($changement_vehicule->date_changement_vehicule) }}</span></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Motif: <span class="informations">{{ replaceNullWithPeriod($changement_vehicule->motif) }}</span></td>
                            </tr>
                        </table>
                    </section>
                @else
                    <section class="changement-vehicule">
                        <table style="width:100%; margin-top: 20px; margin-bottom: 10px;">
                            <tr>
                                <th colspan="2" class="section-title-column" style="text-align:center"><h3 class="section-title">Changement Vehicule</h3></th>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Marque / Modele: <span class="informations">.....................................................</span></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Immatriculation: <span class="informations">.....................................................</span></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Date et heure de depart: <span class="informations">................................................</span></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="champ">Motif: <span class="informations">................................................................</span></td>
                            </tr>
                        </table>
                    </section>
                @endif
                <section class="etat">
                    <table style="width: 100%;">
                        <tr style="width: 100%;">
                            <th class="section-title-column" style="text-align: center;"><h3 class="section-title">Etat Vehicule En Livraison</h3></th>
                        </tr>
                        <tr>
                            <td class="image-wrapper"><img id="image" src="{{ $data['car_inspection'] }}" width="260px" height="145.6px"><img id="canvas" src="{{ $data['car_canvas'] }}"></td>
                        </tr>
                    </table>
                    <table class="piece-vehicule">
                        <tr style="width: 100%">
                            <td style="width: 30%" class="piece-vehicule-column">km depart</td><td class="piece-vehicule-column" style="width: 20%">{{ $etat->kms }}</td><td class="piece-vehicule-column" style="width: 30%">Niveau carburant</td><td class="piece-vehicule-column" style="width: 20%">{{ $etat->niveau_carburant }}</td>
                        </tr>
                        @for ($i=0; $i < count($pieces) && $i < 8; $i++)
                            <tr>
                                <td class="piece-vehicule-column">{{ $pieces[$i]->PieceVehicule->piece }}</td><td class="piece-vehicule-column"><img class="check_svg" src="{{ $data['check_svg'] }}" width="1" height="1"></td>
                                @if ($i+1 < count($pieces))
                                    <td class="piece-vehicule-column">{{ $pieces[$i++]->PieceVehicule->piece }}</td><td class="piece-vehicule-column"><img class="check_svg" src="{{ $data['check_svg'] }}" width="1" height="1"></td>
                                @else
                                <td class="piece-vehicule-column"></td><td class="piece-vehicule-column"></td>
                                @endif
                            </tr>
                        @endfor
                    </table>
                </section>
            </section>
        </section>
    </section>
</body>
</html>

