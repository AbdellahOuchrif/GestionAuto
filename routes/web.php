<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\EtatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\AssuranceController;
use App\Http\Controllers\ConducteurController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ModePaiementController;
use App\Http\Controllers\OrganisationController;
use App\Http\Controllers\TypeVehiculeController;
use App\Http\Controllers\LocationTableController;
use App\Http\Controllers\ModelVehiculeController;
use App\Http\Controllers\PieceVehiculeController;
use App\Http\Controllers\TypeEntretienController;
use App\Http\Controllers\MarqueVehiculeController;
use App\Http\Controllers\CouleurVehiculeController;
use App\Http\Controllers\OptionAssuranceController;
use App\Http\Controllers\IncidentVehiculeController;
use App\Http\Controllers\TransmissionVehiculeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/generate-pdf/{id}', [PDFController::class, 'generatePDF'])->name('generate-pdf');
Route::resource('/TypeEntretien', TypeEntretienController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/Etat', EtatController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/Document', DocumentController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/ModePaiement', ModePaiementController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/PieceVehicule', PieceVehiculeController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/TransmissionVehicule', TransmissionVehiculeController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/CouleurVehicule', CouleurVehiculeController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/MarqueVehicule', MarqueVehiculeController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/ModelVehicule', ModelVehiculeController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/Organisation', OrganisationController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/TypeVehicule', TypeVehiculeController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/Assurance', AssuranceController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::get('/OptionAssurance/Select/{id}', [OptionAssuranceController::class, 'Select'])->name('OptionAssurance.Select');
Route::resource('/OptionAssurance', OptionAssuranceController::class, ['only' => ['index', 'store', 'update', 'destroy']]);
Route::resource('/Client', ClientController::class);
Route::resource('/Reservation', ReservationController::class);
Route::resource('/Vehicule', VehiculeController::class);
Route::get('/Search', [SearchController::class, 'index'])->name('Search');
Route::get('IncidentVehicule/create/{param}', [IncidentVehiculeController::class, 'create'])->name('IncidentVehicule.create');
Route::post('IncidentVehicule/storeIncidentLocation', [IncidentVehiculeController::class, 'storeIncidentLocation'])->name('IncidentVehicule.storeIncidentLocation');
Route::post('IncidentVehicule/storeIncidentVehicule', [IncidentVehiculeController::class, 'storeIncidentVehicule'])->name('IncidentVehicule.storeIncidentVehicule');
Route::resource('IncidentVehicule', IncidentVehiculeController::class)->except('create', 'store');
Route::get('Location/create/{param}/{id}', [LocationController::class, 'create'])->name('Location.create');
Route::get('Location/client', [LocationController::class, 'client'])->name('Location.client');
Route::post('Location/storeLocation', [LocationController::class, 'storeLocationReservation'])->name('Location.storeLocationReservation');
Route::post('Location/storeLocation', [LocationController::class, 'storeLocationVehicule'])->name('Location.storeLocationVehicule');
Route::get('LocationTable', [LocationTableController::class, 'index'])->name('LocationTable');
Route::get('Location/contrat/{id}', [LocationController::class, 'contrat'])->name('Location.contrat');
Route::get('Location/Client/{id}', [LocationController::class, 'selectclient'])->name('Location.selectclient');
Route::get('Location/Retour/{id}', [LocationController::class, 'createRetour'])->name('Location.createRetour');
Route::post('Location/storeRetour', [LocationController::class, 'storeRetour'])->name('Location.storeRetour');
Route::resource('/Location', LocationController::class)->except('create');
Route::post('Conducteur/store', [ConducteurController::class, 'store'])->name('Conducteur.store');
Route::get('Conducteur/{id}', [ConducteurController::class, 'show'])->name('Conducteur.show');
Route::get('Conducteur/migrate/{id}', [ConducteurController::class, 'MigrateConducteur'])->name('Conducteur.migrate');
Route::patch('Conducteur/update/{id}', [ConducteurController::class, 'update'])->name('Conducteur.update');
Route::post('Client/incompleteStore', [ClientController::class, 'incompleteStore'])->name('ClientIncomplete.store');
Route::patch('Client/indirectUpdate/{id}', [ClientController::class, 'indirectUpdate'])->name('ClientIndirect.update');
Route::get('Location/Canvas/{id}', [LocationController::class, 'ShowCanvas'])->name('Location.canvas');
Route::resource('/Utilisateur', UserController::class);

