<?php
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Vehicule;
use App\Models\Emplacement;
use App\Models\Abonnement;

class AttribuerController extends Controller
{
    public function preview(Request $request)
    {
        $validated = $request->validate([
            'client_id'      => 'required|exists:clients,id',
            'vehicule_id'    => 'required|exists:vehicules,id',
            'emplacement_id' => 'required|exists:emplacements,id',
            'start_at'       => 'required|date',
            'end_at'         => 'required|date|after:start_at',
            'montant'        => 'required|numeric',
        ]);

        $client = Client::find($validated['client_id']);
        $vehicule = Vehicule::find($validated['vehicule_id']);
        $emplacement = Emplacement::find($validated['emplacement_id']);

        // On passe aussi les données validées à la vue pour les inputs cachés
        return view('factures.facture_preview', [
            'client'      => $client,
            'vehicule'    => $vehicule,
            'emplacement' => $emplacement,
            'start_at'    => $validated['start_at'],
            'end_at'      => $validated['end_at'],
            'montant'     => $validated['montant'],
            'data'        => $validated,
        ]);
    }

    public function confirm(Request $request)
    {
        $validated = $request->validate([
            'client_id'      => 'required|exists:clients,id',
            'vehicule_id'    => 'required|exists:vehicules,id',
            'emplacement_id' => 'required|exists:emplacements,id',
            'start_at'       => 'required|date',
            'end_at'         => 'required|date|after:start_at',
            'montant'        => 'required|numeric',
        ]);

        // Enregistrer l'abonnement
        $abonnement = new Abonnement();
        $abonnement->client_id      = $validated['client_id'];
        $abonnement->vehicule_id    = $validated['vehicule_id'];
        $abonnement->emplacement_id = $validated['emplacement_id'];
        $abonnement->start_at       = $validated['start_at'];
        $abonnement->end_at         = $validated['end_at'];
        $abonnement->montant        = $validated['montant'];
        $abonnement->duree          = \Carbon\Carbon::parse($validated['start_at'])->diffInMinutes($validated['end_at']);
        $abonnement->save();

        return redirect()->route('emplacement.liste')->with('success', 'Emplacement attribué et facture confirmée.');
    }
}
