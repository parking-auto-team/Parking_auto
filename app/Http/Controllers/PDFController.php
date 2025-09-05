<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Client;
use App\Models\Marque;
use App\Models\Vehicule;
use App\Models\Abonnement;
use App\Models\Emplacement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class PDFController extends Controller
{

    public function preview($id)
    {   $vehicules = Vehicule::find($id);
        // dd($vehicules);
        $client = Client::find($id);
        return view('factures.preview',compact('vehicules', 'client'));
    }

    

    public function Generate(){
        return view('factures.generate');
    }


   public function generatePdf($id)
    {
        $vehicule = Vehicule::with(['marque', 'type', 'client', 'abonnement'])->findOrFail($id);

        if (!$vehicule->abonnement) {
            abort(404, 'Aucun abonnement trouvé pour ce véhicule.');
        }

            // Générer le PDF et le stocker temporairement
        $pdf = PDF::loadView('factures.facture_preview_pdf', compact('vehicule'));
        $fileName = 'Facture_' . $vehicule->matricule . '.pdf';

        // On sauvegarde temporairement dans storage
        $filePath = storage_path('app/public/' . $fileName);
        $pdf->save($filePath);

        return view('factures.redirection_pdf', [
        'fileName' => $fileName,
        'redirectRoute' => route('liste'),
        ]);
    }

    public function generatePdfgerant($id)
    {
        $vehicule = Vehicule::with(['marque', 'type', 'client', 'abonnement'])->findOrFail($id);

        if (!$vehicule->abonnement) {
            abort(404, 'Aucun abonnement trouvé pour ce véhicule.');
        }

            // Générer le PDF et le stocker temporairement
        $pdf = PDF::loadView('factures.facture_preview_pdf', compact('vehicule'));
        $fileName = 'Facture_' . $vehicule->matricule . '.pdf';

        // On sauvegarde temporairement dans storage
        $filePath = storage_path('app/public/' . $fileName);
        $pdf->save($filePath);
        
        return view('factures.redirectiongerant_pdf', [
        'fileName' => $fileName,
        'redirectRoute' => route('listeemplacement'),
        ]);
    }

    // Prévisualiser la facture
    public function facturePreview($id)
    {
        $vehicule = Vehicule::with(['marque', 'type', 'client', 'abonnement'])->findOrFail($id);

        if (!$vehicule->abonnement) {
            abort(404, 'Aucun abonnement trouvé pour ce véhicule.');
        }

        return view('factures.facture_preview_pdf', compact('vehicule'));
    }

    public function facturegerantPreview($id)
    {
        $vehicule = Vehicule::with(['marque', 'type', 'client', 'abonnement'])->findOrFail($id);

        if (!$vehicule->abonnement) {
            abort(404, 'Aucun abonnement trouvé pour ce véhicule.');
        }

        return view('factures.facture_preview_pdf', compact('vehicule'));
    }


   public function confirmerAttribution(Request $request, $id)
    {
        $vehicule = Vehicule::findOrFail($id);

        $request->validate([
            'emplacement_id' => 'required|exists:emplacements,id',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'montant' => 'required|numeric',
        ]);

        if ($vehicule->emplacement_id) {
            return back()->with('error', 'Ce véhicule est déjà attribué.');
        }

        $emplacement = Emplacement::findOrFail($request->emplacement_id);

        $start = Carbon::parse($request->start_at);
        $end = Carbon::parse($request->end_at);
        $duree = $end->diffInMinutes($start);

        $abonnement = Abonnement::create([
            'vehicule_id' => $vehicule->id,
            'duree' => $duree,
            'montant' => $request->montant,
        ]);

        $emplacement->update([
            'status' => true,
            'date_activate' => Carbon::now(),
        ]);

        $vehicule->update([
            'emplacement_id' => $emplacement->id,
            'abonnement_id' => $abonnement->id,
        ]);

        // ⚡ Recharge les relations
        $vehicule->refresh();

        return redirect()->route('facture.pdf', ['id' => $vehicule->id])->with('success', 'Attribution confirmée !');
    }


    public function confirmerAttributiongerant(Request $request, $id)
    {
        $vehicule = Vehicule::findOrFail($id);

        $request->validate([
            'emplacement_id' => 'required|exists:emplacements,id',
            'start_at' => 'required|date',
            'end_at' => 'required|date|after:start_at',
            'montant' => 'required|numeric',
        ]);

        if ($vehicule->emplacement_id) {
            return back()->with('error', 'Ce véhicule est déjà attribué.');
        }

        $emplacement = Emplacement::findOrFail($request->emplacement_id);

        $start = Carbon::parse($request->start_at);
        $end = Carbon::parse($request->end_at);
        $duree = $end->diffInMinutes($start);

        $abonnement = Abonnement::create([
            'vehicule_id' => $vehicule->id,
            'duree' => $duree,
            'montant' => $request->montant,
        ]);

        $emplacement->update([
            'status' => true,
            'date_activate' => Carbon::now(),
        ]);

        $vehicule->update([
            'emplacement_id' => $emplacement->id,
            'abonnement_id' => $abonnement->id,
        ]);

        // ⚡ Recharge les relations
        $vehicule->refresh();

        return redirect()->route('facturegerant.pdf', ['id' => $vehicule->id])->with('success', 'Attribution confirmée !');
    }



    public function show($vehicule_id)
{
    $vehicule = Vehicule::with(['marque', 'type', 'client', 'abonnement'])->findOrFail($vehicule_id);

    if (!$vehicule->abonnement) {
        return redirect()->back()->with('error', 'Ce véhicule ne possède pas d’abonnement.');
    }

    // Optionnel : contrôle d'accès ici

    return view('factures.facture_preview_pdf', compact('vehicule'));
}


}
