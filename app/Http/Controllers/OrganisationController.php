<?php

namespace App\Http\Controllers;

use App\Models\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organisations = Organisation::all();
        return view("Organisation.index", [
            "organisations" => $organisations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Organisation::create([
            "organisation" => $request->organisation
        ]);

        return redirect(route("Organisation.index"))->with('success', 'L\'organisation: '. $request->organisation .' a été ajouter');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Organisation::where('id', $id)->update([
            "organisation" => $request->organisation
        ]);
        return redirect(route('Organisation.index'))->with('success', 'L\'organisation: '. $request->organisation .' a été modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Organisation::destroy($id);
        return redirect(route('Organisation.index'))->with('danger', 'L\'enregistrement a été supprimer');
    }
}
