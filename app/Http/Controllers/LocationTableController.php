<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use App\Models\Reservation;
use Illuminate\Http\Request;

class LocationTableController extends Controller
{
    public function index(Request $request)
    {
        $output = "";
        $value = $request->query('query');
        if($value == "reservations"){
            $table = Reservation::all();
            $output .= '<div class="container-fluid table-container mb-5" style="width: 90%;">
                    <table id="ModalShowTable" class="display">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Vehicule</th>
                                <th>Date debut</th>
                                <th>Date fin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>';
            foreach($table as $reservation){
                $output .='<tr>'.
                '<td style="text-transform: capitalize;">'. $reservation->Client->nom_complet .'</td>'.
                '<td style="text-transform: capitalize;">'. $reservation->Vehicule->ModelVehicule->model .'</td>'.
                '<td style="text-transform: capitalize;">'. $reservation->date_debut .'</td>'.
                '<td style="text-transform: capitalize;">'. $reservation->date_fin .'</td>'.
                '<td class="actions d-flex justify-content-end">'.
                    '<a class="btn btn-success rounded-circle" href="'. route("Location.create", ["param" => "r", "id" => $reservation->id ]).'">'.
                      '<span class="material-symbols-outlined">add</span></a>'.
                '</td>'
                
                ;
            }
            $output .='</tbody> </table> </div>';
        }
        elseif($value == "vehicules"){
            $table = Vehicule::all();
            $output .= '<div class="container-fluid table-container mb-5" style="width: 90%;">
                    <table id="ModalShowTable" class="display">
                        <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Model</th>
                                <th>Immatriculation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>';
            foreach($table as $vehicule){
                $output .='<tr>'.
                '<td style="text-transform: capitalize;">'. $vehicule->ModelVehicule->MarqueVehicule->marque .'</td>'.
                '<td style="text-transform: capitalize;">'. $vehicule->ModelVehicule->model .'</td>'.
                '<td><div class="d-flex"><span>'. $vehicule->immatriculation_num .'|</span><span>'.$vehicule->immatriculation_lettre .'|</span><span>' .$vehicule->immatriculation_region .'</span></div></td>'.
                '<td class="actions d-flex justify-content-end">'.
                    '<a class="btn btn-success rounded-circle" href="'. route("Location.create", ["param" => "v", "id" => $vehicule->id ]).'">'.
                      '<span class="material-symbols-outlined">add</span></a>'.
                '</td>'
                
                ;
            }
            $output .='</tbody> </table> </div>';
        }
        elseif($value == "vehicule-update"){
            $table = Vehicule::all();
            $output .= '<div class="container-fluid table-container mb-5" style="width: 90%;">
                    <table id="ModalShowTable" class="display">
                        <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Model</th>
                                <th>Immatriculation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>';
            foreach($table as $vehicule){
                $output .='<tr>'.
                '<td style="text-transform: capitalize;">'. $vehicule->ModelVehicule->MarqueVehicule->marque .'</td>'.
                '<td style="text-transform: capitalize;">'. $vehicule->ModelVehicule->model .'</td>'.
                '<td><div class="d-flex"><span>'. $vehicule->immatriculation_num .'|</span><span>'.$vehicule->immatriculation_lettre .'|</span><span>' .$vehicule->immatriculation_region .'</span></div></td>'.
                '<td class="actions d-flex justify-content-end">'.
                    '<a class="btn btn-warning rounded-circle" data-dismiss="modal" aria-label="Close" 
                    onclick="UpdateVehicule('."'update-vehicule', ".$vehicule->id.', '. "'". $vehicule->ModelVehicule->MarqueVehicule->marque. "'". ', '. "'". $vehicule->ModelVehicule->model."'". ', '."'". $vehicule->immatriculation_num."'". ', '."'". $vehicule->immatriculation_region."'". ', '."'". $vehicule->immatriculation_lettre."'". ')">'.
                      '<span class="material-symbols-outlined">add</span></a>'.
                '</td>'
                
                ;
            }
            $output .='</tbody> </table> </div>';
        }
        elseif($value == "changement-vehicule"){
            $table = Vehicule::all();
            $output .= '<div class="container-fluid table-container mb-5" style="width: 90%;">
                    <table id="ModalShowTable" class="display">
                        <thead>
                            <tr>
                                <th>Marque</th>
                                <th>Model</th>
                                <th>Immatriculation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>';
            foreach($table as $vehicule){
                $output .='<tr>'.
                '<td style="text-transform: capitalize;">'. $vehicule->ModelVehicule->MarqueVehicule->marque .'</td>'.
                '<td style="text-transform: capitalize;">'. $vehicule->ModelVehicule->model .'</td>'.
                '<td><div class="d-flex"><span>'. $vehicule->immatriculation_num .'|</span><span>'.$vehicule->immatriculation_lettre .'|</span><span>' .$vehicule->immatriculation_region .'</span></div></td>'.
                '<td class="actions d-flex justify-content-end">'.
                    '<a class="btn btn-warning rounded-circle" data-dismiss="modal" aria-label="Close" 
                    onclick="UpdateVehicule('."'changement-vehicule', ".$vehicule->id.', '. "'". $vehicule->ModelVehicule->MarqueVehicule->marque. "'". ', '. "'". $vehicule->ModelVehicule->model."'". ', '."'". $vehicule->immatriculation_num."'". ', '."'". $vehicule->immatriculation_region."'". ', '."'". $vehicule->immatriculation_lettre."'". ')">'.
                      '<span class="material-symbols-outlined">add</span></a>'.
                '</td>'
                
                ;
            }
            $output .='</tbody> </table> </div>';
        }
        return response()->json($output);
    }
}


