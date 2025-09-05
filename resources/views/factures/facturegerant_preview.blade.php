@extends('base.gerant')

@section('gerant-content')

<style>
    .card {
        border-radius: 20px;
        background: linear-gradient(135deg, #fff, #224abe);
        color: #333;
        box-shadow: 0 8px 20px rgba(78, 115, 223, 0.3);
        transition: all 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(78, 115, 223, 0.5);
    }
    .card-header h4 {
        font-weight: 700;
        letter-spacing: 1px;
    }
    h6, b, th, td {
        color: darkslategray;
    }
    .table {
        background-color: rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        overflow: hidden;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(255, 255, 255, 0.05);
    }
    .btn-success, .btn-secondary {
        border-radius: 25px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-success {
        background-color: #28a745;
        color: #fff;
    }
    .btn-success:hover {
        background-color: #218838;
        color: #fff;
    }
    .btn-secondary {
        background-color: #fff;
        color: #4e73df;
    }
    .btn-secondary:hover {
        background-color: #f0f0f0;
        color: #224abe;
    }
</style>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Facture - Prévisualisation</h4>
            </div>
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <h6><strong>Informations véhicule</strong></h6>
                        <div><b>Marque :</b> {{ $vehicule->marque->name }}</div>
                        <div><b>Type :</b> {{ $vehicule->type->name }}</div>
                        <div><b>Matricule :</b> {{ $vehicule->matricule }}</div>
                        <div><b>Couleur :</b> {{ $vehicule->couleur }}</div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12">
                        <h6><strong>Informations client</strong></h6>
                        <div><b>Nom :</b> {{ $vehicule->client->name }}</div>
                        <div><b>Prénom :</b> {{ $vehicule->client->lastname }}</div>
                        <div><b>Adresse :</b> {{ $vehicule->client->address }}</div>
                        <div><b>Téléphone :</b> {{ $vehicule->client->phone }}</div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Abonnement</th>
                                <th>Quantité</th>
                                <th>Total (FCFA)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Durée (minutes)</td>
                                <td>{{ $duree }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Montant</td>
                                <td>{{ number_format($montant, 0, ',', ' ') }}</td>
                                <td>{{ number_format($montant, 0, ',', ' ') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <form action="{{ route('attribuergerant.confirmer', ['id' => $vehicule->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="emplacement_id" value="{{ $emplacement->id }}">
                        <input type="hidden" name="start_at" value="{{ $start_at }}">
                        <input type="hidden" name="end_at" value="{{ $end_at }}">
                        <input type="hidden" name="montant" value="{{ $montant }}">
                        <button type="submit" class="btn btn-success">Confirmer l'attribution</button>
                    </form>

                    <a href="{{ route('Attribuergerant') }}" class="btn btn-secondary">
                        Retour
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
