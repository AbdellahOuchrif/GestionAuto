<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $output = "";
        $searchTerm = $request->query('query');
        $data = Vehicule::select('vehicules.id', DB::raw('MAX(vehicules.immatriculation_num) as immatriculation_num'), 'vehicules.immatriculation_lettre', 'vehicules.immatriculation_region', 'cv.couleur', 'mav.marque', 'mov.model')
                    ->join('couleur_vehicules AS cv', 'vehicules.couleur_vehicule_id', '=', 'cv.id')
                    ->join('model_vehicules AS mov', 'vehicules.model_vehicule_id', '=', 'mov.id')
                    ->join('marque_vehicules AS mav', 'mov.marque_vehicule_id', '=', 'mav.id')
                    ->where('mov.model', 'like', '%'.$searchTerm.'%')
                    ->where('vehicules.model_vehicule_id', '=', DB::raw('mov.id'))
                    ->groupBy('vehicules.id', 'vehicules.immatriculation_lettre', 'vehicules.immatriculation_region', 'cv.couleur', 'mav.marque', 'mov.model')
                    ->get();

        foreach($data as $vehicule){
            if(!is_null($vehicule->ImageVehiculePfp())){
                $src = asset("images/". $vehicule->ImageVehiculePfp()->url);
            }
            else{
                $src = asset("images/default_vehicule.png");
            }
            $output .=
                '<div class="col-lg-4 col-md-6 mb-4">'.
                    '<div class="card">' .
                        '<img class="card-img-top" src="'. $src .'" alt="Card image cap">'.
                        '<div class="card-body w-100 text-center">'.
                            '<h5 class="card-title">'. $vehicule->marque .' '. $vehicule->model .'</h5>'.
                            '<div class="d-flex justify-content-center">'.
                                '<p class="card-text lead m-0">'. $vehicule->immatriculation_num . '|</p>'.
                                '<p class="card-text lead ar-size m-0" lang="ar">' . $vehicule->immatriculation_lettre . '</p>'.
                                '<p class="card-text lead m-0">|' . $vehicule->immatriculation_region . '</p>'.
                            '</div>'.
                            '<p class="card-text"><em>Couleur: </em><b>' . $vehicule->couleur . '</b></p>'.
                        '</div>'.
                        '<div class="card-footer d-flex justify-content-around">'.
                            '<form action="'. route("Vehicule.destroy", $vehicule->id) .'" method="POST" style="display: inline-block">'.
                                '<input type="hidden" name="_token" value="' . csrf_token() . '" />'.
                                '<input type="hidden" name="_method" value="DELETE">'.
                                '<button type="submit" class="btn btn-outline-danger btn-sm mr-2" onclick=\'return confirm('.'"En cliquant sur OK vous allez supprimer l enregistrement"' .
                                ')\' ><span class="material-symbols-outlined">delete</span></button>'.
                            '</form>'.
                            '<a href="' . route('Vehicule.show', $vehicule->id) .'" class="btn btn-outline-info p-2"><b>Afficher details</b></a>' .
                            '<a href="' . route('Vehicule.edit', $vehicule->id) . '" class="btn btn-outline-warning btn-sm"><span class="material-symbols-outlined">edit</span></a>'.
                        '</div>'.
                    '</div>'.
                '</div>';
        }

        return response()->json($output);
    }

}
