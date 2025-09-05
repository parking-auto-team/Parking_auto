<?php

namespace App\Http\Controllers;


use App\Models\Type;
use App\Models\Client;
use App\Models\Gerant;
use App\Models\Marque;
use App\Models\Facture;
use App\Models\Abonnement;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use App\Http\Requests\RequestUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;

class UserController extends Controller
{
    public function UserLogin(){
        return view('users.login');
    }

    // authentification du user

    public function UserLoginPost(RequestUser $request){
        // dd($request->all());
        if(!Auth::attempt(['email' => $request->email, 'password' =>$request->password])){
            return back()->with([
                'title'=>" Acces non autorise"
            ]);
        }
        $user = Auth::user();
            if($user->role_id==1){
                return redirect()->route('dashboard-gerant');
            }
            if($user->role_id==2){
                return redirect()->route('dashboard-client');
            }
            if($user->role_id==3){
                return redirect()->route('dashboard-admin');
            }
        return 'erreur';

    }

    public function Logout(){
        Auth::logout();
        return redirect()->route('login');
    }



    // ajouter client
    public function AjouterClient(){
        $emplacements = Emplacement::all();
        $abonnements = Abonnement::all();
        $marques = Marque::all();
        $clients = Client::all();
        $types = Type::all();
        return view('client.ajouter', compact('marques', 'types', 'abonnements', 'emplacements', 'clients'));
    }

    // enregistrer client
    public function EnregistrerClient(Request $request){

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

     return redirect()->route('tableclient')->with('success', 'Client ajouté avec succès');
     }


        // editer client
    public function EditClient(Request $request, $id){
        $client = Client::findOrFail($id);
        $types = Type::all();
        $marques = Marque::all();
        $abonnements = Abonnement::all();
        $emplacements = Emplacement::all();
        return view('client.edit', compact('client','types', 'marques', 'abonnements', 'emplacements'));
    }
         // editer client pour le gerant

    public function EditClientgerant(Request $request, $id){
        $client = Client::findOrFail($id);
        $types = Type::all();
        $marques = Marque::all();
        $abonnements = Abonnement::all();
        $emplacements = Emplacement::all();
        return view('dashgerant.editerclientgerant', compact('client','types', 'marques', 'abonnements', 'emplacements'));
    }

    // update client

    public function UpdateClient(Request $request, $id){
        $edit = $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'address'=>'required',
            'phone'=>'required',

        ]);
        Client::whereId($id)->update($edit);
        return redirect()->route('tableclient');
    }
//update client pour le gerant
    public function UpdateClientgerant(Request $request, $id){
        $edit = $request->validate([
            'name'=>'required',
            'lastname'=>'required',
            'address'=>'required',
            'phone'=>'required',

        ]);
        Client::whereId($id)->update($edit);
        return redirect()->route('afficherclient');
    }
    // suprimer client
    public function DeleteClient($id){
        $clients = Client::find($id);
        $clients->delete();
        $clients->update();

        return redirect()->back();
    }


    // afficher table client

    public function TableClient(){
        $clients = Client::all();
        $emplacements = Emplacement::get();

        return view('tables.client', compact('clients', 'emplacements'));
    }

    // afficher table gerant

    public function TableGerant(){
        $gerants = Gerant::all();
        return view('tables.gerant', compact('gerants'));
    }

 
    public function ReinitialiserMotdepasseClient($id)
    {
        $client = Client::findOrFail($id);
        $client->password = \Hash::make('12345');
        $client->save();

        return back()->with('success', 'Mot de passe réinitialisé à 12345 avec succès !');
    }
 

public function affichermdpC(){

    return view('client.changer_mdp');
}




public function updatePasswordC(Request $request)
{
    // Étape 1 : Validation des champs requis
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required',
        'new_password_confirmation' => 'required',
    ]);

    $client = auth()->guard('client')->user();

    // Étape 2 : Vérifier si le mot de passe actuel est correct
    if (!Hash::check($request->current_password, $client->password)) {
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
    if (Hash::check($request->new_password, $client->password)) {
        return back()->withErrors(['new_password' => 'Le nouveau mot de passe doit être différent de l\'ancien.']);
    }

    // Étape 6 : Mise à jour du mot de passe
    $client->password = Hash::make($request->new_password);
    $client->save();
    Auth::guard('client')->login($client);


    return back()->with('status', 'Mot de passe mis à jour avec succès.');
}





}


