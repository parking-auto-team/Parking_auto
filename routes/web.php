<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GerantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmplacementController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Ici on définit toutes les routes accessibles sur le web.
| Chaque bloc est organisé et commenté pour une meilleure lisibilité.
*/

/*
|--------------------------------------------------------------------------
| AUTHENTIFICATION
|--------------------------------------------------------------------------
*/

// Page de connexion
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Traitement du formulaire de connexion
Route::post('/login', [AuthController::class, 'UserLoginPost'])->name('login.submit');

// Déconnexion
Route::get('/logout', [UserController::class, 'Logout'])->name('logout');

// (Optionnel) Page de login aussi accessible à la racine si souhaité
Route::get('/', [AuthController::class, 'showLoginForm']);

/*
|--------------------------------------------------------------------------
| DASHBOARD (protégé par middleware auth)
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/admin', [DashboardController::class, 'DashAdmin'])
        ->middleware('auth') // par défaut pour admin
        ->name('dashboard-admin');

    Route::get('/client', [DashboardController::class, 'DashClient'])
        ->middleware('auth:client')
        ->name('dashboard-client');

    Route::get('/gerant', [DashboardController::class, 'DashGerant'])
        ->middleware('auth:gerant') 
        ->name('dashboard-gerant');
});


/*
|--------------------------------------------------------------------------
| CLIENTS
|--------------------------------------------------------------------------
*/

// Afficher table clients
Route::get('/tableclient', [UserController::class, 'TableClient'])->name('tableclient');

// Ajouter un client
Route::get('/dashboard/ajouterclient', [UserController::class, 'AjouterClient'])->name('ajouter-client');
Route::post('/dashboard/enregistrerclient', [UserController::class, 'EnregistrerClient'])->name('enregistrer-client');

// Editer un client
Route::get('/dashboard/editclient/{id}', [UserController::class, 'EditClient'])->name('edit-client');
Route::post('/dashboard/updateclient/{id}', [UserController::class, 'UpdateClient'])->name('update-client');
Route::post('/reinitialiser-motdepasse-client/{id}', [UserController::class, 'ReinitialiserMotdepasseClient'])->name('reinitialiser-motdepasse-client');
Route::middleware(['auth:client'])->group(function () {
    Route::get('/client/Formulaire-mot-de-passe/', [UserController::class, 'affichermdpC'])
    ->name('client.afficher-password');
    Route::post('/client/confirmermdp', [ UserController::class, 'updatePasswordC'])
    ->name('clientmdp');
});

// Editer client pour le gérant
Route::get('/dashboard/editclientgerant/{id}', [UserController::class, 'EditClientgerant'])->name('edit-clientgerant');
Route::post('/dashboard/updateclientgerant/{id}', [UserController::class, 'UpdateClientgerant'])->name('update-clientgerant');

// Supprimer un client
Route::get('/dashboard/deleteclient/{id}', [UserController::class, 'DeleteClient'])->name('delete-client');

/*
|--------------------------------------------------------------------------
| GERANTS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:gerant'])->group(function () {
    Route::get('/gerant/Formulaire-mot-de-passe/', [GerantController::class, 'affichermdp'])
    ->name('gerant.afficher-password');
    Route::post('/gerant/confirmermdp', [ GerantController::class, 'updatePassword'])
    ->name('gerantmdp');
});


Route::get('/tablegerant', [UserController::class, 'TableGerant'])->name('tablegerant');

// Ajouter un gérant
Route::get('/dashboard/ajoutergerant', [GerantController::class, 'AjouterGerant'])->name('ajouter-gerant');
Route::post('/dashboard/enregistrergerant', [GerantController::class, 'EnregistrerGerant'])->name('enregistrer-gerant');

// Editer un gérant
Route::get('/dashboard/editergerant/{id}', [GerantController::class, 'EditerGerant'])->name('editer-gerant');
Route::post('/dashboard/updategerant/{id}', [GerantController::class, 'UpdateGerant'])->name('update-gerant');
Route::post('/reinitialiser-motdepasse-gerant/{id}', [GerantController::class, 'ReinitialiserMotdepasseGerant'])->name('reinitialiser-motdepasse-gerant');


// Supprimer un gérant
Route::get('/dashboard/deletegerant/{id}', [GerantController::class, 'DeleteGerant'])->name('delete-gerant');

/*
|--------------------------------------------------------------------------
| EMPLACEMENTS
|--------------------------------------------------------------------------
*/

// Liste des emplacements
Route::get('/liste', [EmplacementController::class, 'Liste'])->name('liste');

// Ajouter un emplacement (admin)
Route::get('/ajouterplace', [EmplacementController::class, 'AjoutePlace'])->name('ajouterplace');
Route::post('/createplace', [EmplacementController::class, 'CreatePlace'])->name('createplace');

