<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Client;
use App\Models\Gerant;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('users.login');
    }

    public function UserLoginPost(Request $request)
{
    

    // Valider les champs
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'user_type' => 'required',
    ]);

    // Récupérer les données
    $email = $request->input('email');
    $password = $request->input('password');
    $userType = $request->input('user_type');

    // Authentification selon le type
    if ($userType === 'admin') {
        $user = User::where('email', $email)->where('role_id', 3)->first();
        if ($user && Hash::check($password, $user->password)) {
            Auth::guard('web')->login($user);
            return redirect()->route('dashboard-admin');
        }
    } elseif ($userType === 'gerant') {
        $gerant = Gerant::where('email', $email)->first();
        if ($gerant && Hash::check($password, $gerant->password)) {
            Auth::guard('gerant')->login($gerant);
            return redirect()->route('dashboard-gerant');
        }
    } elseif ($userType === 'client') {
        $client = Client::where('email', $email)->first();
        if ($client && Hash::check($password, $client->password)) {
            Auth::guard('client')->login($client);
            return redirect()->route('dashboard-client');
        }
    }

    // En cas d'erreur, renvoyer avec message
    return back()->with('error', 'Email, mot de passe ou role incorrect.');
}

}
