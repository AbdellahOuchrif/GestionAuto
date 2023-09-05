<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelVehicule;
use App\Models\MarqueVehicule;

class ModelVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marques = MarqueVehicule::orderBy('marque', 'asc')->get();
        $models = ModelVehicule::all();
        return view('ModelVehicule.index', [
            "marques" => $marques,
            "models" => $models
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ModelVehicule::create([
            "model" => $request->model,
            "marque_vehicule_id" => $request->marque_id
        ]);
        return redirect(route("ModelVehicule.index"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ModelVehicule::where("id", $id)->update([
            "model" => $request->model,
            "marque_vehicule_id" => $request->marque_id
        ]);
        return redirect(route("ModelVehicule.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModelVehicule::destroy($id);
        return redirect(route("ModelVehicule.index"));
    }
}
