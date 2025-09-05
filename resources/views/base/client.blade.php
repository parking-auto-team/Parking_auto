
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>My park'in  |  CLIENT</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets2/images/Parking4.png')}}">
	<link rel="stylesheet" href="{{asset('assets2/vendor/chartist/css/chartist.min.css')}}">
    <link href="{{asset('assets2/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets2/vendor/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('assets2/css/style.css')}}" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
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
        <div class="nav-header">
           <a href="#" class="brand-logo">
                <img class="logo-abbr" type="images/png" src="{{asset('assets2/images/Parking4.png')}}" alt="images">
                <img class="logo-compact" type="images/svg" src="{{asset('assets2/images/Parking3.png')}}" alt="images">
                <img class="brand-title" type="images/svg" src="{{asset('assets2/images/Parking3.png')}}" alt="images">
               
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

		<!--**********************************
            Header start
        ***********************************-->
       @include('client.side')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('shared.topbarclient')
        <!--**********************************
            Sidebar end
        ***********************************-->

		<!--**********************************
            Content body start
        ***********************************-->
       @yield('client-content')
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="" target="_blank">@Me</a> 2022</p>
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
	<script src="{{asset('assets2/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('assets2/js/custom.min.js')}}"></script>
	<script src="{{asset('assets2/js/deznav-init.js')}}"></script>
	<script src="{{asset('assets2/vendor/owl-carousel/owl.carousel.js')}}"></script>

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

