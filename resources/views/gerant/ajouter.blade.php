@extends('base.admin')

@section('admin-content')
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
    .form-control-mail {
        border-radius: 15px;
        padding: 10px 15px;
        border: none;
        background-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    .form-control:hover::placeholder{
        color: black;
    }
    .form-control:hover{
        background-color: white;
        color: black;
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
    .alert-success, .alert-danger {
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 15px;
        margin-bottom: 15px;
    }
</style>

<div class="content-body">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter gérant</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajout du gérant</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('enregistrer-gerant') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nom</label>
                                        <input type="text" class="form-control" id="exampleName" placeholder="Nom" name="name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Prénom</label>
                                        <input type="text" class="form-control" id="exampleLastName" placeholder="Prénom" name="lastname">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Adresse</label>
                                        <input type="text" class="form-control" id="exampleAddress" placeholder="Adresse" name="address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Téléphone</label>
                                        <input type="number" class="form-control" id="examplePhone" placeholder="Numéro" name="phone">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="exampleEmail" placeholder="exemple@parking.com" name="email" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Mot de passe</label>
                                        <input type="password" class="form-control" id="examplePassword" placeholder="Mot de passe" name="password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
