{{-- <!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeMarch">
    <!-- Site Title -->
    <title>Facture Abonnement</title>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="cs-container">
        <div class="cs-invoice cs-style1">
            <div class="cs-invoice_in" id="download_section">

                <div class="cs-invoice_head cs-mb10">
                    <div class="cs-invoice_left">
                    </div>

                </div>
                <div class="cs-box2_wrap cs-mb30">
                    <div class=" cs-box cs-style2">
                        <p class="cs-primary_color cs-semi_bold cs-f18 cs-mb5">Car Information</p>
                        <div class="cs-table cs-style2">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>

                                            <b class="cs-primary_color cs-semi_bold"> Marque:</b> {{$vehicules->marque->name}}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b class="cs-primary_color cs-semi_bold">Type: </b> {{$vehicules->type->name}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <b class="cs-primary_color cs-semi_bold">Matricule:{{$vehicules->matricule}}</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b class="cs-primary_color cs-semi_bold">Couleur:</b>{{$vehicules->couleur}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class=" cs-box cs-style2">
                        <p class="cs-primary_color cs-semi_bold cs-f18 cs-mb5">Driver Information</p>
                        <div class="cs-table cs-style2">
                            <table>

                                <tbody>
                                    <tr>
                                        <td><b class="cs-primary_color cs-semi_bold"> Name:</b>{{$vehicules->client->name}}</td>
                                    </tr>
                                    <tr>
                                        <td><b class="cs-primary_color cs-semi_bold">Lastname:</b> {{$vehicules->client->lastname}}</td>
                                    </tr>
                                    <tr>
                                        <td><b class="cs-primary_color cs-semi_bold">Phone:</b> {{$vehicules->client->phone}}</td>
                                    </tr>
                                    <tr>
                                        <td><b class="cs-primary_color cs-semi_bold">Address:</b> {{$vehicules->client->address}}</td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="cs-table cs-style2">
                    <div class="cs-round_border">
                        <div class="cs-table_responsive">
                            <table>
                                <thead>
                                    <tr class="cs-focus_bg">
                                        <th class="cs-width_6 cs-semi_bold cs-primary_color">Items Details</th>
                                        <th class="cs-width_2 cs-semi_bold cs-primary_color">Quantite</th>
                                        <th class="cs-width_2 cs-semi_bold cs-primary_color cs-text_right">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cs-width_6">Duree(minutes)</td>
                                        <td class="cs-width_2">{{$vehicules->abonnement->duree}}</td>
                                    </tr>
                                    <tr>
                                        <td class="cs-width_6">Montant(francs cfa)</td>
                                        <td class="cs-width_2">{{$vehicules->abonnement->montant}}</td>
                                        <td class="cs-width_2 cs-text_right cs-primary_color cs-semi_bold">{{$vehicules->abonnement->montant}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="cs-table cs-style2">
                    <div class="cs-table_responsive">
                        <table>
                            <tbody>
                                <tr class="cs-table_baseline">
                                    <td class="cs-width_5 cs-primary_color cs-bold cs-f16 cs-text_right">Total Amount:
                                    </td>
                                    <td
                                        class="cs-width_2 cs-text_right cs-primary_color cs-bold cs-primary_color cs-f16">
                                        {{$vehicules->abonnement->montant}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/jspdf.min.js') }}"></script>
    <script src="{{ asset('assets/js/html2canvas.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title> Dashboard</title>
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
                                    <th class="center">Qty</th>
                                    <th class="right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="center">Duree(minutes)</td>
                                    <td class="left strong">{{ $vehicules->abonnement->duree }}</td>
                                    {{-- <td class="right">{{ $vehicules->abonnement->duree }}</td> --}}
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