// Ajouter un emplacement (gérant)
Route::get('/ajouterplacegerant', [EmplacementController::class, 'AjoutePlacegerant'])->name('ajouterplacegerant');
Route::post('/createplacegerant', [EmplacementController::class, 'CreatePlacegerant'])->name('createplacegerant');

// Supprimer un emplacement
Route::get('/deleteplace/{id}', [EmplacementController::class, 'DeletePlace'])->name('deleteplace');
Route::get('/deleteplacegerant/{id}', [EmplacementController::class, 'deleteplacegerant'])->name('deleteplacegerant');

// Désactiver ou libérer emplacement
Route::get('/liberer-emplacement/{id}', [EmplacementController::class, 'LibererEmplacement'])->name('liberer-emplacement');

// Activation
Route::post('/activation/{id}', [EmplacementController::class, 'ActivationEmplacement'])->name('activation');

// Actualiser
Route::get('/actualiser/{id}', [EmplacementController::class, 'Actualiser'])->name('actualiser');

/*
|--------------------------------------------------------------------------
| ATTRIBUTION PLACES & VEHICULES
|--------------------------------------------------------------------------
*/

Route::get('/attribuerplace/{id}', [EmplacementController::class, 'AttribuerPlace'])->name('attribuer-place');
Route::match(['get', 'post'], '/Attribuer', [EmplacementController::class, 'Attribuer'])->name('Attribuer');
Route::match(['get', 'post'], '/Attribuergerant', [EmplacementController::class, 'Attribuergerant'])->name('Attribuergerant');

// Ajouter un véhicule
Route::get('/formulairevehicule/{id}', [EmplacementController::class, 'FormulaireVehicule'])->name('formualire-vehicule');
Route::post('/ajoutervehicule', [EmplacementController::class, 'AjouterVehicule'])->name('ajouter-vehicule');

// Supprimer un véhicule
Route::delete('/vehicule/{id}', [EmplacementController::class, 'DeleteVehicule'])->name('delete-vehicule');

/*
|--------------------------------------------------------------------------
| FACTURES & PDF
|--------------------------------------------------------------------------
*/

// Prévisualiser la facture
Route::get('/facture/preview/{id}', [PDFController::class, 'facturePreview'])->name('facture.preview');
Route::get('/facture/pdf/{id}', [PDFController::class, 'generatePdf'])->name('facture.pdf');
Route::post('/attribuer/confirmer/{id}', [PDFController::class, 'confirmerAttribution'])->name('attribuer.confirmer');
Route::get('/facture/{vehicule}', [PDFController::class, 'show'])->name('abonnements.facture');


// Gérant
Route::get('/facturegerant/preview/{id}', [PDFController::class, 'facturegerantPreview'])->name('facturegerant.preview');
Route::get('/facturegerant/pdf/{id}', [PDFController::class, 'generatePdfgerant'])->name('facturegerant.pdf');
Route::post('/attribuergerant/confirmer/{id}', [PDFController::class, 'confirmerAttributiongerant'])->name('attribuergerant.confirmer');

/*
|--------------------------------------------------------------------------
| AUTRES
|--------------------------------------------------------------------------
*/

Route::get('/profile/{id}', [EmplacementController::class, 'Profile'])->name('profile');

Route::get('/afficherclient', [GerantController::class, 'AfficherClient'])->name('afficherclient');
Route::get('/affichergerant', [GerantController::class, 'AfficherGerant'])->name('affichergerant');
Route::get('/voirprofile/{id}', [GerantController::class, 'VoirProfile'])->name('voirprofile');
Route::get('/viewvehicule/{id}', [GerantController::class, 'ViewVehicule'])->name('viewvehicule');
Route::post('/addvehicule', [GerantController::class, 'AddVehicule'])->name('addvehicule');
Route::get('/donnerplace/{id}', [GerantController::class, 'DonnerPlace'])->name('donnerplace');
Route::get('/addclient', [GerantController::class, 'AddClient'])->name('addclient');
Route::post('/enregistrer', [GerantController::class, 'Enregistrer'])->name('enregistrer');
Route::get('/listeemplacement', [GerantController::class, 'ListeEmplacement'])->name('listeemplacement');

// Abonnements
Route::get('/liste-abonnements', [DashboardController::class, 'ListeAbonnements'])->name('liste-abonnements');
Route::get('/liste-abonnementsgerant', [DashboardController::class, 'ListeAbonnementsgerant'])->name('liste-abonnementsgerant');
Route::get('/abonnements', [DashboardController::class, 'index'])->name('abonnements.liste');


// Calculer la durée
Route::get('/duree', [EmplacementController::class, 'Duree'])->name('duree');

Route::delete('/abonnements/reinitialiser', [DashboardController::class, 'reinitialiser'])->name('abonnements.reinitialiser');
