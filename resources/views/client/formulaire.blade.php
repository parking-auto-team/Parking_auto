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
        font-weight: 700; letter-spacing: 1px;
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
    .form-control::placeholder {
        color: #fff;
    }
    .form-control:hover::placeholder{
        color: black;
    }
    .form-control:hover{
        background-color: white;
        color: black;
        .form-control::placeholder{
            color: black;
        }
    }
    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }
    option.form{
        color: black;
    }
    .btn-primary {
        border-radius: 25px;
        background-color: #fff;
        color: #4e73df;
        font-weight: bold;
        transition: all 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #224abe;
        color: #fff;
    }
    span.text-danger {
        font-size: 14px;
        display: block;
        margin-bottom: 10px;
    }
</style>

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter véhicule</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter véhicule</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{ route('ajouter-vehicule') }}" method="POST">
                                @csrf
                                @error('matricule')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <input type="hidden" value="{{ $client->id }}" name="client_id">

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Matricule</label>
                                        <input type="text" class="form-control" id="exampleMatricule" placeholder="Matricule" name="matricule">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Marque</label>
                                        <select class="form-control" name="marque_id" id="exampleMarque">
                                            <option>Choisir une marque</option>
                                            @foreach ($marques as $marque)
                                                <option class="form" value="{{ $marque->id }}">{{ $marque->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Couleur</label>
                                        <input type="text" class="form-control" id="exampleCouleur" placeholder="Couleur" name="couleur">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Type</label>
                                        <select class="form-control" name="type_id" id="exampleType">
                                            <option>Choisir un type</option>
                                            @foreach ($types as $type)
                                                <option class="form" value="{{ $type->id }}">{{ $type->name }}</option>
                                            @endforeach
                                        </select>
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
