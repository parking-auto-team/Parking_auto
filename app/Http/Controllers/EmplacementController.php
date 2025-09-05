<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Client;
use App\Models\Marque;
use App\Models\Vehicule;
use App\Models\Abonnement;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EmplacementController extends Controller
{
    // afficher la liste emplacement

public function liste()
{
    $now = Carbon::now();

    // Récupérer tous les véhicules avec abonnement
    $vehicules = Vehicule::with('abonnement', 'emplacement')->whereNotNull('abonnement_id')->get();

    foreach ($vehicules as $vehicule) {
        $abonnement = $vehicule->abonnement;
        if ($abonnement) {
            // Calculer la date de fin d'abonnement
            $dateDebut = $abonnement->created_at;
            $dureeMinutes = $abonnement->duree; // durée en minutes stockée
            $dateFin = $dateDebut->copy()->addMinutes($dureeMinutes);

            if ($now->greaterThan($dateFin)) {
                // Abonnement expiré : libérer l'emplacement
                if ($vehicule->emplacement) {
                    $vehicule->emplacement->update([
                        'status' => false,
                        'date_activate' => null,
                    ]);
                }
                // Déassocier véhicule de l'emplacement et abonnement
                $vehicule->update([
                    'emplacement_id' => null,
                    'abonnement_id' => null,
                ]);
            }
        }
    }

    // Ensuite récupérer la liste à afficher normalement
    $emplacements = Emplacement::orderBy('number', 'asc')->get();


    return view('emplacement.liste', compact('emplacements'));
}
// afficher la liste emplacement gerant

public function listeemplacement()
{
    $now = Carbon::now();

    // Récupérer tous les véhicules avec abonnement
    $vehicules = Vehicule::with('abonnement', 'emplacement')->whereNotNull('abonnement_id')->get();

    foreach ($vehicules as $vehicule) {
        $abonnement = $vehicule->abonnement;
        if ($abonnement) {
            // Calculer la date de fin d'abonnement
            $dateDebut = $abonnement->created_at;
            $dureeMinutes = $abonnement->duree; // durée en minutes stockée
            $dateFin = $dateDebut->copy()->addMinutes($dureeMinutes);

            if ($now->greaterThan($dateFin)) {
                // Abonnement expiré : libérer l'emplacement
                if ($vehicule->emplacement) {
                    $vehicule->emplacement->update([
                        'status' => false,
                        'date_activate' => null,
                    ]);
                }
                // Déassocier véhicule de l'emplacement et abonnement
                $vehicule->update([
                    'emplacement_id' => null,
                    'abonnement_id' => null,
                ]);
            }
        }
    }

    // Ensuite récupérer la liste à afficher normalement
    $emplacements = Emplacement::orderBy('number', 'asc')->get();


    return view('gerant.listeemplacement', compact('emplacements'));
}


public function Profile(Request $request,$id){
    $client = Client::find($id);
    $vehicule = Vehicule::where('client_id',$client->id)->get();
    // dd($vehicule);
    return view('client.profile', compact('client', 'vehicule'));
}

public function FormulaireVehicule(Request $request, $id){
    $client = Client::find($id);
    $types = Type::all();
    $marques = Marque::all();
    $abonnements = Abonnement::all();
    $emplacements = Emplacement::all();
    return view('client.formulaire', compact('types','marques', 'abonnements', 'emplacements', 'client'));
}


public function AjouterVehicule(Request $request){

    // Valider les données d'abord

    $validated = $request->validate([
        'matricule' => 'required|unique:vehicules,matricule',
        'marque_id' => 'required',
        'type_id' => 'required',
        'couleur' => 'required',
        'client_id' => 'required',
    ], [
        'matricule.unique' => 'Ce matricule est déjà attribué à un autre véhicule.',
    ]);

    // Créer le véhicule

    $vehicule = Vehicule::create([
        'matricule'=>$request->matricule,
        'marque_id'=>$request->marque_id,
        'couleur'=>$request->couleur,
        'type_id'=>$request->type_id,
         'client_id'=>$request->client_id,
     ]);
 return redirect()->route('tableclient');
// return back();
}

public function AttribuerPlace( $id){
    $emplacements = Emplacement::all();
    $vehicule = Vehicule::find($id);
    return view('client.place', compact('vehicule', 'emplacements'));
}

// activation de l'emplacement

public function ActivationEmplacement(Request $request, $id){
    // dd($request->all());

    $emplacement = Emplacement::find($request->emplacement_id);
    $vehicule = Vehicule::find($id);
    $d = $request->start_at;
    $f = $request->end_at;


    $end = Carbon::parse($request->end_at);
    $start_at = Carbon::now();
    $duree = $end->diffInDays($start_at)*1440;
    // dd($request->all());

    $abonnement = Abonnement::create([
        'duree'=>$duree,
        'montant'=>$request->montant,

    ]);
    $emplacement->update([
        'status'=>true,
        'date_activate'=>Carbon::now(),
    ]);
    $vehicule->update([
        'emplacement_id'=>$emplacement->id,
        'abonnement_id'=>$abonnement->id,
    ]);
    return back();

}

// Ajouter un emplacement de facon manuel

public function AjoutePlace(){
    return view('emplacement.ajouterplace');
}

public function CreatePlace(Request $request)
{
    $request->validate([
        'number' => ['required']
    ], [
        'number.required' => 'Le numéro est obligatoire.',
    ]);

    $rawNumber = trim($request->number);

    // Si commence par P-, on extrait la partie après
    if (str_starts_with($rawNumber, 'P-')) {
        $numberPart = substr($rawNumber, 2);

        // Vérifier que la partie après P- est numérique
        if (!ctype_digit($numberPart)) {
            return back()->withErrors(['number' => 'Après "P-", le numéro doit être uniquement composé de chiffres.'])->withInput();
        }

        $numberInt = (int)$numberPart;
    } else {
        // Si pas de P-, vérifier que tout est numérique
        if (!ctype_digit($rawNumber)) {
            return back()->withErrors(['number' => 'Le numéro doit être uniquement composé de chiffres.'])->withInput();
        }

        $numberInt = (int)$rawNumber;
    }

    $formattedNumber = 'P-' . str_pad($numberInt, 3, '0', STR_PAD_LEFT);

    // Vérifier après formatage
    if (Emplacement::where('number', $formattedNumber)->exists()) {
        return back()->withErrors(['number' => 'Ce numéro d\'emplacement existe déjà.'])->withInput();
    }

    Emplacement::create([
        'number' => $formattedNumber,
        'status' => false,
    ]);

    return redirect()->route('liste')->with('success', 'Emplacement créé avec succès !');
}


 // suprimer Emplacement
 public function DeletePlace($id){
    $emplacement = Emplacement::find($id);
    $emplacement->delete();
    $emplacement->update();

    return redirect()->route('liste');
}
//supprimer emplacement pour le gerant
public function DeletePlacegerant($id){
    $emplacement = Emplacement::find($id);
    $emplacement->delete();
    $emplacement->update();

    return redirect()->route('listeemplacement');
}




public function Attribuer(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'vehicule_id' => 'required|exists:vehicules,id',
            'emplacement_id' => 'required|exists:emplacements,id',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'montant' => 'required|numeric',
        ]);

        $vehicule = Vehicule::with(['marque', 'type', 'client'])->findOrFail($request->vehicule_id);

                // Vérifier si le véhicule est déjà attribué
        $vehicule = Vehicule::find($request->vehicule_id);
        if ($vehicule->emplacement_id) {
            return back()->with('error', 'Ce véhicule est déjà attribué à un emplacement.');
        }


        $emplacement = Emplacement::findOrFail($request->emplacement_id);
        $start_at = $request->start_at;
        $end_at = $request->end_at;
        $montant = $request->montant;

        $start = Carbon::parse($request->start_at);
        $end = Carbon::parse($request->end_at);
        $duree = $end->diffInMinutes($start);

        return view('factures.facture_preview', compact('vehicule', 'emplacement', 'start_at', 'end_at', 'montant', 'duree'));
    }

    // Ici on prépare les données pour afficher le formulaire (GET)
    $clients = Client::all();
    $vehicules = Vehicule::all();
    $emplacements = Emplacement::where('status', false)->orderBy('number', 'asc')->get();

    return view('client.Attribuer', compact('clients', 'vehicules', 'emplacements'));
}



    //attribuer place pour le gerant

    public function Attribuergerant(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'client_id' => 'required|exists:clients,id',
                'vehicule_id' => 'required|exists:vehicules,id',
                'emplacement_id' => 'required|exists:emplacements,id',
                'start_at' => 'required|date',
                'end_at' => 'required|date|after:start_at',
                'montant' => 'required|numeric',
            ]);

            $vehicule = Vehicule::with(['marque', 'type', 'client'])->findOrFail($request->vehicule_id);

                    // Vérifier si le véhicule est déjà attribué
            $vehicule = Vehicule::find($request->vehicule_id);
        if ($vehicule->emplacement_id) {
        return back()->with('error', 'Ce véhicule est déjà attribué à un emplacement.');
            }
            

            $emplacement = Emplacement::findOrFail($request->emplacement_id);
            $start_at = $request->start_at;
            $end_at = $request->end_at;
            $montant = $request->montant;

            $start = Carbon::parse($request->start_at);
            $end = Carbon::parse($request->end_at);
            $duree = $end->diffInMinutes($start);

        return view('factures.facturegerant_preview', compact('vehicule', 'emplacement', 'start_at', 'end_at', 'montant', 'duree'));
    }

        // Ici on prépare les données pour afficher le formulaire (GET)
    $clients = Client::all();
    $vehicules = Vehicule::all();
    $emplacements = Emplacement::where('status', false)->orderBy('number', 'asc')->get();

    return view('dashgerant.Attribuergerant', compact('clients', 'vehicules', 'emplacements'));
    }



