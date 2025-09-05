@extends('base.gerant')

@section('gerant-content')

<style>
    .profile-card {
        background: linear-gradient(135deg, #fff, #224abe);
        color: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        transition: all 0.4s ease;
        text-align: center;
    }

    .profile-card:hover {
        transform: translateY(-8px);
    }

    .profile-card h4 {
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 1rem;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .profile-card p, .profile-card strong {
        color: #fff;
        display: flex;
        align-items: center;
        gap: 8px;
        justify-content: center;
        margin-bottom: 0.5rem;
    }

    .profile-card .btn-custom, 
    .profile-card .btn-outline-primary {
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

    .profile-card .btn-custom:hover,
    .profile-card .btn-outline-primary:hover {
        background-color: #f1f1f1 !important;
        color: #224abe !important;
        transform: translateY(-2px);
        text-decoration: none;
    }

    .profile-card img.rounded-circle {
        border-radius: 50% !important;
        box-shadow: 0 4px 15px rgba(34,74,190,0.5);
        margin-bottom: 1rem;
    }

    .card-footer {
        background: #fff;
        color: #224abe;
        border-radius: 0 0 15px 15px;
        font-size: 0.85rem;
        font-weight: 500;
        padding: 0.75rem 0;
        text-align: center;
    }
    .bx{
        margin-top: 0px;
    }
    strong{
        margin-top: 10px;
    }
</style>

<!-- Ajout du lien vers Boxicons -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Détails profil</a></li>
            </ol>
        </div>

        <!-- row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8">
                <div class="profile-card">
                   
                        <img src="{{ asset('assets2/images/profile/17.jpg') }}" alt="Avatar"
                             class="rounded-circle shadow" width="90">

                        <h4><i class='bx bxs-user'></i> {{ $gerant->name }} {{ $gerant->lastname }}</h4>

                        <p class="text-muted mb-3">Gérant</p>

                        <p><i class='bx bx-envelope'></i><strong>Email :</strong> {{ $gerant->email }}</p>
                        <p><i class='bx bxs-map'></i><strong>Adresse :</strong> {{ $gerant->address }}</p>
                        <p><i class='bx bxs-phone'></i><strong>Téléphone :</strong> {{ $gerant->phone }}</p>
                    
                    <a href="{{ route('dashboard-gerant') }}" class="btn btn-custom">
                        <i class='bx bx-arrow-back'></i> Retour au tableau de bord
                    </a>
                    <a href="{{route('gerant.afficher-password')}}" class="btn btn-custom">
                        <i class='bx bx-refresh'></i> Modifier le mot de passe
                    </a>
                </div>
                <div class="card-footer">
                    © 2025 @Me. Tous droits réservés.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
