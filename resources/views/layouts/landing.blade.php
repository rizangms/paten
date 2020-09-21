<!DOCTYPE html>
<html class="" lang="id-ID">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<title>Sistem Informasi Paten Kecamatan Kalidawir Tulungagung</title>
	<link href="//fonts.googleapis.com/css?family=Roboto:300,400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:400,600,700" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Raleway" rel="stylesheet">
	<link href="//stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="//stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css">
	<link href="{{ url('/assets/app/css/custom/landing.css') }}" media="all" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
	<link href="" rel="shortcut icon">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    @yield('css')
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
	<script type="text/javascript">
      var base_url = "{{ url('/') }}";
    </script>
</head>
<body class="{{ ( isset( $class ) ? $class : 'artikel' ) }}">
	<div class="hfeed site" id="page">
		<header class="site-header" id="masthead" role="banner">
			<div class="maskot">
				<div class="container">
					<div class="place"></div>
				</div>
			</div>
			<div class="screen">
				<div class="container">
					<div class="lead text-center">
						<h1 class="h1"><a href="{{ url('/') }}">PATEN <span class="gap" style="font-size: 50%">Kecamatan&nbsp;Kalidawir</span></a></h1>
						<h3 class="h3">Pelayanan Administrasi Terpadu Kecamatan</h3>
						<h2 class="h2">Kabupaten Tulungagung</span></h2>
					</div>
					@if( isset( $class ) )
						@include( 'landing.widget-home' )
					@else
						@include( 'landing.widget-sidebar' )
					@endif
				</div>
			</div>
		</header><!-- .site-header -->
		@yield('content')

		<footer class="site-footer text-center" id="colophon" role="contentinfo">
			<div class="site-data">
				<div class="container-fluid">
					<div class="footer-logo">
						<img src="//desadaring.id/wp-content/plugins/desaku/logo/tulungagung-kab.png">
						<h2><big>Kecamatan Kalidawir</big> <small>Kabupaten Tulungagung</small></h2>
					</div>
					<address>
						<strong>Kantor kecamatan</strong><br>
						Jl. Raya Karangtalun No. 1, Kec. Kalidawir <br>
						Kab. Tulungagung 66281
					</address>
				</div>
			</div>
			<div class="site-info">
				<div class="container-fluid">
					<span>Dikembangkan oleh <a href="http://sporaenterprise.com/" target="_blank">PT. Spora Optima Global</a>.</span>
				</div>
			</div>
		</footer><!-- .site-footer -->
	</div><!-- .site -->

	<script src="//cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js" type="text/javascript">
	</script> 
	<script src="{{ url('/assets/app/js/custom/landing.js') }}" type="text/javascript">
	</script>
	<script src="{{ url('/assets/app/css/custom/landing.js') }}" type="text/javascript"></script>
	<script>
		$('#tombol_cek').click(function () {
			var $form = $("#cek_form");
			$form.submit(function (e) {
				e.preventDefault();
				var nama = $form.find('[name="kode"]').val();
				if ( $.trim(nama).length == 0 ) {
					swal("Masukkan Kode", "Untuk melihat status permohonan anda.", "info");
					return false;
				} else {
					$form.off("submit").submit(); 
				}
			});
		});

		$('#admin_masuk').click(function () {
			var $form = $("#admin_form");
			$form.submit(function (e) {
				e.preventDefault();
				var username = $form.find('[name="username"]').val();
				var password = $form.find('[name="password"]').val();
				if ( $.trim(username).length == 0 || $.trim(password).length == 0 ) {
					swal("Akses Administrator", "Jika anda Administrator,<br> Masukkan Username dan Password untuk masuk!", "info");
					return false;
				} else {
					$form.off("submit").submit(); 
				}
			});
		});

	</script>

	@if ( $errors->has('username') || $errors->has('password') )
	<script type="text/javascript">
	    $(document).ready(function () {
	        Swal({
	          title: 'GAGAL!',
	          text: 'Username dan Password tidak cocok.',
	          type: 'error',
	        })
	    });
	</script>
	@endif


	@if( session('notfound') )
	  <script type="text/javascript">
	      $(document).ready(function () {
	      	Swal({
	          title: 'Tidak Ditemukan!',
	          text: 'Kode yang dimasukkan tidak ada.',
	          type: 'error',
	        })
	      });
	  </script>
	@endif

	@yield('js')
</body>
</html>