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

<div class="content-body" style="min-height: 788px;">
    <div class="container-fluid">
        <div class="page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter un emplacement</a></li>
            </ol>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Créer un emplacement</h4>
                    </div>
                    <div class="card-body">
                        {{-- Affichage des erreurs --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Affichage message succès --}}
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="basic-form">
                            <form action="{{ route('createplacegerant') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Numéro</label>
                                    <input type="text" class="form-control" name="number" id="exampleNumber" placeholder="Entrez un numéro (ex: x ou P-xxx)" value="{{ old('number') }}">
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
