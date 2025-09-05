<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture - {{ $vehicule->matricule }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f8fc;
            color: #333;
            margin: 0;
            padding: 30px;
            border-radius: 10px;
        }
        
    
        .logo-title {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }
        .logo-title img {
            height: 55px;
        }
        .logo-title span {
            font-size: 18px;
            font-weight: bold;
            color: #224abe;
            display: flex;
        }
        .logo-title sup {
            border: 1px solid;
            border-radius: 6px;
            padding: 1px;
            color: #fff;
            border-color: #224abe;
            background-color: #224abe;
            font-size: 16px;
        }
        .facture-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #224abe;
            margin-bottom: 30px;
            border-bottom: 2px solid #999;
        }
        .info-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
        }
        .info-block {
            flex: 1;
            background: rgba(34, 74, 190, 0.05);
            padding: 15px;
            border-radius: 15px;
            width: 280px;
        }
        .info-block2 {
            float: right;
            flex: 1;
            background: rgba(34, 74, 190, 0.05);
            padding: 15px;
            border-radius: 15px;
            width: 280px;
            margin-top: -236px;
        }
        .info-block h4 {
            color: #224abe;
            margin-bottom: 8px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        .info-block2 h4 {
            color: #224abe;
            margin-bottom: 8px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background: #224abe;
            color: #fff;
            padding: 10px;
        }
        td {
            border: 1px solid #ddd;
            padding: 10px;
        }
        .total {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }
        .signature-zone {
            display: flex;
            justify-content: space-between;
            margin-top: 170px;
        }
        .signature-block {
            text-align: center;
            border-top: 1px solid #333;
            width: 40%;
            padding-top: 10px;
            margin-top: -15px;
        }
        .signature-block2 {
            text-align: center;
            border-top: 1px solid #333;
            width: 40%;
            padding-top: 10px;
            float: right;
            margin-top: -29.6px;
        }
        .date-block {
            text-align: right;
            margin-top: 130px;
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="facture-container">
        <div class="logo-title">
            <img src="{{ asset('assets2/images/Parking4.png') }}" alt="logo" width="55" >
            <span>MY PARK<sup>in</sup></span>
        </div>

        <div class="facture-title">FACTURE - {{ $vehicule->matricule }}</div>

        <div class="info-section">
            <div class="info-block">
                <h4>Informations client</h4>
                <p><b>Nom :</b> {{ $vehicule->client->name }}</p>
                <p><b>Prénom :</b> {{ $vehicule->client->lastname }}</p>
                <p><b>Adresse :</b> {{ $vehicule->client->address }}</p>
                <p><b>Téléphone :</b> {{ $vehicule->client->phone }}</p>
            </div>
            <div class="info-block2">
                <h4>Informations véhicule</h4>
                <p><b>Marque :</b> {{ $vehicule->marque->name }}</p>
                <p><b>Type :</b> {{ $vehicule->type->name }}</p>
                <p><b>Matricule :</b> {{ $vehicule->matricule }}</p>
                <p><b>Couleur :</b> {{ $vehicule->couleur }}</p>
            </div>
        </div>

        <h4 style="color: #224abe; border-bottom: 1px solid #ddd; padding-bottom: 5px;">Détails abonnement</h4>
        @if($vehicule->abonnement)
            <table>
                <thead>
                    <tr>
                        <th>Désignation</th>
                        <th>Quantité</th>
                        <th>Total (FCFA)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Durée (minutes)</td>
                        <td>{{ $vehicule->abonnement->duree }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Montant</td>
                        <td>{{ number_format($vehicule->abonnement->montant, 0, ',', ' ') }}</td>
                        <td>{{ number_format($vehicule->abonnement->montant, 0, ',', ' ') }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="total">Total : {{ number_format($vehicule->abonnement->montant, 0, ',', ' ') }} FCFA</div>
        @else
            <p style="color: red;">Aucun abonnement trouvé.</p>
        @endif

        <div class="signature-zone">
            <div class="signature-block">Signature Gérant</div>
            <div class="signature-block2">Signature Client</div>
        </div>

        <div class="date-block">
            Fait à Abidjan, le {{ \Carbon\Carbon::now()->format('d/m/Y') }}
        </div>
    </div>
</body>
</html>
