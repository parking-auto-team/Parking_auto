


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Facture</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{ asset('assets2/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">



        <div class="cs-container">
            <div class="card">
                <div class="card-header"> <span class="float-right">
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <h6><strong>Car Information</strong></h6>
                            <div>Marque:</b> {{ $vehicules->marque->name }}</div>
                            <div>Type: </b> {{ $vehicules->type->name }}</div>
                            <div>Matricule: </b>{{ $vehicules->matricule }}</div>
                            <div>Couleur:</b>{{ $vehicules->couleur }}</div>
                        </div>
                        <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                            <h6><strong>Client Information</strong></h6>
                            <div>Name:</b>{{ $vehicules->client->name }}</div>
                            <div>Lastname:</b>{{ $vehicules->client->lastname }}</div>
                            <div>Address:</b>{{ $vehicules->client->address }}</div>
                            <div>Phone:</b>{{ $vehicules->client->phone }}</div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="right">Abonnement</th>
                                    <th class="center">Quantité</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">Duree(minutes)</td>
                                    <td class="left strong">{{ $vehicules->abonnement->duree }}</td>
                                </tr>
                                <tr>
                                    <td class="center">Montant(Francs cfa)</td>
                                    <td class="left strong">{{ $vehicules->abonnement->montant }}</td>
                                    <td class="right">{{ $vehicules->abonnement->montant }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5"> </div>
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left"><strong>Total</strong></td>
                                        <td class="right"><strong>{{ $vehicules->abonnement->montant }}</strong><br>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-row">
                        
                       
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <br>
                            <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm  "
                                href="{{ route('dashboard-admin') }}">
                                Retour
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->



        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('assets2/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('assets2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets2/js/custom.min.js') }}"></script>
    <script src="{{ asset('assets2/js/deznav-init.js') }}"></script>


    <script src="{{ asset('assets2/vendor/highlightjs/highlight.pack.min.js') }}"></script>
    <!-- Circle progress -->



</body>

</html>
