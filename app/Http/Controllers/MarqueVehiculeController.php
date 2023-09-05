<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MarqueVehicule;
use App\Http\Requests\StoreMarqueVehiculeRequest;
use App\Http\Requests\UpdateMarqueVehiculeRequest;

class MarqueVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marques = MarqueVehicule::all();
        return view("MarqueVehicule.index",[
            "marques" => $marques
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMarqueVehiculeRequest $request)
    {
        MarqueVehicule::create([
            "marque" => $request->marque
        ]);
        return redirect(route("MarqueVehicule.index"))->with('success', 'La Marque '. $request->marque .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMarqueVehiculeRequest $request, string $id)
    {
        MarqueVehicule::where('id', $id)->update([
            "marque" => $request->marque
        ]);
        return redirect(route("MarqueVehicule.index"))->with('success', 'La Marque '. $request->marque .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MarqueVehicule::destroy($id);
        return redirect(route("MarqueVehicule.index"))->with('danger', 'L\'enregistrement a été supprimer');
    }
}
