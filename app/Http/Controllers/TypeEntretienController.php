<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeEntretien;
use App\Http\Requests\StoreTypeEntretientRequest;
use App\Http\Requests\UpdateTypeEntretientRequest;

class TypeEntretienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_entretien = TypeEntretien::all();
        return view("TypeEntretient.index", [
            "type_entretiens" => $type_entretien
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeEntretientRequest $request)
    {
        TypeEntretien::create([
            "type" => $request->type_entretien
        ]);
        return redirect(route('TypeEntretien.index'))->with('success', 'Le type d\'entretient '. $request->type_entretien .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeEntretientRequest $request, string $id)
    {
        TypeEntretien::where('id', $id)->update([
            "type" => $request->type_entretien
        ]);
        return redirect(route('TypeEntretien.index'))->with('success', 'Le type d\'entretient '. $request->type_entretien .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        TypeEntretien::destroy($id);
        return redirect(route('TypeEntretien.index'))->with('danger', 'L\'enregistrement a été supprimer');
    }
}
