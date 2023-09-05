<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Vehicule;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\IncidentVehicule;

class IncidentVehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = IncidentVehicule::all();
        return view("IncidentVehicule.index", [
            "incidents" => $incidents
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create($param)
    {
        if($param == "Location"){
            $locations = Location::all();
            return view("IncidentVehicule.CreateLocation",[
                "locations" => $locations
            ]);
        }else{
            $vehicules = Vehicule::all();
            return view("IncidentVehicule.CreateVehicule",[
                "vehicules" => $vehicules
            ]);
        }
    }

    public function storeIncidentLocation(Request $request){
        $last_id = IncidentVehicule::create([
            "vehicule_id" => $request->vehicule_id,
            "location_id" => $request->location_id,
            "date_incident" => $request->date_incident,
            "description" => $request->description
        ]);

        $last_id = $last_id->id;

        insert_incident_detail($request->piece, $last_id);

        return redirect(route("IncidentVehicule.index"));
    }

    public function storeIncidentVehicule(Request $request){
        $last_id = IncidentVehicule::create([
            "vehicule_id" => $request->vehicule_id,
            "date_incident" => $request->date_incident,
            "description" => $request->description
        ]);

        $last_id = $last_id->id;

        insert_incident_detail($request->piece, $last_id);

        return redirect(route("IncidentVehicule.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
