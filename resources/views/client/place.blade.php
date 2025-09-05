@extends('base.admin')


@section('admin-content')


    <div class="content-body" style="min-height: 788px;">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Formulaire</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Abonnement</a></li>
                </ol>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Souscrire un abonnement</h4>
                        </div>
                        <div class="card-body">
                            <div class="basic-form">
                                @if (session('message'))
                                    <div class="alert -alert">
                                        <h3>
                                            {{ session('message') }}
                                        </h3>
                                    </div>
                                @endif
                                <form action="{{ route('activation', [$vehicule->id]) }}" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h6> matricule: {{ $vehicule->matricule }}</h6>
                                        </div>

                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h6>Marque: {{ $vehicule->marque->name }}</h6>
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h6>Couleur: {{ $vehicule->couleur }}</h6>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <h6>Duree de stationnement:</h6>
                                            <div class="form-row">
                                                <div class="col-sm-6 mb-3 mb-sm-0">
                                                    <div class="example">
                                                        <input name="start_at" class="datepicker-default form-control picker__input" id="datepicker" readonly="" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="datepicker_root" value="{{ date('d-m-Y') }}">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input name="end_at" class="datepicker-default form-control picker__input" id="datepicker" readonly="" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="datepicker_root" placeholder="date fin">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row col-sm-6 mb-3 mb-sm-0">
                                        <div class="form-group col-md-6">
                                            <label>Montant</label>
                                            <input type="text" class="form-control" id="exampleMontant" name="montant">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <h6>choisir votre emplacement: </h6>
                                        <select name="emplacement_id" id="">
                                            @foreach ($emplacements as $emplacement)
                                                <br>
                                                <option value="{{ $emplacement->id }}">
                                                    <label class="badge d-none d-sm-inline-block sm btn-danger shadow-sm">
                                                        {{ $emplacement->status == true ? '' : $emplacement->number }}

                                                    </label>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div><br>
                                    <div class="form-row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                            <div class="example">
                                                <button type="submit"
                                                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  ">
                                                    Activation
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm  "
                                                href="{{ route('pdf.preview', ['id' => $vehicule->id]) }}">
                                                Facturer
                                            </a>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ $vehicule->id }}" name="vehicule_id">
                                    <input type="hidden" name="{{ $vehicule->matricule }}" name="matricule_id">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
