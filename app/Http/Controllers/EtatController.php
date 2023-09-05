<?php

namespace App\Http\Controllers;

use App\Models\Etat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEtatRequest;
use App\Http\Requests\UpdateEtatRequest;

class EtatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etats = Etat::all();
        return view("Etat.index", [
            "etats" => $etats
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEtatRequest  $request)
    {
        Etat::create([
            "designation" => $request->designation
        ]);
        return redirect(route('Etat.index'))->with('success', 'L\'etat de reservation '. $request->designation .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtatRequest  $request, string $id)
    {
        Etat::where('id', $id)->update([
            "designation" => $request->designation
        ]);
        return redirect(route('Etat.index'))->with('success', 'L\'etat de reservation '. $request->designation .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Etat::destroy($id);
        return redirect(route('Etat.index'))->with('danger', 'L\'enregistrement a été supprimer');
    }
}
