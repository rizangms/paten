@php
	date_default_timezone_set('Asia/Jakarta');
@endphp
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>{{ ( isset($data['nomor_surat']) ? $data['nomor_surat'] : '' ) }}</title>
	<style type="text/css">
		.p {
			text-indent: 40px;
			margin: 9px;
			text-align: justify;
  			text-justify: inter-word;
		}
		#khusus td {
			vertical-align: text-top;
		}
    .anggota_kk, .anggota_kk th, .anggota_kk td  {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 5px;
    }
    #txt, #hide {
      font:inherit;
      margin:0;
      padding:0;
    }
    #txt {
      border:none;
    }
	</style>
	</head>

	<body>
		<table>
        <tr>
            <td width="150px">
                <center>
                    <img src="{{ url('assets/foto/LOGO TULUNGAGUNG.png') }}" width="80px" height="auto">
                </center>
            </td>
            <td width="560px">
                <center style="margin-left: -50px">
                    <h2 style="margin: 0 0 5px 0">PEMERINTAH  KABUPATEN  {{ strtoupper( $data['kabupaten'] ) }}<br>
                        KECAMATAN {{ strtoupper( $data['kecamatan'] ) }}</h2>
                    <small>{{ $data['alamat_kantor'] }}, Kec. {{ $data['kecamatan'] }}. Kode Pos: {{ $data['kode_pos'] }}<br>
                        Telp. {{ $data['telp_kantor'] }}, Email: {{ $data['email_kantor'] }}</small>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <hr style="height:7px;border:none;color:#333;background-color:#333;" />
            </td>
        </tr>
		@yield('content')
    <script type="text/javascript" src="{{ url('assets/app/js/jquery/jquery.min.js') }}"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/locales/bootstrap-datepicker.id.min.js"></script>
    <script type="text/javascript">
      var date = new Date();
      var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
      var end = new Date(date.getFullYear(), date.getMonth(), date.getDate());
        $('.input_tanggalan').datepicker({
            format: "dd MM yyyy",
            language: "id",
            todayHighlight: true,
            startDate: today,
            endDate: end,
            autoclose: true
        });
        $('.input_tanggalan').datepicker('setDate', today);
        $(function(){
          $('#hide').text($('#txt').val()).hide();
          $('#txt').width($('span').width());
        }).on('input', function () {
          $('#hide').text($('#txt').val());
          $('#txt').width($('span').width());
        });
        $('#txt').attr('readonly', true);
    </script>
    </body>
</html>