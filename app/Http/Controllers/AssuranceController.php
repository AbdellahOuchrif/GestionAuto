<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use Illuminate\Http\Request;

class AssuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assurances = Assurance::all();
        return view('Assurance.index', [
            "assurances" => $assurances
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Assurance::create([
            "type" => $request->type
        ]);

        return redirect(route("Assurance.index"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Assurance::where('id', $id)->update([
            "type" => $request->type
        ]);

        return redirect(route("Assurance.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Assurance::destroy($id);

        return redirect(route("Assurance.index"));
    }
}
