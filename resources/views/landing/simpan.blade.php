@extends('layouts.landing')

@section('content')
<section style="padding: 70px 0">
  <div class="container">
    <h3 id="lihat" style="padding: 20px 0 0 0">Kode Permohonan Anda <span style="font-size: 105%" class="badge badge-info">{{ $id }}</span></h3>
    	<p style="padding-top: -10px">Mohon simpan kode permohonan anda.</p>
    <p>kode digunakan untuk melihat status permohonan.</p>
  </div>
</section>
@endsection

