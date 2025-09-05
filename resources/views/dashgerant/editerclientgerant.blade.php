@extends('base.gerant')

@section('gerant-content')
<style>
    .card {
        border-radius: 20px;
        background: linear-gradient(135deg, #fff, #224abe);
        color: #fff;
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
    label {
        font-weight: 600;
        color: #fff;
    }
    .form-control {
        border-radius: 15px;
        padding: 10px 15px;
        border: none;
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    .form-control:hover::placeholder {
        color: black;
    }
    .form-control:hover {
        background-color: white;
        color: black;
    }
    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }
    .form-control[readonly] {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
        cursor: not-allowed;
    }
    .btn-primary, .btn-warning {
        border-radius: 25px;
        background-color: #fff;
        color: #4e73df;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-primary:hover {
        background-color: #f0f0f0;
        color: #224abe;
    }
    .btn-warning {
        background-color: #ffc107;
        color: #fff;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        color: #fff;
    }
    .alert-success, .alert-danger {
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 15px;
        margin-bottom: 15px;
    }
</style>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Éditer client</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Éditer client</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="basic-form">
                            <form action="{{ route('update-clientgerant', [$client->id]) }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" name="name" placeholder="Nom" value="{{ $client->name }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Prénom</label>
                                        <input type="text" class="form-control" name="lastname" placeholder="Prénom" value="{{ $client->lastname }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Adresse</label>
                                        <input type="text" class="form-control" name="address" placeholder="Adresse" value="{{ $client->address }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Téléphone</label>
                                        <input type="number" class="form-control" name="phone" placeholder="Téléphone" value="{{ $client->phone }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="{{ $client->email }}" readonly>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                            </form>

                            <form action="{{ route('reinitialiser-motdepasse-client', $client->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-warning" style="margin-top: 10px;">Réinitialiser mot de passe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
