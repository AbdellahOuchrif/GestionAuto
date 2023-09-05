<?php

namespace App\Http\Controllers;

use PDF;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Enums\Unite;
use App\Models\Diver;
use App\Models\Client;
use App\Models\Location;
use App\Models\Vehicule;
use App\Models\Assurance;
use App\Models\Conducteur;
use App\Models\Facturation;
use App\Models\Reservation;
use App\Models\EtatVehicule;
use App\Models\ModePaiement;
use App\Models\Organisation;
use App\Models\Prolongation;
use Illuminate\Http\Request;
use App\Models\PieceVehicule;
use App\Models\ArabicAlphabet;
use App\Models\AssuranceDetail;
use App\Models\OptionAssurance;
use App\Models\PieceVehiculeDetail;
use App\Models\ChangementVehiculeLocation;

class LocationController extends Controller
{
    public function contrat(string $id){

        $location = Location::where('id', $id)->first();
        $client = Client::where('id', $location->client_id)->first();
        $vehicule = Vehicule::where('id', $location->vehicule_id)->first();
        $conducteur = Conducteur::where('id', $location->conducteur_id)->first();
        $facturation = Facturation::where('location_id', $location->id)->first();
        $assurance = AssuranceDetail::where('location_id', $location->id)->get();
        $prolongation = Prolongation::where('location_id', $location->id)->first();
        $changement_vehicule = ChangementVehiculeLocation::where('location_id', $id)->first();
        $etat = EtatVehicule::where('location_id', $id)->where('type', 'LIKE', 'l')->first();
        $pieces = PieceVehiculeDetail::where('etat_vehicule_id', $etat->id)->get();
        $data = [
            'car_logo' => public_path('images/test_image.png'),
            'car_inspection' => public_path('images/vue_croque_voiture.png'),//this is the image under the canvas
            'car_canvas' => $vehicule->canvas_data,//this is the canvas
            'check_svg' => public_path('images/check.svg'),
            'amiri' =>  storage_path('app\public\fonts\Amiri-Regular.ttf'),
            'location' => $location,
            'client' => $client,
            'vehicule' => $vehicule,
            'conducteur' => $conducteur,
            'facturation' => $facturation,
            'assurance' => $assurance,
            'prolongation' => $prolongation,
            'changement_vehicule' => $changement_vehicule,
            'etat' => $etat,
            'pieces' => $pieces
            // Add more data as needed
        ];

        view()->share('data', $data);
        
        $pdf = PDF::loadView('Location.contrat', $data);
        $pdf->getDomPDF()->getOptions()->set('fontDir', storage_path('app\public\fonts'));
        $pdf->setPaper('a4', 'portrait');
        $pdf->setWarnings(false);
        $pdf->save('myfile.pdf');
        return $pdf->stream('Contrat_'. str_replace(' ', '_', $client->nom_complet) .'.pdf');
        
    }

    public function ShowCanvas(string $id){

        $vehicule = Vehicule::where('id', $id)->get();
        $vehicule = $vehicule->toArray();
        $canvas_data = $vehicule[0]['canvas_data'];
        return view("Location.canvas", [
            "canvas_data" => $canvas_data
        ]);
    }

