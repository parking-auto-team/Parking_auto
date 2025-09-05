@extends('base.gerant')

{{-- @section('style')
    <style>
        .input-group-append {
            cursor: pointer;
        }
    </style>
@endsection --}}



@section('gerant-content')
    {{-- <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800"></h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">


            <div class="container">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4 p-3">Souscrire abonnement</h1>
                </div>



                @if (session('message'))
                    <div class="alert -alert">
                        <h3>
                            {{ session('message') }}
                        </h3>
                    </div>
                @endif
                <form action="{{ route('activation', [$vehicule->id]) }}" method="POST">
                    @csrf



                    <div class="form-group column">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <h6>Numero matricule: {{ $vehicule->matricule }}</h6>
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <h6>Marque: {{ $vehicule->marque->name }}</h6>
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <h6>Couleur: {{ $vehicule->couleur }}</h6>
                        </div>
                    </div>

                    <div class="fomr-group column col-sm-6 mb-6 mb-sm-5">

                        <h6>
                            Duree de stationnement:
                        </h6>

                        <input type="text" class="form-control" value="{{ date('Y-m-d') }}" name="start_at"><br>
                        <div class="input-group-addon">
                            <h6>A</h6>
                        </div><br>
                        <input type="text" class="form-control" value="" name="end_at"
                            placeholder="2022-12-31"><br>
                        <h6>
                            Montant:
                        </h6>
                        <input type="text" class="form-control form-control-user" name="montant" id="exampleMontant"
                            placeholder="Entrez Montant"><br>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <h6>choisir votre emplacement: </h6>
                            <select name="emplacement_id" id="">
                                @foreach ($emplacements as $emplacement)
                                    <br>

                                    <option value="{{ $emplacement->id }}">
                                        <label class="badge d-none d-sm-inline-block sm btn-danger shadow-sm">
                                            {{ $emplacement->status == true ? '------' : $emplacement->number }}

                                        </label>
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <br>

                        <div class="input-group">

                            <td>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <br>

                                    <button type="submit"
                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  ">
                                        Activation

                                    </button>
                                </div>

                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <br>
                                    <a class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm  "
                                        href="{{ route('pdf.preview', ['id' => $vehicule->id]) }}">
                                        Facturer
                                    </a>
                                </div>
                            </td>
                        </div>
                    </div><br>

                    <input type="hidden" value="{{ $vehicule->id }}" name="vehicule_id">
                    <input type="hidden" name="{{ $vehicule->matricule }}" name="matricule_id">
                </form>
            </div>
        </div>
    </div> --}}

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

{{-- @section('script')
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>


    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endsection --}}
