@extends('base.gerant')
@section('gerant-content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Abonnements</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Liste des abonnements</a></li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Liste des abonnements</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Client</th>
                                            <th>Véhicule</th>
                                            <th>Emplacement</th>
                                            <th>Montant</th>
                                            <th>Durée (min)</th>
                                            <th>Début</th>
                                            <th>Fin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($abonnements as $abonnement)
                                            <tr>
                                                <td>{{ $abonnement->vehicule?->client?->name ?? 'Non défini' }} {{ $abonnement->vehicule?->client?->lastname ?? '' }}</td>
                                                <td>{{ $abonnement->vehicule?->license_plate ?? 'N/A' }}</td>
                                                <td>{{ $abonnement->vehicule?->emplacement?->number ?? 'N/A' }}</td>
                                                <td>{{ $abonnement->montant }}</td>
                                                <td>{{ $abonnement->duree }}</td>
                                                <td>{{ $abonnement->vehicule?->start_at ?? 'N/A' }}</td>
                                                <td>{{ $abonnement->vehicule?->end_at ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
