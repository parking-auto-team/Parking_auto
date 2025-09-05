



<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My Park'in</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets2/images/Parking4.png')}}">
    <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
               @yield('auth-content')
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('assets2/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('assets2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets2/js/custom.min.js')}}"></script>
    <script src="{{asset('assets2/js/deznav-init.js')}}"></script>

</body>

</html>

