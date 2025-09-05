@extends('base.client')

@section('client-content')

<style>
    .profile-card {
        background: linear-gradient(135deg, #fff, #224abe);
        color: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        transition: all 0.4s ease;
    }

    .profile-card:hover {
        transform: translateY(-8px);
    }

    .profile-card h4 {
        font-weight: 700;
        letter-spacing: 1px;
    }

    .profile-card h6 {
        margin-bottom: 15px;
        border-bottom: 1px solid rgba(255,255,255,0.2);
        padding-bottom: 5px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .profile-actions {
        margin-top: 30px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .vehicle-box {
        background: rgba(255,255,255,0.1);
        border-radius: 10px;
        padding: 10px 15px;
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background 0.3s;
    }

    .vehicle-box:hover {
        background: rgba(255,255,255,0.2);
    }

    .vehicle-box strong {
        color: #fff;
    }

    .vehicle-box h6 {
        margin: 0;
    }
    .profile-card .btn-custom {
        background-color: #fff !important;
        color: #224abe !important;
        font-weight: 600;
        border-radius: 30px;
        transition: all 0.3s;
        padding: 0.5rem 1.5rem;
        border: none !important;
        text-decoration: none;
        display: inline-block;
        margin-top: 1rem;
    }

    .profile-card .btn-custom:hover {
        background-color: #f1f1f1 !important;
        color: #224abe !important;
        transform: translateY(-2px);
        text-decoration: none;
    }

</style>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profil Client</a></li>
            </ol>
        </div>

        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="profile-card">
                    <h4 class="card-title text-center mb-4"><i class='bx bxs-user'></i> Profil Client</h4>

                    <h6><i class='bx bxs-user'></i> Nom : {{ $client->name }}</h6>
                    <h6><i class='bx bxs-user-detail'></i> Prénom : {{ $client->lastname }}</h6>
                    <h6><i class='bx bxs-map'></i> Adresse : {{ $client->address }}</h6>
                    <h6><i class='bx bxs-phone'></i> Téléphone : {{ $client->phone }}</h6>
                    <h6><i class='bx bxs-envelope'></i> Email : {{ $client->email }}</h6>

                    <h6><i class='bx bxs-car'></i> Véhicules :</h6>

                    @forelse ($client->vehicules as $vehicule)
                        <div class="vehicle-box">
                            <div>
                                <strong>{{$vehicule->type->name }} | {{$vehicule->marque->name }} | {{ $vehicule->matricule }} - {{$vehicule->couleur}}  </strong>

                                @if ($vehicule->Abonnement)
                                    <h6><i class='bx bx-time'></i> Durée : {{ $vehicule->Abonnement->duree }} Min | {{ $vehicule->emplacement->number}}</h6>
                                    <h6><i class='bx bx-money'></i> Montant : {{ $vehicule->Abonnement->montant }} FCFA</h6>


                                @else
                                    <h6><i class='bx bx-info-circle'></i> Aucun abonnement</h6>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p>Aucun véhicule enregistré.</p>
                    @endforelse


                    <a href="{{route('client.afficher-password')}}" class="btn btn-custom">
                        <i class='bx bx-refresh'></i> Modifier le mot de passe
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
