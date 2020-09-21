@section('js')
<script type="text/javascript">var $form = $("#pengaturan");$form.submit(function (e) {e.preventDefault();swal({title: "Tersimpan!", text: "pengaturan telah disimpan.", type: "success",confirmButtonText: 'Tutup'}).then(function(){$form.off("submit").submit(); modal('hide');});});</script>
@endsection

@extends('layouts.app')

@section('content')
<!-- Page-header start -->
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-8">
        <div class="page-header-title">
          <h5 class="m-b-10">Setting</h5>
          <p class="m-b-0">SIM-PATEN</p>
        </div>
      </div>
      <div class="col-md-4">
        <ul class="breadcrumb-title">
          <li class="breadcrumb-item">
            <a href="{{ url('/home') }}"> <i class="fa fa-home"></i> </a>
          </li>
          <li class="breadcrumb-item"><a href="#!">Setting</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div class="pcoded-inner-content">
  <!-- Main-body start -->
  <div class="main-body">
    <div class="page-wrapper">
      <!-- Page-body start -->
      <div class="page-body">
        <div class="container">
          <!-- task, page, download counter  start -->
          <div class="card">
            <div class="card-header">
              <h5>Pengaturan Identitas Kecamatan</h5>
              <!-- <span>use class <code>table</code> inside table element</span> -->
              <div class="card-header-right">
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <form id="pengaturan" method="POST" action="{{ url('/pengaturan') }}">
                    {{ csrf_field() }}
                    <div class="form-group row">
                      <label for="provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="provinsi" class="form-control" id="provinsi" value="{{ ( isset( $data['provinsi'] ) ? $data['provinsi'] : '' ) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="kabupaten" class="form-control" id="kabupaten" value="{{ ( isset( $data['kabupaten'] ) ? $data['kabupaten'] : '' ) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="{{ ( isset( $data['kecamatan'] ) ? $data['kecamatan'] : '' ) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nama_camat" class="col-sm-3 col-form-label">Nama Camat</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="nama_camat" class="form-control" id="nama_camat" value="{{ ( isset( $data['nama_camat'] ) ? $data['nama_camat'] : '' ) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="nip_camat" class="col-sm-3 col-form-label">NIP Camat</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="nip_camat" class="form-control" id="nip_camat" value="{{ ( isset( $data['nip_camat'] ) ? $data['nip_camat'] : '' ) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="alamat_kantor" class="col-sm-3 col-form-label">Alamat Kantor</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="alamat_kantor" class="form-control" id="alamat_kantor" value="{{ ( isset( $data['alamat_kantor'] ) ? $data['alamat_kantor'] : '' ) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="email_kantor" class="col-sm-3 col-form-label">Email Kantor</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="email_kantor" class="form-control" id="email_kantor" value="{{ ( isset( $data['email_kantor'] ) ? $data['email_kantor'] : '' ) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="telp_kantor" class="col-sm-3 col-form-label">Telpon Kantor</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="telp_kantor" class="form-control" id="telp_kantor" value="{{ ( isset( $data['telp_kantor'] ) ? $data['telp_kantor'] : '' ) }}">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="kode_pos" class="col-sm-3 col-form-label">Kode Pos</label>
                      <div class="col-sm-9 align-self-center">
                        <input type="text" name="kode_pos" class="form-control" id="kode_pos" value="{{ ( isset( $data['kode_pos'] ) ? $data['kode_pos'] : '' ) }}">
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary float-right" value="simpan">
                  </form>
                </div>
                <div class="col-sm-1"></div>
              </div>
          </div>
        </div>

        <!-- task, page, download counter  end -->
      </div>
    </div>
    <!-- Page-body end -->

  </div>
  <div id="styleSelector"> </div>
</div>
</div>
@endsection

