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
    </style>

    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Gestions</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Table Gérant</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Liste des profils</h4>
                            <a href="{{ route('ajouter-gerant') }}" class="btn btn-primary add-btn">Ajouter Gérant</a>
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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gerants as $gerant)
                                            <tr>
                                                <td>{{ $gerant->name }}</td>
                                                <td>{{ $gerant->lastname }}</td>
                                                <td>{{ $gerant->address }}</td>
                                                <td>{{ $gerant->phone }}</td>
                                                <td>{{ $gerant->email }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href="{{ route('editer-gerant', [$gerant->id]) }}"
                                                            class="btn btn-primary shadow btn-xs mr-2" title="Éditer"><i
                                                                class="fa fa-pencil"></i></a>
                                                        <a href="{{ route('delete-gerant', [$gerant->id]) }}"
                                                            class="btn btn-danger shadow btn-xs" title="Supprimer"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce gérant ?');"><i
                                                                class="fa fa-trash"></i></a>
                                                    </div>
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