//Ajouter place gerant
    public function AjoutePlacegerant(){
    return view('emplacement.ajouterplacegerant');
}

public function CreatePlacegerant(Request $request)
{
    $request->validate([
        'number' => ['required']
    ], [
        'number.required' => 'Le numéro est obligatoire.',
    ]);

    $rawNumber = trim($request->number);

    // Si commence par P-, on extrait la partie après
    if (str_starts_with($rawNumber, 'P-')) {
        $numberPart = substr($rawNumber, 2);

        // Vérifier que la partie après P- est numérique
        if (!ctype_digit($numberPart)) {
            return back()->withErrors(['number' => 'Après "P-", le numéro doit être uniquement composé de chiffres.'])->withInput();
        }

        $numberInt = (int)$numberPart;
    } else {
        // Si pas de P-, vérifier que tout est numérique
        if (!ctype_digit($rawNumber)) {
            return back()->withErrors(['number' => 'Le numéro doit être uniquement composé de chiffres.'])->withInput();
        }

        $numberInt = (int)$rawNumber;
    }

    $formattedNumber = 'P-' . str_pad($numberInt, 3, '0', STR_PAD_LEFT);

    // Vérifier après formatage
    if (Emplacement::where('number', $formattedNumber)->exists()) {
        return back()->withErrors(['number' => 'Ce numéro d\'emplacement existe déjà.'])->withInput();
    }

    Emplacement::create([
        'number' => $formattedNumber,
        'status' => false,
    ]);

    return redirect()->route('listeemplacement')->with('success', 'Emplacement créé avec succès !');
}

//liberer les emplacements

public function LibererEmplacement($id)
{
    $emplacement = Emplacement::findOrFail($id);

    // Libérer l'emplacement
    $emplacement->update([
        'status' => false,
        'date_activate' => null,
    ]);

    if ($emplacement->vehicule) {
        $emplacement->vehicule->update([
            'emplacement_id' => null,
            'abonnement_id' => null,
        ]);
    }

    if (request()->ajax()) {
        return response()->json(['success' => true, 'message' => 'Emplacement libéré avec succès !']);
    }

    return redirect()->back()->with('success', 'Emplacement libéré avec succès !');
}

//supprimer un vehicule
public function DeleteVehicule($id)
{
    // Récupérer le véhicule
    $vehicule = Vehicule::findOrFail($id);

    // Libérer l'emplacement si attribué
    if ($vehicule->emplacement) {
        $vehicule->emplacement->update([
            'status' => false,
            'date_activate' => null,
        ]);

        // Supprimer aussi la relation
        $vehicule->update([
            'emplacement_id' => null,
            'abonnement_id' => null,
        ]);
    }

    // Supprimer le véhicule
    $vehicule->delete();

    return redirect()->back()->with('success', 'Véhicule supprimé et emplacement libéré avec succès.');
}



}
