<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<title>SIM-PATEN Kec. Kalidawir Tulungagung</title>

	<!-- Favicon icon -->
    <link rel="icon" href="{{ url('assets/app/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->     
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/app/css/bootstrap/css/bootstrap.min.css') }}">
    <!-- waves.css -->
    <link rel="stylesheet" href="{{ url('assets/app/pages/waves/css/waves.min.css') }}" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/app/icon/themify-icons/themify-icons.css') }}">
	<!-- ico font -->
	<link rel="stylesheet" type="text/css" href="{{ url('assets/icon/icofont/css/icofont.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/app/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ url('assets/app/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

</head>
<body themebg-pattern="theme1">
	<!-- Pre-loader start -->
	<div class="theme-loader">
	  <div class="loader-track">
	      <div class="preloader-wrapper">
	          <div class="spinner-layer spinner-blue">
	              <div class="circle-clipper left">
	                  <div class="circle"></div>
	              </div>
	              <div class="gap-patch">
	                  <div class="circle"></div>
	              </div>
	              <div class="circle-clipper right">
	                  <div class="circle"></div>
	              </div>
	          </div>
	          <div class="spinner-layer spinner-red">
	              <div class="circle-clipper left">
	                  <div class="circle"></div>
	              </div>
	              <div class="gap-patch">
	                  <div class="circle"></div>
	              </div>
	              <div class="circle-clipper right">
	                  <div class="circle"></div>
	              </div>
	          </div>
	        
	          <div class="spinner-layer spinner-yellow">
	              <div class="circle-clipper left">
	                  <div class="circle"></div>
	              </div>
	              <div class="gap-patch">
	                  <div class="circle"></div>
	              </div>
	              <div class="circle-clipper right">
	                  <div class="circle"></div>
	              </div>
	          </div>
	        
	          <div class="spinner-layer spinner-green">
	              <div class="circle-clipper left">
	                  <div class="circle"></div>
	              </div>
	              <div class="gap-patch">
	                  <div class="circle"></div>
	              </div>
	              <div class="circle-clipper right">
	                  <div class="circle"></div>
	              </div>
	          </div>
	      </div>
	  </div>
	</div>
	<!-- Pre-loader end -->

	<!-- conten  -->
    @yield('content')
    <!-- end content -->

  	<!-- Required Jquery -->
	<script type="text/javascript" src="{{ url('assets/app/js/jquery/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/app/js/jquery-ui/jquery-ui.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/app/js/popper.js/popper.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('assets/app/js/bootstrap/js/bootstrap.min.js') }}"></script>
	
	<!-- waves js -->
    <script src="{{ url('assets/app/pages/waves/js/waves.min.js') }}"></script>

    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{ url('assets/app/js/jquery-slimscroll/jquery.slimscroll.js') }}"></script>

    <!-- slimscroll js -->
    <script type="text/javascript" src="{{ url('assets/app/js/SmoothScroll.js') }}"></script>
    <script src="{{ url('assets/app/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

	<script type="text/javascript" src="{{ url('assets/app/js/common-pages.js') }}"></script>

	<!-- js  -->
    @yield('js')
    <!-- end js -->
</body>
</html>