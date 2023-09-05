<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Models\PieceJointeClient;
use App\Http\Controllers\PDFController;

class ClientController extends Controller
{

    public function incompleteStore(Request $request)
    {
        $last_client = Client::create([
            "nom_complet" => $request->nom_complet,
            "sexe" => $request->sexe,
            "tel" => $request->tel,
            "num_cin" => $request->num_cin
        ]);
        return response()->json($last_client->id);
    }

    public function indirectUpdate(Request $request, string $id)
    {
        Client::where('id', $id)->update([
            "nom_complet" => $request->nom_complet,
            "tel" => $request->tel,
            "adresse" => $request->adresse,
            "num_cin" => $request->num_cin,
            "cin_delivre" => $request->cin_delivre,
            "cin_validite" => $request->cin_validite,
            "num_passeport" => $request->num_passeport,
            "passeport_delivre" => $request->passeport_delivre,
            "passeport_validite" => $request->passeport_validite,
            "num_permis" => $request->num_permis,
            "permis_delivre" => $request->permis_delivre,
            "permis_validite" => $request->permis_validite,
            "date_naissance" =>$request->date_naissance,
            "lieu_naissance" => $request->lieu_naissance,
            "nationalite" => $request->nationalite
        ]);

        return response()->json("success");
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('Client.index', [
            "clients" => $clients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $last_id = Client::create([
            "nom_complet" => $request->nom_complet,
            "email" => $request->email,
            "tel" => $request->tel,
            "tel_2" => $request->tel_2,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "adresse" => $request->adresse,
            "num_cin" => $request->num_cin,
            "cin_delivre" => $request->cin_delivre,
            "cin_validite" => $request->cin_validite,
            "num_passeport" => $request->num_passeport,
            "passeport_delivre" => $request->passeport_delivre,
            "passeport_validite" => $request->passeport_validite,
            "num_permis" => $request->num_permis,
            "permis_delivre" => $request->permis_delivre,
            "permis_validite" => $request->permis_validite,
            "type_permis" => $request->type_permis,
            "date_naissance" =>$request->date_naissance,
            "sexe" => $request->sexe,
            "lieu_naissance" => $request->lieu_naissance,
            "nationalite" => $request->nationalite
        ]);
        $last_id = $last_id->id;
        check_images_store($request, $last_id);
        return redirect(route("Client.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::where('id', $id)->first();
        return view("Client.show",[
            "client" => $client 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $clients = Client::where('id', $id)->get();
        $piece_jointes = PieceJointeClient::where('client_id', $id)->get(); 
        return view('Client.edit', [
            "clients" => $clients,
            "piece_jointes" => $piece_jointes
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!is_null($request->pj_delete)){
            delete_piece_jointe_client($request->pj_delete);
        }

        check_images_store($request, $id);

        Client::where('id', $id)->update([
            "nom_complet" => $request->nom_complet,
            "email" => $request->email,
            "tel" => $request->tel,
            "tel_2" => $request->tel_2,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "adresse" => $request->adresse,
            "num_cin" => $request->num_cin,
            "cin_delivre" => $request->cin_delivre,
            "cin_validite" => $request->cin_validite,
            "num_passeport" => $request->num_passeport,
            "passeport_delivre" => $request->passeport_delivre,
            "passeport_validite" => $request->passeport_validite,
            "num_permis" => $request->num_permis,
            "permis_delivre" => $request->permis_delivre,
            "permis_validite" => $request->permis_validite,
            "type_permis" => $request->type_permis,
            "date_naissance" =>$request->date_naissance,
            "sexe" => $request->sexe,
            "lieu_naissance" => $request->lieu_naissance,
            "nationalite" => $request->nationalite
        ]);

        return redirect(route("Client.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        check_images_delete($id);
        Client::destroy($id);

        return redirect(route("Client.index"));
    }
}
