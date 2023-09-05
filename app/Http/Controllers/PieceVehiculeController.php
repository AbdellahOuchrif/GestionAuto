<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PieceVehicule;

class PieceVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $piece_vehicules = PieceVehicule::all();
        return view("PieceVehicule.index", [
            "piece_vehicules" => $piece_vehicules
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PieceVehicule::create([
            "piece" => $request->piece
        ]);
        return redirect(route('PieceVehicule.index'))->with('success', 'La Piece Vehicule '. $request->piece .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        PieceVehicule::where('id', $id)->update([
            "piece" => $request->piece
        ]);
        return redirect(route('PieceVehicule.index'))->with('success', 'La Piece Vehicule '. $request->piece .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PieceVehicule::destroy($id);
        return redirect(route('PieceVehicule.index'))->with('danger', 'L\'enregistrement a été supprimer');
    }
}
