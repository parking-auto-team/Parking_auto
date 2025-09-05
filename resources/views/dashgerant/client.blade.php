@extends('base.gerant')

@section('gerant-content')
    <style>
        .table thead th {
            background: linear-gradient(135deg, #4e73df, #224abe);
            color: #fff;
            text-align: center;
        }
        .table tbody td {
            vertical-align: middle;
        }
        .btn-xs {
            border-radius: 8px;
            transition: all 0.3s;
        }
        .btn-xs:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .btn-primary {
            background-color: #4e73df;
            border-color: #4e73df;
        }
        .btn-danger {
            background-color: #e74a3b;
            border-color: #e74a3b;
        }
        .card-title {
            font-weight: 700;
        }
        .add-btn {
            border-radius: 30px;
            padding: 7px 20px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        .profile-link {
            text-decoration: none;
            font-weight: 600;
            color: #4e73df;
            transition: color 0.3s;
        }
        .profile-link:hover {
            color: #224abe;
        }
    </style>

    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Gestions</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Table client</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Table client</h4>
                            <a href="{{ route('addclient') }}" class="btn btn-primary add-btn">Ajouter Client</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example3" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Adresse</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th>Véhicules</th>
                                            <th>Actions</th>
                                            <th>Profil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($clients as $client)
                                            <tr>
                                                <td>{{ $client->name }}</td>
                                                <td>{{ $client->lastname }}</td>
                                                <td>{{ $client->address }}</td>
                                                <td>{{ $client->phone }}</td>
                                                <td>{{ $client->email }}</td>
                                                <td>
                                                    @foreach ($client->vehicules as $vehicule)
                                                        {{ $vehicule->matricule }}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('edit-clientgerant', [$client->id]) }}"
                                                            class="btn btn-primary shadow btn-xs mr-2" title="Éditer"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="{{ route('delete-client', [$client->id]) }}"
                                                            class="btn btn-danger shadow btn-xs" title="Supprimer"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?');"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="{{ route('voirprofile', [$client->id]) }}" class="profile-link">Voir le Profil</a>
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
