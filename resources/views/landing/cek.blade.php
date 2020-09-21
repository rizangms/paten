@php( $data_meta = ( $data_meta ? unserialize( $data_meta->meta_value ) : '' ) )

@section('css')
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.standalone.min.css">
@if( strtolower($data->jenis) == 'b' || strtolower($data->jenis) == 'c' )
<style type="text/css">
	fieldset.scheduler-border {
	    border: 1px groove #ddd !important;
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
@endif
@if( strtolower($data->jenis) == 'b' )
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
        background: #ababab;
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
@endif
@endsection

@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
<script type="text/javascript">
	$('.dropify').dropify();
</script>
<script type="text/javascript">
	$('.input_tanggalan').datepicker({
			format: "dd MM yyyy",
	    language: "id"
	});
</script>
@if( $id && $notif )
	<script type="text/javascript">
		$(window).load(function () {
			swal("Kode anda '{{ $id }}'", "Silahkan simpan kode anda untuk melihat status permohonan", "info");
		});
	</script>
@endif

<script type="text/javascript">
	var $form = $("#perlengkapan");
	$form.submit(function (e) {
		e.preventDefault();
		Swal({
        	type: 'success',
        	title: "Tersimpan!", 
        	text: "Form permohonan telah dikirim.",
        	confirmButtonText: 'Tutup'
      	}).then(function(){
			$form.off("submit").submit(); 
			modal('hide');
		});
	});
</script>

@if( strtolower($data->jenis) == 'b' || strtolower($data->jenis) == 'c'  )
<script type="text/javascript">
	$(document).ready(function () {
		
		$('.batas_extra').hide();

		$('#addRow').click(function () {
			$('.batas_extra').show();
	    	$('<div/>', {
	       		'class' : 'extraPerson', html: GetHtml()
			}).hide().appendTo('#container').slideDown('slow');
	    	load_js();
		});
	})
	function GetHtml()
	{
	    var len = $('.extraPerson').length;
	    len = len+1;
	    var $html = $('.extraPersonTemplate').clone();
	    $html.find('.nomor_urut').text( len+1 );

	    return $html.html();    
	}
</script>
<script type="text/javascript">
	function load_js()
   	{
      	$('.input_tanggalan').datepicker({
			format: "dd MM yyyy",
	    	language: "id"
		});
   	}
</script>
@endif
@endsection

@extends('layouts.landing')

@section('content')
<section class="py-5">
  <div class="container">
    <h3 id="lihat" class="py-3">Status permohonan anda</h3>
    <div class="card">
      <div class="card-body table-responsive">
      	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">Kode</th>
		      <th scope="col">NIK</th>
		      <th scope="col">Nama</th>
		      <th scope="col">Alamat</th>
		      <th scope="col">Status</th>
		      <!-- <th scope="col" {{ ( $data->status == 9 ? 'colspan=2' : '' ) }}>Status</th> -->
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      @if( $data )
				<td>{{ $data->id }}</td>
				<td>{{ $data->nik }}</td>
				<td>{{ $data->nama }}</td>
				<td>{{ $data->alamat }}</td>
				@if ( $data->status == 8 )
				<td>	
					<button type="button" id="show_form" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Lengkapi</button>
				</td>
				@else
				<td width="150px"><h5><span style="padding: 10px 18px" class="rounded badge {{ ( $data->status == 1 ? 'badge-success' : ( $data->status == 9 ? 'badge-warning' : 'badge-danger' ) ) }}">{{ ( $data->status == 1 ? 'Selesai' : ( $data->status == 9 ? 'Pending' : 'Di Tolak' ) ) }}</span></h5></td>
				@endif
			  @else
			  	<td class="mx-auto py-5" colspan="5"><center><i>Data tidak ditemukan</i></center></td>
		      @endif
		    </tr>
		    @if ( $data->status == 2 )
		    <tr>
		    	<td colspan="5" class="p-5"><div class="">Alasan di tolak :<br><p style="white-space: pre-wrap;" class="align-middle text-center border border-danger rounded p-5">{{ $data->alasan }}</p></div></td>
		    </tr>
		    @endif
		  </tbody>
		</table>
      </div>
  	</div>
  </div>
</section>
@if( $data && $data->status == 8 )
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	@include("form.".strtolower($data->jenis))
</div>
@endif
@endsection

