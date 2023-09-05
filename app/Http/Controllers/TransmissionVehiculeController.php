<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransmissionVehicule;
use App\Http\Requests\StoreTransmissionVehiculeRequest;
use App\Http\Requests\UpdateTransmissionVehiculeRequest;

class TransmissionVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transmissions = TransmissionVehicule::all();
        return view('TransmissionVehicule.index',[
            "transmissions" => $transmissions
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransmissionVehiculeRequest $request)
    {
        TransmissionVehicule::create([
            "transmission" => $request->transmission
        ]);
        return redirect(route('TransmissionVehicule.index'))->with('success', 'Le type de transmission '. $request->transmission .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransmissionVehiculeRequest $request, string $id)
    {
        TransmissionVehicule::where('id', $id)->update([
            "transmission" => $request->transmission
        ]);
        return redirect(route('TransmissionVehicule.index'))->with('success', 'Le type de transmission '. $request->transmission .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TransmissionVehicule::destroy($id);
        return redirect(route('TransmissionVehicule.index'))->with('danger', 'L\'enregistrement a été supprimer');

    }
}