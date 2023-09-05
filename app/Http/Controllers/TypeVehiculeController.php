<?php

namespace App\Http\Controllers;

use App\Models\TypeVehicule;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTypeVehiculeRequest;

class TypeVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = TypeVehicule::all();
        return view("TypeVehicule.index",[
            "types" => $types
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeVehiculeRequest $request)
    {
        TypeVehicule::create([
            "type" => $request->type
        ]);
        return redirect(route("TypeVehicule.index"))->with('success', 'Le Type '. $request->type .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeVehiculeRequest $request, string $id)
    {
        TypeVehicule::where('id', $id)->update([
            "type" => $request->type
        ]);
        return redirect(route("TypeVehicule.index"))->with('success', 'Le Type '. $request->type .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TypeVehicule::destroy($id);
        return redirect(route("TypeVehicule.index"))->with('danger', 'L\'enregistrement a été supprimer');
    }
}
