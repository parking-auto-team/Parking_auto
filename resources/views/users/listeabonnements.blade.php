@extends('base.admin')

@section('admin-content')
<style>
    .table thead th {
        background: linear-gradient(135deg, #4e73df, #224abe);
        color: #fff;
        text-align: center;
    }
    .table tbody td {
        vertical-align: middle;
        text-align: center;
    }
    .btn-xs {
        border-radius: 8px;
        transition: all 0.3s;
    }
    .btn-xs:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }
    .badge {
        padding: 5px 12px;
        border-radius: 12px;
        font-weight: 600;
    }
    .btn-facture {
        background: linear-gradient(135deg, #36b9cc, #1cc88a);
        border: none;
        color: white;
        padding: 6px 14px;
        border-radius: 25px;
        transition: 0.3s;
        text-decoration: none;
    }
    .btn-facture:hover {
        background: #17a673;
    }
    .card-title {
        font-weight: 700;
    }
</style>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Parking</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Abonnements</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-12">

                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title">Liste des abonnements</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="table table-striped table-bordered">
                                
   
    <thead>
        <tr>
            <th>Client</th>
            <th>Véhicule</th>
            <th>Durée</th>
            <th>Montant</th>
            <th>Date d'abonnement</th>
            <th>Facture</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($abonnements as $abonnement)
    @php
        // Trouver le véhicule qui a eu cet abonnement
        $vehicule = \App\Models\Vehicule::where('abonnement_id', $abonnement->id)->with(['client', 'marque'])->first();
    @endphp
    <tr>
        <td>{{ $vehicule?->client->name ?? '-' }} {{ $vehicule?->client->lastname ?? '' }}</td>
        <td>{{ $vehicule?->marque->name ?? '-' }} ({{ $vehicule?->matricule ?? '' }})</td>
        <td>{{ $abonnement->duree }} min</td>
        <td>{{ number_format($abonnement->montant, 0, ',', ' ') }}</td>
        <td>{{ $abonnement->created_at ? $abonnement->created_at->format('d/m/Y H:i') : '-' }}</td>
        <td>
            @if ($vehicule)
                <a href="{{ route('abonnements.facture', $vehicule->id) }}" class="btn btn-facture">Voir facture</a>
            @else
                -
            @endif
        </td>
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
