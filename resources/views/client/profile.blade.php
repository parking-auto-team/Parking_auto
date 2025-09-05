@extends('base.admin')

@section('admin-content')

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

    .profile-card p {
        margin-bottom: 10px;
    }

    .profile-actions {
        margin-top: 30px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .btn-custom {
        background-color: #fff !important;
        color: #224abe !important;
        font-weight: 600;
        border-radius: 30px;
        transition: all 0.3s;
    }

    .btn-custom:hover {
        background-color: #f1f1f1 !important;
        color: #224abe !important;
        transform: translateY(-2px);
    }


    .btn-custom-sup {
        background-color: #224abe !important;
        color: #fff !important;
        transform: translateY(-2px);
    }
    .btn-custom-sup:hover {
        background-color: #fff !important;
        color: #224abe !important;
        transform: translateY(-2px);
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

    .vehicle-box button {
        border-radius: 20px;
    }
</style>

<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Détails profile</a></li>
            </ol>
        </div>
        <!-- row -->
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
                    @if ($client->vehicules->count())
                        @foreach ($client->vehicules as $vehicule)
                            <div class="vehicle-box">
                                <strong>{{ $vehicule->matricule }}</strong>
                                <form action="{{ route('delete-vehicule', $vehicule->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer ce véhicule ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-custom-sup">Supprimer</button>
                                </form>
                            </div>
                        @endforeach
                    @else
                        <p>Aucun véhicule enregistré.</p>
                    @endif

                    <div class="profile-actions">
                        <a href="{{ route('formualire-vehicule', [$client->id]) }}" class="btn btn-custom"><i class='bx bx-plus'></i> Ajouter véhicule</a>
                        <a href="{{ route('tableclient') }}" class="btn btn-custom"><i class='bx bx-arrow-back'></i> Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
