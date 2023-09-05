<?php

namespace App\Http\Controllers;

use App\Models\ModePaiement;
use Illuminate\Http\Request;
use App\Http\Requests\StoreModePaiementRequest;
use App\Http\Requests\UpdateModePaiementRequest;

class ModePaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mode_paiements = ModePaiement::all();
        return view("ModePaiement.index", [
            "mode_paiements" => $mode_paiements
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModePaiementRequest $request)
    {
        ModePaiement::create([
            "mode" => $request->mode_paiement
        ]);
        return redirect(route('ModePaiement.index'))->with('success', 'Le Mode de paiement '. $request->mode_paiement .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModePaiementRequest $request, string $id)
    {
        ModePaiement::where('id', $id)->update([
            "mode" => $request->mode_paiement
        ]);
        return redirect(route('ModePaiement.index'))->with('success', 'Le Mode de paiement '. $request->mode_paiement .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        ModePaiement::destroy($id);
        return redirect(route('ModePaiement.index'))->with('danger', 'L\'enregistrement a été supprimer');
    }
}

