<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CouleurVehicule;
use App\Http\Requests\StoreCouleurVehiculeRequest;
use App\Http\Requests\UpdateCouleurVehiculeRequest;

class CouleurVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couleurs = CouleurVehicule::all();
        return view('CouleurVehicule.index',[
            "couleurs" => $couleurs
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouleurVehiculeRequest $request)
    {
        CouleurVehicule::create([
            "couleur" => $request->couleur
        ]);
        return redirect(route('CouleurVehicule.index'))->with('success', 'La couleur '. $request->couleur .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouleurVehiculeRequest $request, string $id)
    {
        CouleurVehicule::where('id', $id)->update([
            "couleur" => $request->couleur
        ]);
        return redirect(route('CouleurVehicule.index'))->with('success', 'La couleur '. $request->couleur .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        CouleurVehicule::destroy($id);
        return redirect(route('CouleurVehicule.index'))->with('danger', 'L\'enregistrement a été supprimer');
    }
}
