@php( $jenis = App\Variable::jenis_surat() )
@php( $jenis_form = ( $id ? substr( $id, 0, 1 ) : '' ) )
@php( $data_status = isset( $data->status ) ? $data->status : '' )
@php( $color = ( $data_status ? ( $data->status == 8 ? 'warning' : ( $data->status == 9 ? 'secondary' : ( $data->status == 1 ? 'success' : ( $data->status == 2 ? 'danger' : '' ) ) ) ) : '' ) )

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script>
	"use strict";
	var data_id = "{{ $id }}";
	var data_status = "{{ $data_status }}";
	var currentTab = 0; 
	starting();
	load_form();
	function starting() {
		showTab(currentTab); 
	}

	function showTab(n) {
		var x = $(".tab");
		x[n].style.display = "block";
		if (n == 0) {
			$("#prevBtn")[0].style.display = "none";
		} else {
			$("#prevBtn")[0].style.display = "inline";
		}
		if (n == (x.length - 1)) {
			$("#nextBtn")[0].innerHTML = "Submit";
			if( data_id ) {
				if ( data_status == 1 || data_status == 9 ) {
					$("#nextBtn")[0].style.display = "none";
					$("#nextBtn").prop('disabled', true);
				}
			}
		} else {
			$("#nextBtn")[0].innerHTML = "Lanjut";
			if( data_id ) {
				if ( data_status == 1 || data_status == 9 ) {
					$("#nextBtn")[0].style.display = "inline";
					$("#nextBtn").prop('disabled', false);
				}
			}
		}
		fixStepIndicator(n)
	}

	function nextPrev(n) {
		var x = $('.tab');
		if (n == 1 && !validateForm()) return false;
		x[currentTab].style.display = "none";
		currentTab = currentTab + n;
		if (currentTab >= x.length) {
			var i, z = 0;
			var data_file = document.querySelectorAll("input.dropify");
			for (i = 0; i < data_file.length; i++) {
				if (data_file[i].value == "") {
					z = z + 1;
				}
			}
			$('button').hide();
			if( z == 0 ){
				Swal({
					type: 'success',
					title: "Sukses!", 
					text: "Form permohonan telah dikirim.",
					confirmButtonText: 'Tutup'
				}).then(function(){
					$('#regForm')[0].submit();
				});
			} else {
				Swal({
					type: 'info',
					title: "Formulir belum lengkap!", 
					text: "Formulir permohonan belum dikirimkan ke admin. Segeralah lengkapi formulir.",
					confirmButtonText: 'Tutup'
				}).then(function(){
					$('#regForm')[0].submit();
				});
			}
			
			return false;
		}
		showTab(currentTab);
	}

	function validateForm() {
		var x, y, z, s, i, valid = true;
		x = $('.tab');
		y = x[currentTab].querySelectorAll("input.form-control");
		for (i = 0; i < y.length; i++) {
			if (y[i].value == "") {
				y[i].className += " invalid";
				valid = false;
			}
		}

		z = x[currentTab].getElementsByTagName("textarea");
		for (i = 0; i < z.length; i++) {
			if (z[i].value == "") {
				z[i].className += " invalid";
				valid = false;
			}
		}

		s = x[currentTab].querySelectorAll("select.select-option");
		for (i = 0; i < s.length; i++) {
			if (s[i].options[s[i].selectedIndex].value == "dont") {
				s[i].className += " invalid";
				valid = false;
			}
		}

		if (valid) {
			$('.step')[currentTab].className += " finish";
		}
		return valid; 
	}

	function fixStepIndicator(n) {
		var i, x = $('.step');
		for (i = 0; i < x.length; i++) {
			x[i].className = x[i].className.replace(" active", "");
		}
		x[n].className += " active";
	}

	$('#select-option').change(function(){
		$('#formulir').html('');
		load_form();
    });

    function load_form() {
		var selectedValue = $('#select-option').val();
        if ( selectedValue ) {
        	var i, formulir = document.querySelectorAll("div.formulir");
        	for (i = 0; i < formulir.length; i++ ) {
        		if ( i == 0 ){
        			formulir[i].classList.remove("formulir");
        			formulir[i].setAttribute("id", "formulir");
        		} else {
        			formulir[i].remove();
        		}
        	}
        	if ( data_id ) {
	        	$.get(base_url + "/formulir-" + selectedValue + "/" + data_id + "#formulir", function(data) {
				    $("#formulir").replaceWith(data);
				});
	        } else {
	        	$.get(base_url + "/formulir-" + selectedValue + "#formulir", function(data) {
				    $("#formulir").replaceWith(data);
				});
	        }
            setTimeout(function(){ 
	            load_js();
	            if ( data_id ) {
		            reload_js();
					$(document).ready(function() {
						$('.image-link').magnificPopup({type:'image'});
					});
	            } else {
    	            $('input[name=nama]').val($('input[name=nama_p]').val());
    	            $('input[name=nik]').val($('input[name=nik_p]').val());
    	            $('textarea[name=alamat]').val($('textarea[name=alamat_p]').val());
	            }
		        if ( selectedValue == 'B' || selectedValue == 'C' ) {
		        	$('#step').append('<span class="step lebih"></span>');
		        	form_b_c();
		        } else {
		        	$('#step').find(".lebih").remove();
		        }
			}, 1000);
        } else {
            $('#formulir').html('');
        }
    }

	function load_js() {
   		starting();

		var drEvent = $('.dropify').dropify();

		drEvent.on('dropify.afterClear', function(event, element){
			$(element.element).parents('.col').find('input[type="hidden"]').val('');
		});

      	$('.input_tanggalan').datepicker({
			format: "dd MM yyyy",
	    	language: "id"
		});
   	}
