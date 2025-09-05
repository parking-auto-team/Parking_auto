@extends('base.gerant')
@section('gerant-content')
    <style>
        /* Styles badges */
        .custom-badge {
            border-radius: 9999px;
            padding: 0.5rem 1.25rem;
            color: #fff;
            font-weight: 600;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s ease, transform 0.3s ease;
            cursor: default;
            user-select: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }
        .custom-badge-success {
            background: linear-gradient(45deg, #28a745, #218838);
        }
        .custom-badge-danger {
            background: linear-gradient(45deg, #dc3545, #c82333);
        }
        .custom-badge:hover {
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            transform: translateY(-3px);
        }

        /* Bouton arrondi */
        .btn-rounded-pill {
            border-radius: 50rem;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        /* Titres légèrement plus gros */
        .stats-number {
            font-size: 1.8rem;
            font-weight: 700;
            color: #000;
        }

        /* Conteneur flex colonne pour card-body, espace entre titre et badges */
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 180px; /* fixe une hauteur raisonnable pour garder taille stable */
            padding: 1rem 1.5rem;
        }

        /* Media container */
        .media.align-items-center {
            flex-grow: 1;
            display: flex;
            align-items: center;
        }
         .media.align-items-center1 {
            flex-grow: 1;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 1;
            margin-top: 30px;
        }.media.align-items-center1 p{
            
            margin-top: -30px;
        }

        /* Le conteneur badges placé en bas à droite */
        .badges-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 0.5rem;
            margin-top: -50px; /* pousse vers le bas */
            z-index: 2;
        }
    </style>

    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-xxl-12">
                    <div class="row">

                        <!-- Bloc Vehicules -->
                        <div class="col-sm-6">
                            <div class="card avtivity-card shadow-sm">
                                <div class="card-body">
                                    <div class="media align-items-center1">
                                        <span class="activity-icon bgl-success mr-md-4 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                fill="currentColor" class="bi bi-car-front-fill" viewBox="0 0 16 16">
                                                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17 1.247 0 3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="fs-14 mb-2 font-weight-semibold">Véhicules</p>
                                            <span class="stats-number">{{ $totalVehicules }}</span>
                                        </div>
                                    </div>
                                    <div class="badges-container">
                                        <span class="custom-badge custom-badge-success">
                                             Attribués : {{ $vehiculesAttribues }}
                                        </span>
                                        <span class="custom-badge custom-badge-danger">
                                             Non attribués : {{ $vehiculesNonAttribues }}
                                        </span>
                                    </div>
                                    <div class="progress mt-3" style="height:6px; border-radius:4px;">
                                        <div class="progress-bar bg-success" style="width: 100%; height:6px;" role="progressbar">
                                            <span class="sr-only">{{ $totalVehicules }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="effect bg-success"></div>
                            </div>
                        </div>

                        <!-- Bloc Clients -->
                        <div class="col-sm-6">
                            <div class="card avtivity-card shadow-sm">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="activity-icon bgl-secondary mr-md-4 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="fs-14 mb-2 font-weight-semibold">Clients</p>
                                            <span class="stats-number">{{ $clients }}</span>
                                            <div style=" display: flex; align-items: flex-end; flex-direction: column;">
                                                <a href="{{ route('afficherclient') }}" class="btn btn-sm btn-outline-primary mt-2 btn-rounded-pill">
                                                    Voir la liste
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mt-4" style="height:6px; border-radius:4px;">
                                        <div class="progress-bar bg-secondary" style="width: 100%; height:6px;" role="progressbar">
                                            <span class="sr-only">{{ $clients }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="effect bg-secondary"></div>
                            </div>
                        </div>

                        <!-- Bloc Parking -->
                        <div class="col-sm-6">
                            <div class="card avtivity-card shadow-sm">
                                <div class="card-body">
                                    <div class="media align-items-center1">
                                        <span class="activity-icon bgl-danger mr-md-4 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                fill="currentColor" class="bi bi-p-square-fill" viewBox="0 0 16 16">
                                                <path d="M8.27 8.074c.893 0 1.419-.545 1.419-1.488s-.526-1.482-1.42-1.482H6.778v2.97H8.27Z" />
                                                <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2Zm3.5 4.002h2.962C10.045 4.002 11 5.104 11 6.586c0 1.494-.967 2.578-2.55 2.578H6.784V12H5.5V4.002Z" />
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="fs-14 mb-2 font-weight-semibold">Parkings</p>
                                            <span class="stats-number">{{ $emplacementsTotal }}</span>
                                        </div>
                                    </div>
                                    <div class="badges-container">
                                        <span class="custom-badge custom-badge-success">
                                             Libres : {{ $emplacementsLibres }}
                                        </span>
                                        <span class="custom-badge custom-badge-danger">
                                             Occupés : {{ $emplacementsOccupes }}
                                        </span>
                                    </div>
                                    <div class="progress mt-3" style="height:6px; border-radius:4px;">
                                        <div class="progress-bar bg-danger" style="width: 100%; height:6px;" role="progressbar">
                                            <span class="sr-only">{{ $emplacementsTotal }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="effect bg-danger"></div>
                            </div>
                        </div>

                        <!-- Bloc Abonnements -->
                        <div class="col-sm-6">
                            <div class="card avtivity-card shadow-sm">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <span class="activity-icon bgl-warning mr-md-4 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                                fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                            </svg>
                                        </span>
                                        <div class="media-body">
                                            <p class="fs-14 mb-2 font-weight-semibold">Abonnements</p>
                                            <span class="stats-number">{{ $abonnements }}</span>
                                            
                                        </div>
                                    </div>
                                    <div class="progress mt-4" style="height:6px; border-radius:4px;">
                                        <div class="progress-bar bg-warning" style="width: 100%; height:6px;" role="progressbar">
                                            <span class="sr-only">{{ $abonnements }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="effect bg-warning"></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
