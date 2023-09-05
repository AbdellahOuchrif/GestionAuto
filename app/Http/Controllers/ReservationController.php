<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Reservation;
use App\Models\ModePaiement;
use App\Models\Organisation;
use Illuminate\Http\Request;
use App\Models\PieceJointeReservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view("Reservation.index", [
            "reservations" => $reservations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vehicules = Vehicule::all();
        $clients = Client::all();
        $mode_paiements = ModePaiement::all();
        $organisations = Organisation::all();
        return view("Reservation.create", [
            "vehicules" => $vehicules,
            "clients" => $clients,
            "mode_paiements" => $mode_paiements,
            "organisations" => $organisations
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $last_id = Reservation::create([
            "client_id" => $request->client_id,
            "vehicule_id" => $request->vehicule_id,
            "mode_paiement_id" => $request->mode_paiement_id,
            "organisation_id" => $request->organisation_id,
            "date_debut" => $request->date_debut,
            "date_fin" => $request->date_fin,
            "tarif" => $request->tarif,
            "avance" => $request->avance,
            "description" => $request->description,
            "reference" => $request->reference
        ]);
        $last_id = $last_id->id;
        if($request->has('piece_jointe')){
            check_piece_jointe($request, $last_id, "reservation_id");
        }
        return redirect(route("Reservation.index"));
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
        $vehicules = Vehicule::all();
        $clients = Client::all();
        $mode_paiements = ModePaiement::all();
        $reservation = Reservation::where('id', $id)->first();
        $piece_jointes = PieceJointeReservation::where('reservation_id', $id)->get();
        $organisations = Organisation::all();
        return view("Reservation.edit", [
            "vehicules" => $vehicules,
            "clients" => $clients,
            "reservation" => $reservation,
            "mode_paiements" => $mode_paiements,
            "piece_jointes" => $piece_jointes,
            "organisations" => $organisations,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!is_null($request->pj_delete)){
            delete_piece_jointe_reservation($request->pj_delete);
        }

        Reservation::where('id', $id)->update([
            "client_id" => $request->client_id,
            "vehicule_id" => $request->vehicule_id,
            "mode_paiement_id" => $request->mode_paiement_id,
            "organisation_id" => $request->organisation_id,
            "date_debut" => $request->date_debut,
            "date_fin" => $request->date_fin,
            "tarif" => $request->tarif,
            "avance" => $request->avance,
            "description" => $request->description,
            "reference" => $request->reference
        ]);

        if($request->has('piece_jointe')){
            check_piece_jointe($request, $id, "reservation_id");
        }

        return redirect(route("Reservation.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        check_pj_reservation_delete($id);
        Reservation::destroy($id);
        return redirect(route("Reservation.index"));
    }
}