</script>

@if(session('notif'))
    <script type="text/javascript">
    	Swal({
			type: "info",
			title: "{{ session('notif') }}", 
			text: "{{ session('notif2') }}",
			confirmButtonText: 'Tutup'
		});
    </script>
@endif

@if( $id )
	<script type="text/javascript">
		function reload_js() {
			if ( data_status == 8 || data_status == 2 ) {
				var domElements = $(".pertama");
			} else {
				var domElements = $(".pertama, .kedua");
			}
			$(domElements).prop("readonly", true);
			$(domElements).toggleClass("my-read-only-class", true);
			$(domElements).find("option").prop("hidden", true);
		}
	</script>
@endif

<!-- untuk form b dan c -->
<script type="text/javascript">
	function form_b_c() {
		$('.extraPersonTemplate').hide();
		if ( data_status ) {

			setTimeout(function(){
		    	console.log('hapus');
		    	$('.extraPerson').find('.batas_extra').eq(0).hide();
		    	$('.extraPerson').find('.row').eq(0).addClass(" pt-3");
			}, 100);

		    
			if ( data_status != 8 || data_status != 2 ) {
				$(".extraPerson").find('.batas_extra').show();
				$(".extraPerson").find('.hapus-data-kk').hide();
				$("#addRow").hide();
			}
		}
		
		$('#addRow').click(function () {
	    	$('<div/>', {
	       		'class' : 'extraPerson', html: GetHtml()
			}).hide().appendTo('#container').slideDown('slow');
	    	load_js();
	    	tooltip_show();
	    	$(".extraPerson").find('.tk').addClass(" form-control");
	    	$(".extraPerson").find('select').addClass(" select-option");
	    	$(".extraPerson").find('input').prop("disabled", false);
	    	$(".form-control").attr("onClick", "this.className = 'form-control'");
	    	$(".extraPerson").find('.hapus-data-kk').show();
	    	$(".hapus-data-kk").click(function(){
				$(this).parents('.extraPerson').remove();
	    		$('div.tooltip').hide();
			});
		});
	}
	function tooltip_show() {
		$('[data-toggle="tooltip"]').tooltip({
		    trigger : 'hover'
		});
	}
	function GetHtml()
	{
	    var len = $('.extraPerson').length;
	    len = len + 1;
	    var $html = $('.extraPersonTemplate').clone();
	    $html.find('.nomor_urut').text( len );
	    if( len == 1 ) {
	    	setTimeout(function(){
		    	console.log('hapus');
		    	$('.extraPerson').find('.batas_extra').hide(); 
			}, 100);
	    }

	    return $html.html();    
	}
</script>

@endsection

@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.standalone.min.css">
<style>
	* {
		box-sizing: border-box;
	}

	.my-read-only-class {
		cursor: not-allowed;
	}

	.status {
	    margin: 0;
	    font-family: 'Raleway', sans-serif;
    	font-weight: 600;
    	font-size: 75%;
    	padding: 0 .75rem !important;
	}

	.form_border {
	    padding-top: 0.5rem;
	    color: #fff;
	    background: #093640;
	    border-radius: 5px;
	}

	body {
		background-color: #f1f1f1;
	}

	#regForm {
		font-family: Raleway;
		padding: 40px;
		min-width: 300px;
	}

	input {
		padding: 10px;
		width: 100%;
		font-size: 17px;
		font-family: Raleway;
		border: 1px solid #aaaaaa;
	}

	input.invalid, textarea.invalid, select.invalid {
		background-color: #fffa7e;
	}

	.tab {
		display: none;
	}

	button {
		background-color: #17a2b8;
		color: #ffffff;
		border: none;
		padding: 10px 20px;
		font-size: 17px;
		font-family: Raleway;
		cursor: pointer;
	}

	button:hover {
		opacity: 0.8;
	}

	#prevBtn {
		background-color: #17a2b8;
	}

	.step {
		height: 15px;
		width: 15px;
		margin: 0 2px;
		background-color: #bbbbbb;
		border: none;  
		border-radius: 50%;
		display: inline-block;
		opacity: 0.5;
	}

	.step.active {
		opacity: 1;
	}

	.step.finish {
		background-color: #4CAF50;
	}
