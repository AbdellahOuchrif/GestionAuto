<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Etat;
use App\Models\Document;
use App\Models\Vehicule;
use App\Models\Organisation;
use App\Models\TypeVehicule;
use Illuminate\Http\Request;
use App\Models\ImageVehicule;
use App\Models\ModelVehicule;
use App\Models\TypeEntretien;
use App\Models\ArabicAlphabet;
use App\Models\CreditVehicule;
use App\Models\DocumentDetail;
use App\Models\CouleurVehicule;
use App\Models\EntretientDelai;
use Illuminate\Support\Facades\DB;
use App\Models\PieceJointeVehicule;
use App\Models\TransmissionVehicule;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicules = Vehicule::all();
        
        return view('Vehicule.index', [
            "vehicules" => $vehicules
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model_vehicules = ModelVehicule::orderBy('model', 'asc')->get();
        $type_vehicules = TypeVehicule::orderBy('type', 'asc')->get();
        $couleur_vehicules = CouleurVehicule::orderBy('couleur', 'asc')->get();
        $transmission_vehicules = TransmissionVehicule::orderBy('transmission', 'asc')->get();
        $type_entretiens = TypeEntretien::all();
        $etats = Etat::orderBy('designation', 'asc')->get();
        $arabic_alphabets = ArabicAlphabet::all();
        $organisations = Organisation::orderBy('organisation', 'asc')->get();
        $documents = Document::orderBy('type', 'asc')->get();
        return view('Vehicule.create', [
            "model_vehicules" => $model_vehicules,
            "type_vehicules" => $type_vehicules,
            "couleur_vehicules" => $couleur_vehicules,
            "transmission_vehicules" => $transmission_vehicules,
            "arabic_alphabets" => $arabic_alphabets,
            "etats" => $etats,
            "type_entretiens" => $type_entretiens,
            "organisations" => $organisations,
            "documents" => $documents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $last_id = Vehicule::create([
                        "etat_id" => $request->etat_id,
                        "type_vehicule_id" => $request->type_vehicule_id,
                        "model_vehicule_id" => $request->model_vehicule_id,
                        "couleur_vehicule_id" => $request->couleur_vehicule_id,
                        "transmission_vehicule_id" => $request->transmission_vehicule_id,
                        "immatriculation_num" => $request->immatriculation_num,
                        "immatriculation_lettre" => $request->immatriculation_lettre,
                        "immatriculation_region" => $request->immatriculation_region,
                        "date_acquisition" => $request->date_acquisition,
                        "nbr_place" => $request->nbr_place,
                        "date_disponibilite" => $request->date_disponibilite,
                        "tarif" => $request->tarif,
                        "unite" => $request->unite,
                        "km_compteur" => $request->km_compteur
                ]);
        $last_id = $last_id->id;

        //inserting the documents and theire informations in the DocumentDetail table 
        $data = array();
        if(!is_null($request->document)){
            $i = 0;
            foreach($request->document as $document){
                $data[] = [
                    "vehicule_id" => $last_id,
                    "document_id" => $request->document[$i],
                    "date_debut" => $request->document_date_debut[$i],
                    "date_fin" => $request->document_date_fin[$i],
                    "rappel" => $request->document_rappel[$i],
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ];
                $i++;
            }
            DocumentDetail::insert($data);
        }

        if($request->credit == "oui"){
            insert_credit_vehicule($request, $last_id);
        }

        insert_entretient_delais($request, $last_id);
        check_image_vehicule_store($request, $last_id);
        return redirect(route('Vehicule.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$vehicule = Vehicule::where('id', $id)->first();
        $vehicule = Vehicule::with('ModelVehicule')->find($id);
        return view('vehicule.show', [
            "vehicule" => $vehicule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $credits = CreditVehicule::where("vehicule_id", $id)->get();
        $model_vehicules = ModelVehicule::orderBy('model', 'asc')->get();
        $type_vehicules = TypeVehicule::orderBy('type', 'asc')->get();
        $couleur_vehicules = CouleurVehicule::orderBy('couleur', 'asc')->get();
        $transmission_vehicules = TransmissionVehicule::orderBy('transmission', 'asc')->get();
        $etats = Etat::orderBy('designation', 'asc')->get();
        $vehicules = Vehicule::where('id', $id)->get();
        $images = ImageVehicule::where('vehicule_id', $id)->get(); 
        $piece_jointes = PieceJointeVehicule::where('vehicule_id', $id)->get();
        $entretien_delais = EntretientDelai::where('vehicule_id', $id)->get();
        $type_entretiens = TypeEntretien::whereDoesntHave('EntretientDelai', function ($query) use ($id) {
                $query->where('vehicule_id', $id);
            })->get();
        $arabic_alphabets = ArabicAlphabet::all();
        $organisations = Organisation::all();
        $document_details = DocumentDetail::where("vehicule_id", $id)->get();
        $documents = Document::whereDoesntHave('DocumentDetails', 
                    function ($query) use ($id) {
                        $query->where('vehicule_id', '=', $id);
                    })->get();// gets the documents that doesn't have already the details and related to this vehicule
        return view('Vehicule.edit', [
            "vehicules" => $vehicules,
            "model_vehicules" => $model_vehicules,
            "type_vehicules" => $type_vehicules,
            "couleur_vehicules" => $couleur_vehicules,
            "transmission_vehicules" => $transmission_vehicules,
            "etats" => $etats,
            "piece_jointes" => $piece_jointes,
            "images" => $images,
            "arabic_alphabets" => $arabic_alphabets,
            "entretien_delais" => $entretien_delais,
            "type_entretiens" => $type_entretiens,
            "credits" => $credits,
            "organisations" => $organisations,
            "document_details" => $document_details,
            "documents" => $documents
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!is_null($request->pj_delete)){
            delete_piece_jointe_vehicule($request->pj_delete);
        }

        if(!is_null($request->img_delete)){
            delete_image_vehicule($request->img_delete);
        }

        Vehicule::where('id', $id)->update([
            "etat_id" => $request->etat_id,
            "type_vehicule_id" => $request->type_vehicule_id,
            "model_vehicule_id" => $request->model_vehicule_id,
            "couleur_vehicule_id" => $request->couleur_vehicule_id,
            "transmission_vehicule_id" => $request->transmission_vehicule_id,
            "immatriculation_num" => $request->immatriculation_num,
            "immatriculation_lettre" => $request->immatriculation_lettre,
            "immatriculation_region" => $request->immatriculation_region,
            "date_acquisition" => $request->date_acquisition,
            "nbr_place" => $request->nbr_place,
            "date_disponibilite" => $request->date_disponibilite,
            "tarif" => $request->tarif,
            "unite" => $request->unite,
            "km_compteur" => $request->km_compteur
        ]);

        //deleting the old documents and inserting new ones 
        DocumentDetail::where('vehicule_id', $id)->delete();

        $data = array();
        if(!is_null($request->document)){
            $i = 0;
            foreach($request->document as $document){
                $data[] = [
                    "vehicule_id" => $id,
                    "document_id" => $request->document[$i],
                    "date_debut" => $request->document_date_debut[$i],
                    "date_fin" => $request->document_date_fin[$i],
                    "rappel" => $request->document_rappel[$i],
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ];
                $i++;
            }
            DocumentDetail::insert($data);
        }

        if($request->credit == "oui"){
            update_credit_vehicule($request, $id);
        }else{
            delete_credit_vehicule($id);
        }
        update_entretient_delais($request, $id);
        insert_entretient_delais($request, $id);
        check_image_vehicule_store($request, $id);

        return redirect(route("Vehicule.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        check_img_pj_vehicule_delete($id);
        Vehicule::destroy($id);

        return redirect(route("Vehicule.index"));
    }
}
