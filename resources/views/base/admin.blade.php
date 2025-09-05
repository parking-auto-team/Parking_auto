<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My park'in  |  ADMIN</title>

    <!-- 1. Bibliothèques externes -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets2/images/Parking4.png')}}">

    <!-- 2. CSS vendors -->

    <!-- Daterange picker -->
    <link href="{{asset('assets2/vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Clockpicker -->
    <link href="{{asset('assets2/vendor/clockpicker/css/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
    <!-- asColorpicker -->
    <link href="{{asset('assets2/vendor/jquery-asColorPicker/css/asColorPicker.min.css')}}" rel="stylesheet">
    <!-- Material color picker -->
    <link href="{{asset('assets2/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <!-- Pick date -->
    <link rel="stylesheet" href="{{asset('assets2/vendor/pickadate/themes/default.css')}}">
    <link rel="stylesheet" href="{{asset('assets2/vendor/pickadate/themes/default.date.css')}}">
    <!-- Custom Stylesheet -->
	<link href="{{asset('assets2/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
    <!-- 3. Le CSS -->
    <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet">
 <style>
        .metismenu{
            position: fixed;
        }

    </style>
</head>
<body>


    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header" >
            <a href="#" class="brand-logo">
                <img class="logo-abbr" type="images/png" src="{{asset('assets2/images/Parking4.png')}}" alt="images">
                <img class="logo-compact" type="images/svg" src="{{asset('assets2/images/Parking3.png')}}" alt="images">
                <img class="brand-title" type="images/svg" src="{{asset('assets2/images/Parking3.png')}}" alt="images">
               
            </a>


            <div class="nav-control">
                <div class="hamburger">
                   <span class="line"></span>
                   <span class="line"></span>
                   <span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
       @include('shared.topbar')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('shared.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->


		<!--**********************************
            Content body start
        ***********************************-->
       @yield('admin-content')
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">@Me</a> 2025</p>
            </div>
        </div>
        <!--**********************************
            Footer end
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
    <script src="{{asset('assets2/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('assets2/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('assets2/js/custom.min.js')}}"></script>
    <script src="{{asset('assets2/js/deznav-init.js')}}"></script>




    <!-- Daterangepicker -->
    <!-- momment js is must -->
    <script src="{{asset('assets2/vendor/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets2/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- clockpicker -->
    <script src="{{asset('assets2/vendor/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>
    <!-- asColorPicker -->
    <script src="{{asset('assets2/vendor/jquery-asColor/jquery-asColor.min.js')}}"></script>
    <script src="{{asset('assets2/vendor/jquery-asGradient/jquery-asGradient.min.js')}}"></script>
    <script src="{{asset('assets2/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js')}}"></script>
    <!-- Material color picker -->
    <script src="{{asset('assets2/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <!-- pickdate -->
    <script src="{{asset('assets2/vendor/pickadate/picker.js')}}"></script>
    <script src="{{asset('assets2/vendor/pickadate/picker.time.js')}}"></script>
    <script src="{{asset('assets2/vendor/pickadate/picker.date.js')}}"></script>



    <!-- Daterangepicker -->
    <script src="{{asset('assets2/js/plugins-init/bs-daterange-picker-init.js')}}"></script>
    <!-- Clockpicker init -->
    <script src="{{asset('assets2/js/plugins-init/clock-picker-init.js')}}"></script>
    <!-- asColorPicker init -->
    <script src="{{asset('assets2/js/plugins-init/jquery-asColorPicker.init.js')}}"></script>
    <!-- Material color picker init -->
    <script src="{{asset('assets2/js/plugins-init/material-date-picker-init.js')}}"></script>
    <!-- Pickdate -->
    <script src="{{asset('assets2/js/plugins-init/pickadate-init.js')}}"></script>

	<!-- Chart piety plugin files -->
    <script src="{{asset('assets2/vendor/peity/jquery.peity.min.js')}}"></script>

	<!-- Apex Chart -->
	<script src="{{asset('assets2/vendor/apexchart/apexchart.js')}}"></script>

	<!-- Dashboard 1 -->
	<script src="{{asset('assets2/js/dashboard/dashboard-1.js')}}"></script>
	<script>
		function carouselReview(){
			/*  testimonial one function by = owl.carousel.js */
			jQuery('.testimonial-one').owlCarousel({
				loop:true,
				autoplay:true,
				margin:30,
				nav:false,
				dots: false,
				left:true,
				navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
				responsive:{
					0:{
						items:1
					},
					484:{
						items:2
					},
					882:{
						items:3
					},
					1200:{
						items:2
					},

					1540:{
						items:3
					},
					1740:{
						items:4
					}
				}
			})
		}
		jQuery(window).on('load',function(){
			setTimeout(function(){
				carouselReview();
			}, 1000);
		});
	</script>
</body>
</html>