</style>
<style type="text/css">
	fieldset.scheduler-border {
	    border: 1px groove #ffffff !important;
	    padding: 0 1.4em 1.4em 1.4em !important;
	    margin: 0 0 1.5em 0 !important;
	    -webkit-box-shadow:  0px 0px 0px 0px #000;
	            box-shadow:  0px 0px 0px 0px #000;
	}

	legend.scheduler-border {
	  font-size: 1em !important;
	  font-weight: bold !important;
	  text-align: left !important;
	  width:auto;
	  padding:0 10px;
	  border-bottom:none;
	}

	.extraPersonTemplate {
	    display:inline;
	}

	.extraPerson {
	    display:inline !important;
	}
</style>
<style type="text/css">
	.strike {
        display: block;
        text-align: center;
        overflow: hidden;
        white-space: nowrap; 
    }

    .strike > span {
        position: relative;
        display: inline-block;
    }
	
    .strike > span:before,
    .strike > span:after {
        content: "";
        position: absolute;
        top: 50%;
        width: 9999px;
        height: 1px;
        background: #ffffff;
    }

    .strike > span:before {
        right: 100%;
        margin-right: 15px;
    }

    .strike > span:after {
        left: 100%;
        margin-left: 15px;
    }
</style>
@endsection

@extends('layouts.landing')

@section('content')
		<div class="site-content" id="content">
			<main class="site-main" id="main" role="main">
				<header class="page-header">
					<div class="container">
						<h1 class="title h4 text-left">{{ ( $id ? 'Status' : 'Formulir' ) }}  Surat Permohonan</h1>
						<p class="desc">{{ ( $id ? 'Status tentang kejelasan surat permohonan anda( ' : 'Lengkapi formulir yang ) di ( data_id &&sediakan' ) }}</p>
					</div>
				</header>
				<div class="container">
					<div class="row" style="margin-top: -4px !important;">
						<div class="col-12 col-lg-8 form_border">
							<form id="regForm" method="POST" enctype="multipart/form-data" action="{{ url('/pengajuan') }}">
								{{ csrf_field() }}
								<input type="hidden" name="id" value="{{ $id }}">
								<input type="hidden" name="tipe" value="{{ ( $id ? 'edit' : 'tambah' ) }}">
								@if ( $id )
									<h2 class="text-center">Status Permohonan <span class="btn btn-{{$color}} status">{{ App\Variable::status_proses( $data->status ) }}</span></h2>
									@if( $data->status == 2)
									<input type="hidden" name="status" value="{{ $data->status }}">
									<h4 style="margin-bottom: 0" class="mt-4">Alasan di tolak:</h4>
									<div class="mb-2 jumbotron-fluid border border-light rounded">
									  <div class="container">
									    <p class="py-2" style="white-space: pre-wrap; margin-top: 1rem; margin-bottom: 1rem;">{{ $data->alasan }}</p>
									  </div>
									</div>
									<hr class="my-4 border border-light">
									@endif
								@else
									<h2 class="text-center">Isikan data diri anda:</h2>
								@endif
								<div class="tab">
								  	NIK:
								    	<p><input class="form-control pertama" placeholder="NIK..." oninput="this.className = 'form-control'" {{ ( $id ? 'readonly' : '' ) }} name="nik_p" value="{{ ( $id ? $data->nik : '' ) }}" type="number" pattern=".{16,16}" title="16 Digit"></p>
								  	Nama Lengkap:
								    	<p><input class="form-control pertama" placeholder="Nama Lengkap..." oninput="this.className = 'form-control'" {{ ( $id ? 'readonly' : '' ) }} name="nama_p" value="{{ ( $id ? $data->nama : '' ) }}"></p>
								  	Alamat:
								    	<p><textarea class="form-control pertama" placeholder="Alamat..." oninput="this.className = 'form-control'" {{ ( $id ? 'readonly' : '' ) }} style="width: 100%" name="alamat_p">{{ ( $id ? $data->alamat : '' ) }}</textarea></p>
								  	Jenis Surat Permohonan:
								    <p>
								    	<select id="select-option" class="form-control select-option pertama" name="jenis_p" oninput="this.className = 'form-control'" {{ ( $id ? 'readonly' : '' ) }} >
							              <option selected disabled value="dont">-Pilih-</option>
							              @foreach ( $jenis as $key => $value )
							                <option {{ ( $id ? ( $data->jenis == $key ? 'selected' : '' ) : '' ) }} value='{{ $key }}'>{{ $value }}</option>
							              @endforeach
							            </select>
								    </p>
								</div>
								<div id="formulir" class="tab"></div>
								<div style="overflow:auto;">
								    <div style="float:right;">
								     	<button type="button" class="btn" id="prevBtn" onclick="nextPrev(-1)">Kembali</button>
								     	<button type="button" class="btn" id="nextBtn" onclick="nextPrev(1)">Lanjut</button>
								    </div>
								</div>
								  <!-- Circles which indicates the steps of the form: -->
								<div id="step" style="text-align:center;margin-top:40px;">
								    <span class="step"></span>
								    <span class="step"></span>
								    <span class="step"></span>
								</div>
							</form>

						</div>
					</div>
				</div>
			</main><!-- .site-main -->
		</div><!-- .site-content -->
@endsection