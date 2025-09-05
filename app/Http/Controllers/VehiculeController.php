<?php

// app/Http/Controllers/VehiculeController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = 42; // Remplacer par une requête DB (ex: DB::table('vehicules')->count())
        $maxVehicules = 100;  // Valeur maximale pour le calcul du pourcentage
        $vehiculesPercentage = ($vehicules / $maxVehicules) * 100;

        return view('vehicules', compact('vehicules', 'vehiculesPercentage'));
    }
}