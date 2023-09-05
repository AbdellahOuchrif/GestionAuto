<?php

namespace App\Http\Controllers;

use App\Models\Assurance;
use Illuminate\Http\Request;
use App\Models\OptionAssurance;

class OptionAssuranceController extends Controller
{
    public function Select(string $id){
        $options = OptionAssurance::where('assurance_id', $id)->get();

        return response()->json($options);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assurances = Assurance::all();
        $options = OptionAssurance::all();
        return view('OptionAssurance.index', [
            "assurances" => $assurances,
            "options" => $options    
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        OptionAssurance::create([
            "designation" => $request->designation,
            "assurance_id" => $request->assurance_id,
            "details" => $request->details,
        ]);

        return redirect(route('OptionAssurance.index'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        OptionAssurance::where('id', $id)->update([
            "designation" => $request->designation,
            "assurance_id" => $request->assurance_id,
            "details" => $request->details,
        ]);

        return redirect(route('OptionAssurance.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        OptionAssurance::destroy($id);

        return redirect(route('OptionAssurance.index'));
    }
}
