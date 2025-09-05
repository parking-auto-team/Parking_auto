<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Client;
use App\Models\Gerant;
use App\Models\Marque;
use App\Models\Couleur;
use App\Models\Vehicule;
use App\Models\Abonnement;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function DashGerant(Request $request){
        // Clients
    $clients = Client::count();

    // Emplacements
    $emplacementsTotal = Emplacement::count();
    $emplacementsLibres = Emplacement::where('status', false)->count();
    $emplacementsOccupes = Emplacement::where('status', true)->count();

    // Véhicules
    $totalVehicules = Vehicule::count();
    $vehiculesAttribues = Vehicule::whereNotNull('emplacement_id')->count();
    $vehiculesNonAttribues = Vehicule::whereNull('emplacement_id')->count();

    // Abonnements
    $abonnements = Abonnement::count();

    return view('users.dashboardgerant', compact(
        'clients',
        'emplacementsTotal',
        'emplacementsLibres',
        'emplacementsOccupes',
        'totalVehicules',
        'vehiculesAttribues',
        'vehiculesNonAttribues',
        'abonnements'
    ));
    }

    public function DashClient(){
         $client = Auth::guard('client')->user()->load('vehicules.Abonnement');
         
        return view('users.dashboardclient', compact('client'));
    }

  public function DashAdmin(Request $request)
{
    // Clients
    $clients = Client::count();

    // Emplacements
    $emplacementsTotal = Emplacement::count();
    $emplacementsLibres = Emplacement::where('status', false)->count();
    $emplacementsOccupes = Emplacement::where('status', true)->count();

    // Véhicules
    $totalVehicules = Vehicule::count();
    $vehiculesAttribues = Vehicule::whereNotNull('emplacement_id')->count();
    $vehiculesNonAttribues = Vehicule::whereNull('emplacement_id')->count();

    // Abonnements
    $abonnements = Abonnement::count();

    return view('users.dashboardadmin', compact(
        'clients',
        'emplacementsTotal',
        'emplacementsLibres',
        'emplacementsOccupes',
        'totalVehicules',
        'vehiculesAttribues',
        'vehiculesNonAttribues',
        'abonnements'
    ));
}


public function ListeAbonnements()
{
    $abonnements = Abonnement::with(['client', 'vehicule', 'emplacement'])->get();
    $vehicules = Vehicule::all();
    return view('users.listeabonnements', compact('abonnements', 'vehicules'));
}

    


public function index()
{
    $abonnements = Abonnement::all();
return view('users.listeabonnements', compact('abonnements'));

}



public function reinitialiser()
{
    DB::transaction(function () {
        DB::table('abonnement_vehicule')->delete();
        Abonnement::query()->delete(); // ✅ ici
    });

    return redirect()->back()->with('success', 'Tous les abonnements ont été supprimés avec succès.');
}







public function ListeAbonnementsgerant()
{
    $abonnements = Abonnement::with(['client', 'vehicule', 'emplacement'])->get();
    $vehicules = Vehicule::find($id);
    return view('users.ListeAbonnementsgerant', compact('abonnements'));
}





}
