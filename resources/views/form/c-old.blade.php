@php
$agama = App\Variable::agama();
$jenis_kelamin = App\Variable::jenis_kelamin();
$status_hubungan = App\Variable::status_hubungan();
$status_keluarga = App\Variable::status_keluarga();
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
    <form id="perlengkapan" method="POST" action="{{ url('/kelengkapan-permohonan') }}">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $id }}">
      <input type="hidden" name="tipe" value="{{ ( $data_meta ? 'edit' : 'tambah' ) }}">
      <div class="modal-body">
          <div class="form-group row">
            <label for="nik" class="col-lg-2 col-form-label align-self-center">NIK / Nama</label>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <input type="text" title="Angka harus 16 digit" name="nik" class="form-control" id="nik" required pattern="[0-9]{16}" placeholder="NIK" value="{{ ( isset( $data_meta['nik'] ) ? $data_meta['nik'] : $data->nik ) }}">
            </div>
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
              <input type="text" name="tanggal_lahir" class="form-control input_tanggalan" data-language='id' id="tanggal_lahir" required value="{{ ( isset( $data_meta['tanggal_lahir'] ) ? $data_meta['tanggal_lahir'] : '' ) }}">
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
            <label for="jenis_kelamin" class="col-lg-2 col-form-label align-self-center">Jenis Kelamin / Agama</label>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option selected disabled>-Pilih-</option>

                @foreach ( $jenis_kelamin as $key => $value )
                  <option {{ ( isset($data_meta['jenis_kelamin']) && $data_meta['jenis_kelamin'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                @endforeach


              </select>
            </div>
            <div class="col-sm-6 col-lg-5 align-self-center">
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
            <label for="pekerjaan" class="col-lg-2 col-form-label align-self-center">Pekerjaan / Warga negara</label>
            <div class="col-sm-6 col-lg-5 align-self-center">
                <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required value="{{ ( isset( $data_meta['pekerjaan'] ) ? $data_meta['pekerjaan'] : '' ) }}">
            </div>
            <div class="col-sm-6 col-lg-5 align-self-center">
              <select class="form-control" id="warga_negara" name="warga_negara" required>
                <option selected disabled>-Pilih-</option>

                @foreach ( $warga_negara as $key => $value )
                  <option {{ ( isset($data_meta['warga_negara']) && $data_meta['warga_negara'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                @endforeach

              </select>
            </div>
          </div>
          <hr>
          <fieldset class="scheduler-border">
            <legend class="scheduler-border">Daftar tanggungan Keluarga</legend>
            <div class="extraPersonTemplate">
              <div class="row">
                <div class="col-1 text-center nomor_urut align-self-center">
                  1
                </div>
                <div class="col-11">
                  <div class="form-group row my-1">
                    <div class="col-sm-4 align-self-center">
                        <input type="text" name="nik_tk[]" class="form-control" id="nik_tk" required value="{{ ( isset( $data_meta['nik_tk'] ) ? $data_meta['nik_tk'] : '' ) }}" placeholder="NIK">
                    </div>
                    <div class="col-sm-4 align-self-center">
                        <input type="text" name="nama_tk[]" class="form-control" id="nama_tk" required value="{{ ( isset( $data_meta['nama_tk'] ) ? $data_meta['nama_tk'] : '' ) }}" placeholder="Nama">
                    </div>
                    <div class="col-sm-4 align-self-center">
                        <select class="form-control" id="jenis_kelamin_tk" name="jenis_kelamin_tk[]" required>
                          <option selected disabled>-Pilih-</option>

                          @foreach ( $jenis_kelamin as $key => $value )
                            <option {{ ( isset($data_meta['jenis_kelamin_tk']) && $data_meta['jenis_kelamin_tk'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                          @endforeach

                        </select>
                    </div>
                  </div>
                  <div class="form-group row my-1">
                    <div class="col-sm-4 align-self-center">
                        <input type="text" name="tempat_tk[]" class="form-control" id="tempat_tk" required value="{{ ( isset( $data_meta['tempat_tk'] ) ? $data_meta['tempat_tk'] : '' ) }}" placeholder="Tempat Lahir">
                    </div>
                    <div class="col-sm-4 align-self-center">
                        <input type="text" name="tanggal_lahir_tk[]" class="form-control input_tanggalan" data-language='id' id="tanggal_lahir_tk" required value="{{ ( isset( $data_meta['tanggal_lahir_tk'] ) ? $data_meta['tanggal_lahir_tk'] : '' ) }}">
                    </div>
                    <div class="col-sm-4 align-self-center">
                        <select class="form-control" id="status_tk" name="status_tk[]" required>
                          <option selected disabled>-Pilih-</option>

                          @foreach ( $status_keluarga as $key => $value )
                            <option {{ ( isset($data_meta['status_tk']) && $data_meta['status_tk'] == $key ? 'selected ' : ''  ) }}value='{{ $key }}'>{{ $value }}</option>
                          @endforeach

                        </select>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="batas_extra" style="border-top: 1px dashed">
            </div>
            <div id="container"></div>
            <div class="text-center mt-2"><a href="#" id="addRow" class="btn btn-outline-info">Tambah</a></div>
          </fieldset>
          <hr>
          <div class="form-group row">
              <label for="keperluan" class="col-lg-2 col-form-label align-self-center">Keperluan</label>
              <div class="col-sm-12 col-lg-10 align-self-center">
                  <input type="text" name="keperluan" class="form-control" id="keperluan" required value="{{ ( isset( $data_meta['keperluan'] ) ? $data_meta['keperluan'] : '' ) }}">
              </div>
          </div>
    
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