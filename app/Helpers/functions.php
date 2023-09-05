<?php

use Carbon\Carbon;
use App\Models\Client;
use App\Models\ImageVehicule;
use App\Models\CreditVehicule;
use App\Models\EntretientDelai;
use App\Models\PieceJointeClient;
use App\Models\PieceJointeVehicule;
use App\Models\IncidentVehiculeDetail;
use App\Models\PieceJointeReservation;


// This function works for both client and vehicule and if either of them have piece jointe it gets called and it 
// stores pj and insert the rows in their table 

function check_piece_jointe($request, $last_id, $field_id){
        $data = [];
        for($i=0; $i < count($request->piece_jointe);$i++){
            $pj_name = time().'-piece_jointe-'.str_replace(' ', '', $request->pj_nom[$i]).'-'.$i.'.'.$request->piece_jointe[$i]->extension();
            $request->piece_jointe[$i]->move(public_path('images'), $pj_name);
            array_push($data, [
                $field_id => $last_id, //Name of the foreign key is the field_id and it's value is last_id got it from the create of the original table
                "pj_nom" => $request->pj_nom[$i], 
                "pj_url" => $pj_name,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }
        if($field_id == "client_id"){
            PieceJointeClient::insert($data);
        }elseif($field_id == "vehicule_id"){
            PieceJointeVehicule::insert($data);
        }elseif($field_id == "reservation_id"){
            PieceJointeReservation::insert($data);
        }
}


/************************************ Client functions***************************************************/

//This function checks if the form has photo or files and it stores them in the public/images folder and there url in database.
function check_images_store($request, $last_id){
    if($request->has('photo') && !is_null($request->has('photo'))){
        if(!is_null($request->old_photo)){
            File::delete(public_path('images\\'. $request->old_photo));
        }
        $newImageName = time().'-'.str_replace(' ', '', $request->nom_complet).'-photo.'.$request->photo->extension();
        $request->photo->move(public_path('images'), $newImageName);
        Client::where('id', $last_id)->update([
            "photo" => $newImageName
        ]);
    }
    //insert piece jointe
    if($request->has('piece_jointe')){
        check_piece_jointe($request, $last_id, 'client_id');
    }
}

function delete_piece_jointe_client($params){
    foreach($params as $param){
        if(!is_null($param)){
            $query = PieceJointeClient::where('id', $param)->pluck('pj_url');
            File::delete(public_path('images\\'. $query[0]));
            PieceJointeClient::destroy($param);
        }
    }
}

//This function checks if the client Being deleted has photos or/and piece jointe in the public/images folder and deletes them
function check_images_delete($id){
    $query = Client::where('id', $id)->pluck('photo');
    if(!empty($query)){
        if(!is_null($query[0])){
            File::delete(public_path('images\\'. $query[0]));
        }
    }
    $query = PieceJointeClient::where('client_id', $id)->pluck('pj_url');
    if(!empty($query)){
        for($i=0; $i < count($query); $i++){                                                                                                               
                File::delete(public_path('images\\'. $query[$i]));                                                                                                                                  
        }
    }
}


/************************************ Vehicule functions***************************************************/

//This function checks if the form has photo or files and it stores them in the public/images folder and there url in database.
function check_image_vehicule_store($request, $last_id){
        $data = [];
        if($request->has('image')){
            for($i=0; $i < count($request->image);$i++){
                $img_name = time().'-imageVehicule'.$i.'-'.$request->immatriculation_num.'.'.$request->image[$i]->extension();
                $request->image[$i]->move(public_path('images'), $img_name);
                array_push($data, ["vehicule_id" => $last_id, "url" =>$img_name]);
            }
            ImageVehicule::insert($data);
        }

    //insert piece jointe
    if($request->has('piece_jointe')){
        check_piece_jointe($request, $last_id, 'vehicule_id');
    }
}

function delete_piece_jointe_vehicule($params){
    foreach($params as $param){
        if(!is_null($param)){
            $query = PieceJointeVehicule::where('id', $param)->pluck('pj_url');
            File::delete(public_path('images\\'. $query[0]));
            PieceJointeVehicule::destroy($param);
        }
    }
}

function delete_image_vehicule($params){
    foreach($params as $param){
        if(!is_null($param)){
            $query = ImageVehicule::where('id', $param)->pluck('url');
            File::delete(public_path('images\\'. $query[0]));
            ImageVehicule::destroy($param);
        }
    }
}

//This function checks if the vehicule Being deleted has images or/and piece jointe in the public/images folder and deletes them
//the rows in the related table will be deleted automatically because of the onDelete('cascade')
function check_img_pj_vehicule_delete($id){
    $query = ImageVehicule::where('vehicule_id', $id)->pluck('url');
        if(!$query->isEmpty()){
            if(!is_null($query[0])){
                File::delete(public_path('images\\'. $query[0]));
            }
        }
        $query = PieceJointeVehicule::where('vehicule_id', $id)->pluck('pj_url');
        if(!empty($query)){
            for($i=0; $i < count($query); $i++){                                                                                                               
                    File::delete(public_path('images\\'. $query[$i]));                                                                                                                                  
            }
        }
}

/******************************************** Entretient Delais******************************************/

function insert_entretient_delais($request, $last_id){
    if($request->has('km_visee')){
        $km_visee = $request->km_visee;
        $km_rappel = $request->km_rappel;
        $type_entretien_id = $request->type_entretien_id;
        $data = array();
        for($i=0; $i< count($km_visee); $i++){
            if(!is_null($km_visee[$i])){
                $data[] = [
                    "type_entretien_id" => $type_entretien_id[$i],
                    "vehicule_id" => $last_id,
                    "km_visee" => $km_visee[$i],
                    "km_rappel" => $km_rappel[$i],
                    "created_at" => Carbon::now(),
                    "updated_at" => Carbon::now()
                ];
            }
        }
        EntretientDelai::insert($data);
    }
}

function update_entretient_delais($request, $last_id){
    if($request->has('update_km_visee')){
        $km_visee = $request->update_km_visee;
        $km_rappel = $request->update_km_rappel;
        $type_entretien_id = $request->update_type_entretien_id;
        for($i=0; $i< count($km_visee); $i++){  
            EntretientDelai::where('vehicule_id', $last_id)->where('type_entretien_id', $type_entretien_id[$i])->update([
                "km_visee" => $km_visee[$i],
                "km_rappel" => $km_rappel[$i],
                "updated_at" => Carbon::now()
            ]);
        }
    }
}

function insert_credit_vehicule($request, $last_id){
    CreditVehicule::create([
        "vehicule_id" => $last_id,
        "organisation_id" => $request->organisation_id,
        "prix_vehicule" => $request->prix_vehicule,
        "apport" => $request->apport,
        "mensualite" => $request->mensualite,
        "date_debut" => $request->date_debut,
        "date_fin" => $request->date_fin
    ]);
}

//this function checks if the vehicule reffered to has already a row in creditVehicule table if yes it will update otherwise it will insert a new row
function update_credit_vehicule($request, $last_id){
    if(CreditVehicule::where("vehicule_id", $last_id)->exists()){
        CreditVehicule::where("vehicule_id", $last_id)->update([
            "organisation_id" => $request->organisation_id,
            "prix_vehicule" => $request->prix_vehicule,
            "apport" => $request->apport,
            "mensualite" => $request->mensualite,
            "date_debut" => $request->date_debut,
            "date_fin" => $request->date_fin
        ]);
    }else{
        insert_credit_vehicule($request, $last_id);
    }
}

function delete_credit_vehicule($id){
    CreditVehicule::where("vehicule_id", $id)->delete();
}

/******************************************** IncidentVehicule******************************************/

function insert_incident_detail($piece, $last_id){
    $data = array();
    for($i=0; $i < count($piece); $i++){
        if(!is_null($piece[$i])){
            $data[] = [
                "incident_vehicule_id" => $last_id,
                "piece" => $piece[$i],
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now()
            ];
        }
    }
    IncidentVehiculeDetail::insert($data);
}


/******************************************** Reservation******************************************/

function delete_piece_jointe_reservation($params){
    foreach($params as $param){
        if(!is_null($param)){
            $query = PieceJointeReservation::where('id', $param)->pluck('pj_url');
            File::delete(public_path('images\\'. $query[0]));
            PieceJointeReservation::destroy($param);
        }
    }
}


function check_pj_reservation_delete($id){
        $query = PieceJointeReservation::where('reservation_id', $id)->pluck('pj_url');
        if(!empty($query)){
            for($i=0; $i < count($query); $i++){                                                                                                               
                    File::delete(public_path('images\\'. $query[$i]));                                                                                                                                  
            }
        }
}

/**************************************** Contrat *******************/

function calculDateTime($date1, $date2){
    // Create DateTime objects from the string dates
    $date1 = new DateTime($date1);
    $date2 = new DateTime($date2);

    // Calculate the difference between the two dates
    $diff = $date1->diff($date2);

    // Get the total number of days, hours, and minutes from the DateInterval object
    $jours = $diff->days;
    $heures = $diff->h;
    $minutes = $diff->i;

    // Build the result string
    $result = $jours . " jours, " . $heures . " heures, " . $minutes ." minutes";
    return $result;
}

function periods(){
    return ".................................................";
}

function replaceNullWithPeriod($param){
    if(empty($param) || is_null($param) || $param == ""){
        return periods();
    }
    return $param;
}




?>