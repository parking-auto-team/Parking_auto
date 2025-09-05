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
    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }
    .btn-primary {
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
</style>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter Client</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter client</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('enregistrer') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" placeholder="Nom" name="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Prénom</label>
                                        <input type="text" class="form-control" placeholder="Prénom" name="lastname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Adresse</label>
                                        <input type="text" class="form-control" placeholder="Adresse" name="address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Téléphone</label>
                                        <input type="number" class="form-control" placeholder="Numéro" name="phone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="exemple@parking.com" name="email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Mot de passe</label>
                                        <input type="password" class="form-control" placeholder="Mot de passe" name="password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Enregistrer Client</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
