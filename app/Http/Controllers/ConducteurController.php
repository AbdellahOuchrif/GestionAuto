<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Conducteur;
use Illuminate\Http\Request;

class ConducteurController extends Controller
{

    public function store(Request $request){
        $last_conducteur = Conducteur::create([
            "nom_complet" => $request->nom_complet,
            "date_naissance" =>$request->date_naissance,
            "lieu_naissance" => $request->lieu_naissance,
            "nationalite" => $request->nationalite,
            "tel" => $request->tel,
            "adresse" => $request->adresse,
            "num_cin" => $request->num_cin,
            "cin_delivre" => $request->cin_delivre,
            "cin_validite" => $request->cin_validite,
            "num_permis" => $request->num_permis,
            "permis_delivre" => $request->permis_delivre,
            "permis_validite" => $request->permis_validite,
            "num_passeport" => $request->num_passeport,
            "passeport_delivre" => $request->passeport_delivre,
            "passeport_validite" => $request->passeport_validite
        ]);
        return response()->json($last_conducteur->id);
    }

    public function update(Request $request, string $id){
        Conducteur::where('id', $id)->update([
            "nom_complet" => $request->nom_complet,
            "date_naissance" =>$request->date_naissance,
            "lieu_naissance" => $request->lieu_naissance,
            "nationalite" => $request->nationalite,
            "tel" => $request->tel,
            "adresse" => $request->adresse,
            "num_cin" => $request->num_cin,
            "cin_delivre" => $request->cin_delivre,
            "cin_validite" => $request->cin_validite,
            "num_permis" => $request->num_permis,
            "permis_delivre" => $request->permis_delivre,
            "permis_validite" => $request->permis_validite,
            "num_passeport" => $request->num_passeport,
            "passeport_delivre" => $request->passeport_delivre,
            "passeport_validite" => $request->passeport_validite
        ]);
        return response()->json($id);
    }

    public function show(string $id){
        $row = Conducteur::where("id", $id)->first();

        return response()->json($row);
    }


    public function MigrateConducteur(string $id){
        $row = Conducteur::find($id);
        $newRow = new Client;
        $newRow->fill($row->getAttributes());
        $newRow->save();
        $row->delete();

        return response()->json([
            'success' => 'Le conducteur est devenu un client',
            'newRow' => $newRow->toArray()
        ]);
    }
}