    public function selectclient(string $id){
        $row = Client::where("id", $id)->first();

        return response()->json($row);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view("Location.index", [
            "locations" => $locations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($param, $id)
    {
        $piece_vehicules = PieceVehicule::all();
        $assurances = Assurance::all();
        $options = OptionAssurance::all();
        if($param == "r"){
            $reservation = Reservation::where("id", $id)->first();
            $client = Client::where("id", $reservation->client_id)->first();
            $vehicule = Vehicule::where("id", $reservation->vehicule_id)->first();
            $mode_paiements = ModePaiement::all();
            $conducteurs = Conducteur::all();
            $tva = Diver::where("champ", "tva")->first();
            $organisations = Organisation::all();
            return view("Location.CreateReservation",[
                "mode_paiements" => $mode_paiements,
                "reservation" => $reservation,
                "client" => $client,
                "vehicule" => $vehicule,
                "piece_vehicules" => $piece_vehicules,
                "tva" => $tva,
                "reservation_id" => $id,
                "conducteurs" => $conducteurs,
                "organisations" => $organisations,
                "assurances" => $assurances,
                "options" => $options
            ]);
        }else{
            $vehicule = Vehicule::where("id", $id)->first();
            $tva = Diver::where("champ", "tva")->first();
            $mode_paiements = ModePaiement::all();
            $clients = Client::all();
            $conducteurs = Conducteur::all();
            $organisations = Organisation::all();
            return view("Location.CreateVehicule",[
                "vehicule" => $vehicule,
                "piece_vehicules" => $piece_vehicules,
                "mode_paiements" => $mode_paiements,
                "clients" => $clients,
                "tva" => $tva,
                "conducteurs" => $conducteurs,
                "organisations" => $organisations,
                "assurances" => $assurances,
                "options" => $options
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
        /*
        $canvas_data = $request->input('canvas_data');
        $image_data = base64_decode($canvas_data);
        file_put_contents(public_path('images\vue_croque_voiture.png'), $image_data);
        */
        $last_id = Location::create([
            "vehicule_id" => $request->vehicule_id,
            "client_id" => $request->client_id,
            "reservation_id" => $request->reservation_id,
            "conducteur_id" => $request->conducteur_id,
            "client_date_maroc" => $request->client_date_maroc,
            "conducteur_date_maroc" => $request->conducteur_date_maroc,
            "date_depart" => $request->date_depart,
            "lieu_depart" => $request->lieu_depart,
            "date_retour" => $request->date_retour,
            "lieu_retour" => $request->lieu_retour,
            "observation_assurance" => $request->observation_assurance
        ]);

        $last_id = $last_id->id;

        Vehicule::where('id', $request->vehicule_id)->update([
            "canvas_data" => $request->canvas_data
        ]);

        Facturation::create([
            "location_id" => $last_id,
            "mode_paiement_id" => $request->mode_paiement_id,
            "organisation_id" => $request->organisation_id,
            "type" => $request->type_facturation,
            "nbr" => $request->nbr,
            "prix" => $request->prix,
            "unite" => $request->facturation_unite,
            "frais_livraison" => $request->frais_livraison,
            "frais_reprise" => $request->frais_reprise,
            "remise" => $request->remise,
            "acompte" => $request->acompte,
            "tva" => $request->tva,
            "reference" => $request->reference,
            "franchise" => $request->franchise,
            "reference_franchise" => $request->reference_franchise,
            "franchise_organisation_id" => $request->franchise_organisation_id,
            "franchise_mode_paiement_id" => $request->franchise_mode_paiement_id
        ]);

        $etat_id = EtatVehicule::create([
            "location_id" => $last_id,
            "type" => $request->type_etat,
            "kms" => $request->kms,
            "niveau_carburant" => $request->niveau_carburant,
            "observation" => $request->observation
        ]);

        $etat_id = $etat_id->id;
        $data = array();
        if(!is_null($request->piece_disponible)){
            foreach($request->piece_disponible as $piece){
                $data[] = [
                    "piece_vehicule_id" => $piece,
                    "etat_vehicule_id" => $etat_id,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ];
            }
            PieceVehiculeDetail::insert($data);
        }

        if(!is_null($request->assurance_id)){
            $data = array();
            if(!is_null($request->option_id_assurance_details)){
                //if there are options selected do this: 
                foreach($request->option_id_assurance_details as $option){
                    $data[] = [
                        "location_id" => $last_id,
                        "option_assurance_id" => $option,
                        "assurance_id" => $request->assurance_id,
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ];
                }
            }else{
                // if the assurance selected with no options then do this:
                $data = [
                    "location_id" => $last_id,
                    "assurance_id" => $request->assurance_id,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ];
            }
            AssuranceDetail::insert($data);
        }
        

        return redirect(route("Location.index"));
    }

    public function createRetour(string $id){
        $location = Location::where('id', $id)->first();
        $vehicule = Vehicule::where('id', $location->vehicule_id)->first();
        $facturation = Facturation::where('location_id', $location->id)->first();
        $etat_vehicule = EtatVehicule::where('location_id', $location->id)->first();
        $piece_vehicule_details = PieceVehiculeDetail::where('etat_vehicule_id', $etat_vehicule->id)->get();
        $client = Client::where("id", $location->client_id)->first();
        $conducteur = Conducteur::where('id', $location->conducteur_id)->first();
        $mode_paiements = ModePaiement::all();
        $tva = Diver::where("champ", "tva")->first();
        $organisations = Organisation::all();
        $piece_vehicules = PieceVehicule::all();
        $assurances = Assurance::all();
        $option_assurance_details = AssuranceDetail::where('location_id', $location->id)->get();
        $prolongation = Prolongation::where('location_id', $location->id)->first();
        $changement_vehicule = ChangementVehiculeLocation::where('location_id', $id)->first();


        return view("Location.retour", [
            "location" => $location,
            "vehicule" => $vehicule,
            "facturation" => $facturation,
            "etat_vehicule" => $etat_vehicule,
            "piece_vehicule_details" => $piece_vehicule_details,
            "client" => $client,
            "conducteur" => $conducteur,
            "mode_paiements" => $mode_paiements,
            "tva" => $tva,
            "organisations" => $organisations,
            "piece_vehicules" => $piece_vehicules,
            "assurances" => $assurances,
            "option_assurance_details" => $option_assurance_details,
            "prolongation" => $prolongation,
            "changement_vehicule" => $changement_vehicule
        ]);
    }

    public function storeRetour(Request $request){
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $location = Location::where('id', $id)->first();
        $vehicule = Vehicule::where('id', $location->vehicule_id)->first();
        $facturation = Facturation::where('location_id', $id)->first();
        $etat_vehicule = EtatVehicule::where('location_id', $id)->first();
        $piece_vehicule_details = PieceVehiculeDetail::where('etat_vehicule_id', $etat_vehicule->id)->get();
        $client = Client::where("id", $location->client_id)->first();
        $conducteur = Conducteur::where('id', $location->conducteur_id)->first();
        $mode_paiements = ModePaiement::all();
        $tva = Diver::where("champ", "tva")->first();
        $organisations = Organisation::all();
        $piece_vehicules = PieceVehicule::all();
        $etat_id = $etat_vehicule->id;
        $piece_vehicules = PieceVehicule::whereDoesntHave('PieceVehiculeDetails', function ($query) use ($etat_id) {
            $query->where('etat_vehicule_id', $etat_id);
        })->get();
        $assurances = Assurance::all();
        $option_assurance_details = AssuranceDetail::where('location_id', $id)->get();
        //dd($option_assurance_details);
        $option_assurances = OptionAssurance::where('assurance_id', $option_assurance_details[0]['assurance_id'])
                        ->whereDoesntHave('AssuranceDetails', 
                        function ($query) use ($id) {
                            $query->where('location_id', $id);
                        })->get();


        $clients = Client::all();
        $prolongation = Prolongation::where('location_id', $id)->first();
        $changement_vehicule = ChangementVehiculeLocation::where('location_id', $id)->first();



        return view("Location.edit", [
            "location" => $location,
            "vehicule" => $vehicule,
            "facturation" => $facturation,
            "etat_vehicule" => $etat_vehicule,
            "piece_vehicule_details" => $piece_vehicule_details,
            "client" => $client,
            "conducteur" => $conducteur,
            "mode_paiements" => $mode_paiements,
            "tva" => $tva,
            "organisations" => $organisations,
            "piece_vehicules" => $piece_vehicules,
            "assurances" => $assurances,
            "option_assurance_details" => $option_assurance_details,
            "clients" => $clients,
            "option_assurances" => $option_assurances,
            "prolongation" => $prolongation,
            "changement_vehicule" => $changement_vehicule
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        Location::where('id', $id)->update([
            "vehicule_id" => $request->vehicule_id,
            "client_id" => $request->client_id,
            "conducteur_id" => $request->conducteur_id,
            "client_date_maroc" => $request->client_date_maroc,
            "conducteur_date_maroc" => $request->conducteur_date_maroc,
            "date_depart" => $request->date_depart,
            "lieu_depart" => $request->lieu_depart,
            "date_retour" => $request->date_retour,
            "lieu_retour" => $request->lieu_retour,
            "observation_assurance" => $request->observation_assurance
        ]);

        Vehicule::where('id', $request->vehicule_id)->update([
            "canvas_data" => $request->canvas_data
        ]);

        Facturation::where('location_id', $id)->update([
            "location_id" => $id,
            "mode_paiement_id" => $request->mode_paiement_id,
            "organisation_id" => $request->organisation_id,
            "type" => $request->type_facturation,
            "nbr" => $request->nbr,
            "prix" => $request->prix,
            "unite" => $request->facturation_unite,
            "frais_livraison" => $request->frais_livraison,
            "frais_reprise" => $request->frais_reprise,
            "remise" => $request->remise,
            "acompte" => $request->acompte,
            "tva" => $request->tva,
            "reference" => $request->reference,
            "franchise" => $request->franchise,
            "reference_franchise" => $request->reference_franchise,
            "franchise_organisation_id" => $request->franchise_organisation_id,
        ]);

        $etat_id = EtatVehicule::where('location_id', $id)->update([
            "location_id" => $id,
            "type" => $request->type_etat,
            "kms" => $request->kms,
            "niveau_carburant" => $request->niveau_carburant,
            "observation" => $request->observation
        ]);

        $data = array();
        if(!is_null($request->piece_disponible)){
            PieceVehiculeDetail::where('etat_vehicule_id', $etat_id)->delete();
            foreach($request->piece_disponible as $piece){
                $data[] = [
                    "piece_vehicule_id" => $piece,
                    "etat_vehicule_id" => $etat_id,
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ];
            }
            PieceVehiculeDetail::insert($data);
        }

        if(!is_null($request->assurance_id)){
            $data = array();
            if(!is_null($request->option_id_assurance_details)){
                //if there are options selected do this: 
                    AssuranceDetail::where('location_id', $id)->delete();
                foreach($request->option_id_assurance_details as $option){
                    $data[] = [
                        "location_id" => $id,
                        "option_assurance_id" => $option,
                        "assurance_id" => $request->assurance_id,
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ];
                }
                AssuranceDetail::insert($data);
            }else{
                // if the assurance selected with no options then do this:
                    AssuranceDetail::where('location_id', $id)->update([
                        "assurance_id" => $request->assurance_id
                    ]);
            }
        }
        
        $var = Prolongation::where('location_id', $id);
        if(!is_null($request->prolongation)){
            //check whether a prolongation exists or not then update or insert Prolongation
            Prolongation::updateOrCreate([
                "location_id" => $id,
                "date_depart_prolongation" => $request->date_depart_prolongation,
                "date_retour_prolongation" => $request->date_retour_prolongation,
                "lieu_depart_prolongation" => $request->lieu_depart_prolongation,
                "lieu_retour_prolongation" => $request->lieu_retour_prolongation,
                "autre_frais_prolongation" => $request->autre_frais_prolongation,
                "nature" => $request->nature
            ]);
        }elseif ($var){
            $var->delete();
        }

        $var = ChangementVehiculeLocation::where('location_id', $id);
        if(!is_null($request->changement_vehicule)){
            //check whether a changementVehiclueLocation exists or not then update or insert ChangementVehicule
            ChangementVehiculeLocation::updateOrCreate(
                ['location_id' => $id],
                [
                    'vehicule_id' => $request->changement_vehicule_id,
                    'date_changement_vehicule' =>$request->date_changement_vehicule,
                    'motif' => $request->motif
                ]
            );
        }elseif ($var) {
            $var->delete();
        }
        return redirect(route("Location.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Location::destroy($id);
        return redirect(route("Location.index"));
    }
}
