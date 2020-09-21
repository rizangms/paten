@php
$agama = App\Variable::agama();
$jenis_kelamin = App\Variable::jenis_kelamin();
$status_hubungan = App\Variable::status_hubungan();
$pendidikan = App\Variable::pendidikan();
$warga_negara = App\Variable::warga_negara();
@endphp
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Lengkapi From berikut</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form id="perlengkapan" method="POST" enctype="multipart/form-data" action="{{ url('/kelengkapan-permohonan') }}">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $id }}">
      <input type="hidden" name="tipe" value="{{ ( $data_meta ? 'edit' : 'tambah' ) }}">
      <div class="modal-body">
          <div class="form-group row">
            <label for="nik" class="col-lg-2 col-form-label align-self-center">NIK / KK</label>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <input type="text" title="Angka harus 16 digit" name="nik" class="form-control" id="nik" required pattern="[0-9]{16}" placeholder="NIK" value="{{ ( isset( $data_meta['nik'] ) ? $data_meta['nik'] : $data->nik ) }}">
            </div>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <input type="text" title="Angka harus 16 digit" name="kk" class="form-control" id="kk" required pattern="[0-9]{16}" placeholder="KK" value="{{ ( isset( $data_meta['kk'] ) ? $data_meta['kk'] : '' ) }}">
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label for="nama" class="col-lg-2 col-form-label align-self-center">Nama Lengkap</label>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <input type="text" name="nama" class="form-control" id="nama" required placeholder="Nama Lengkap" value="{{ ( isset( $data_meta['nama'] ) ? $data_meta['nama'] : $data->nama ) }}">
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label for="tempat" class="col-lg-2 col-form-label align-self-center">Tempat / Tanggal lahir</label>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <input type="text" name="tempat" class="form-control" id="tempat" required placeholder="Tempat Lahir" value="{{ ( isset( $data_meta['tempat'] ) ? $data_meta['tempat'] : '' ) }}">
            </div>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <input type="text" name="tanggal_lahir" class="form-control input_tanggalan" data-language='en' id="tanggal_lahir" required value="{{ ( isset( $data_meta['tanggal_lahir'] ) ? $data_meta['tanggal_lahir'] : '' ) }}">
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label for="alamat" class="col-lg-2 col-form-label align-self-center">Alamat Lengkap</label>
            <div class="col align-self-center">
              <textarea class="form-control" id="alamat" name="alamat" required required placeholder="">{{ ( isset( $data_meta['alamat'] ) ? $data_meta['alamat'] : $data->alamat ) }}</textarea>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label for="jenis_kelamin" class="col-lg-2 col-form-label align-self-center">Jenis Kelamin / Status</label>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option selected disabled>-Pilih-</option>

                @foreach ( $jenis_kelamin as $key => $value )
                  <option {{ ( isset($data_meta['jenis_kelamin']) && $data_meta['jenis_kelamin'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                @endforeach


              </select>
            </div>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <select class="form-control" id="status_hubungan" name="status_hubungan" required>
                <option selected disabled>-Pilih-</option>

                @foreach ( $status_hubungan as $key => $value )
                  <option {{ ( isset($data_meta['status_hubungan']) && $data_meta['status_hubungan'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                @endforeach

              </select>
            </div>
          </div>
          <hr>
          <div class="form-group row">
            <label for="pendidikan" class="col-lg-2 col-form-label align-self-center">Pendidikan / Warga negara / Agama</label>
            <div class="col-sm-3 align-self-center">
              <select class="form-control" id="pendidikan" name="pendidikan" required>
                <option selected disabled>-Pilih-</option>

                @foreach ( $pendidikan as $key => $value )
                  <option {{ ( isset($data_meta['pendidikan']) && $data_meta['pendidikan'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                @endforeach

              </select>
            </div>
            <div class="col-sm-3 align-self-center">
              <select class="form-control" id="warga_negara" name="warga_negara" required>
                <option selected disabled>-Pilih-</option>

                @foreach ( $warga_negara as $key => $value )
                  <option {{ ( isset($data_meta['warga_negara']) && $data_meta['warga_negara'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                @endforeach

              </select>
            </div>
            <div class="col-sm-4 align-self-center">
              <select class="form-control" id="agama" name="agama" required>
                <option selected disabled>-Pilih-</option>

                @foreach ( $agama as $key => $value )
                  <option {{ ( isset($data_meta['agama']) && $data_meta['agama'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                @endforeach

              </select>
            </div>
          </div>
          <hr>
          <div class="form-group row">
              <label for="pekerjaan" class="col-lg-2 col-form-label align-self-center">Pekerjaan</label>
              <div class="col-sm-6 col-lg-5 align-self-center">
                  <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required value="{{ ( isset( $data_meta['pekerjaan'] ) ? $data_meta['pekerjaan'] : '' ) }}">
              </div>
          </div>
          <hr>
          <div class="form-group row">
              <label for="keperluan" class="col-lg-2 col-form-label align-self-center">Keperluan</label>
              <div class="col-sm-12 col-lg-10 align-self-center">
                  <input type="text" name="keperluan" class="form-control" id="keperluan" required value="{{ ( isset( $data_meta['keperluan'] ) ? $data_meta['keperluan'] : '' ) }}">
              </div>
          </div>
          <hr>


        <label class="col-form-label font-weight-bold">Kelengkapan</label>
        <div class="row">
          <div class="col-sm-6">
            <label for="file_ktp">Foto KTP</label>
            <div class="wrapper-foto">
               <input type="file" name="foto_ktp" id="foto_ktp" class="dropify" data-allowed-file-extensions="jpg jpeg" data-min-width="400" data-min-height="400" />
               <input type="hidden" name="foto_control_ktp" value="" />
            </div>
          </div>
          <div class="col-sm-6">
            <label for="file_kk">Foto KK</label>
            <div class="wrapper-foto">
               <input type="file" name="foto_kk" id="foto_kk" class="dropify" data-allowed-file-extensions="jpg jpeg" data-min-width="400" data-min-height="400" />
               <input type="hidden" name="foto_control_kk" value="" />
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" id="sbmt" class="btn btn-primary">Kirim</button>
      </div>
    </form>
    </div>
  </div>