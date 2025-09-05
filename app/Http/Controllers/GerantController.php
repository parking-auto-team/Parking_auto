<?php

namespace App\Http\Controllers;

use delete;
use update;
use Carbon\Carbon;
use App\Models\Type;
use App\Models\Client;
use App\Models\Gerant;
use App\Models\Marque;
use App\Models\Vehicule;
use App\Models\Abonnement;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GerantController extends Controller
{
    
    // ajouter gerant
    public function AjouterGerant(){
        return view('gerant.ajouter');
    }

    // enregistrer gerant

public function EnregistrerGerant(Request $request)
{
    $request->validate([
        'name' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:gerants,email',
        'password' => 'required|min:5', // tu peux l'adapter si tu veux
    ]);

    Gerant::create([
        'name' => $request->name,
        'lastname' => $request->lastname,
        'address' => $request->address,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => \Hash::make($request->password),
    ]);

    return redirect()->route('tablegerant')->with('success', 'Gérant ajouté avec succès');
}

    // editer gerant

    public function EditerGerant(Request $request, $id){
        $gerant = Gerant::findOrFail($id);
        return view('gerant.editer', compact('gerant'));
    }

    // update gerant

    public function UpdateGerant(Request $request, $id){
        $modification = $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'address'=>'required',
            'phone'=>'required',

        ]);
        Gerant::whereId($id)->update($modification);
        return redirect()->route('tablegerant')->with('succes','modification prise en compte');
    }

    // supprimer gerant
    public function DeleteGerant($id){
        $gerants = Gerant::find($id);
        $gerants->delete($id);
        $gerants->update();

        return redirect()->back();
    }


    public function AfficherClient(){
        $clients = Client::all();
        return view('dashgerant.client', compact('clients'));
    }

    public function AfficherGerant(){
        $gerant = Auth::guard('gerant')->user();
        return view('dashgerant.gerant', compact('gerant'));
    }


    // voir profile client sur le dashboard DeleteGerant
    public function VoirProfile($id){
        $client = Client::find($id);
    $vehicule = Vehicule::where('client_id',$client->id)->get();
        return view('dashgerant.profile', compact('client', 'vehicule'));
    }

    // voir la vue ajouter vehicule sur le dashboard gerant
    public function ViewVehicule(Request $request, $id){
        $client = Client::find($id);
        $types = Type::all();
        $marques = Marque::all();
        $abonnements = Abonnement::all();
        $emplacements = Emplacement::all();
        return view('dashgerant.viewvehicule', compact('types','marques', 'abonnements', 'emplacements', 'client'));
    }

    public function AddVehicule(Request $request){
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
 return redirect()->route('afficherclient');
// return back();
    }

    public function DonnerPlace($id){
    $emplacements = Emplacement::all();
    $vehicule = Vehicule::find($id);
    return view('dashgerant.park', compact('vehicule', 'emplacements'));
    }
    // vue ajouter client sur le dashboard gerant

    public function AddClient(){
        $emplacements = Emplacement::all();
        $abonnements = Abonnement::all();
        $marques = Marque::all();
        $clients = Client::all();
        $types = Type::all();
        return view('dashgerant.ajouterclient', compact('marques', 'types', 'abonnements', 'emplacements', 'clients'));
    }

    // enregistrer client
    public function Enregistrer(Request $request){
        $request->validate([
        'name' => 'required',
        'lastname' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'required|email|unique:clients,email',
        'password' => 'required|min:5', // tu peux l'adapter si tu veux
    ]);
         $client = Client::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            'vehicule_id'=>$request->vehicule_id,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
         ]);

     return redirect()->route('afficherclient')->with('success', 'Client ajouté avec succès');
     }

    //  afficher liste emplacement

    public function ListeEmplacement(){
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

    public function ReinitialiserMotdepasseGerant($id)
{
    $gerant = Gerant::findOrFail($id);
    $gerant->password = \Hash::make('12345');
    $gerant->save();

    return back()->with('success', 'Mot de passe réinitialisé à 12345 avec succès !');
}

public function affichermdp(){

    return view('dashgerant.changer_mdp');
}




public function updatePassword(Request $request)
{
    // Étape 1 : Validation des champs requis
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required',
        'new_password_confirmation' => 'required',
    ]);

    $gerant = auth()->guard('gerant')->user();

    // Étape 2 : Vérifier si le mot de passe actuel est correct
    if (!Hash::check($request->current_password, $gerant->password)) {
        return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
    }

    // Étape 3 : Vérifier si le nouveau mot de passe a au moins 5 caractères
    if (strlen($request->new_password) < 5) {
        return back()->withErrors(['new_password' => 'Mot de passe trop court.']);
    }

    // Étape 4 : Vérifier si les deux nouveaux mots de passe sont identiques
    if ($request->new_password !== $request->new_password_confirmation) {
        return back()->withErrors(['new_password' => 'Le nouveau mot de passe et sa confirmation sont différents.']);
    }

    // Étape 5 : Vérifier si le nouveau mot de passe est différent de l’actuel
    if (Hash::check($request->new_password, $gerant->password)) {
        return back()->withErrors(['new_password' => 'Le nouveau mot de passe doit être différent de l\'ancien.']);
    }

    // Étape 6 : Mise à jour du mot de passe
    $gerant->password = Hash::make($request->new_password);
    $gerant->save();
    Auth::guard('gerant')->login($gerant);


    return back()->with('status', 'Mot de passe mis à jour avec succès.');
}

}
