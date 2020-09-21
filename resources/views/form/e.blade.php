@php
$data_meta = ( $data_meta ? unserialize( $data_meta->meta_value ) : '' );
$jenis_form = ( $idx ? substr( $idx, 0, 1 ) : '' );
$files_foto = ( $data_meta && isset( $data_meta['file_foto'] ) ? $data_meta['file_foto'] : '' );
$agama = App\Variable::agama();
$jenis_kelamin = App\Variable::jenis_kelamin();
$status_hubungan = App\Variable::status_hubungan();
$pendidikan = App\Variable::pendidikan();
$warga_negara = App\Variable::warga_negara();
@endphp
<div class="tab formulir">
	<div class="row">
		<div class="col-sm-6">
			NIK:
				<p><input class="form-control kedua" placeholder="NIK..." oninput="this.className = 'form-control'" name="nik" value="{{ ( isset( $data_meta['nik'] ) ? $data_meta['nik'] : '' ) }}"></p>
		</div>
		<div class="col-sm-6">
			KK:
				<p><input class="form-control kedua" placeholder="KK..." oninput="this.className = 'form-control'" name="kk" value="{{ ( isset( $data_meta['kk'] ) ? $data_meta['kk'] : '' ) }}"></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			Nama Lengkap:
				<p><input class="form-control kedua" placeholder="Nama lengkap..." oninput="this.className = 'form-control'" name="nama" value="{{ ( isset( $data_meta['nama'] ) ? $data_meta['nama'] : '' ) }}"></p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			Alamat Lahir:
				<p><input class="form-control kedua" placeholder="Tempat lahir..." oninput="this.className = 'form-control'" name="tempat_lahir" value="{{ ( isset( $data_meta['tempat_lahir'] ) ? $data_meta['tempat_lahir'] : '' ) }}"></p>
		</div>
		<div class="col-sm-6">
			Tanggal Lahir:
				<p><input class="form-control kedua input_tanggalan" placeholder="Tanggal lahir..." onchange="this.className = 'form-control'" name="tanggal_lahir" value="{{ ( isset( $data_meta['tanggal_lahir'] ) ? $data_meta['tanggal_lahir'] : '' ) }}"></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
		Alamat:
			<p><textarea class="form-control kedua" placeholder="Alamat..." oninput="this.className = 'form-control'" style="width: 100%" name="alamat">{{ ( isset( $data_meta['alamat'] ) ? $data_meta['alamat'] : '' ) }}</textarea></p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			Jenis kelamin:
			    <p>
			    	<select class="form-control kedua select-option" name="jenis_kelamin" oninput="this.className = 'form-control'">
		              <option selected disabled value="dont">-Pilih-</option>

		              @foreach ( $jenis_kelamin as $key => $value )
		                <option {{ ( isset($data_meta['jenis_kelamin']) && $data_meta['jenis_kelamin'] == $key ? 'selected ' : '' ) }} value='{{ $key }}'>{{ $value }}</option>
		              @endforeach

		            </select>
			    </p>
		</div>
		<div class="col-sm-6">
			Status:
			    <p>
			    	<select class="form-control kedua select-option" name="status_hubungan" oninput="this.className = 'form-control'">
		              <option selected disabled value="dont">-Pilih-</option>

		              @foreach ( $status_hubungan as $key => $value )
		                <option {{ ( isset($data_meta['status_hubungan']) && $data_meta['status_hubungan'] == $key ? 'selected ' : '' ) }} value='{{ $key }}'>{{ $value }}</option>
		              @endforeach
		              
		            </select>
			    </p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			Pendidikan:
			    <p>
			    	<select class="form-control kedua select-option" name="pendidikan" oninput="this.className = 'form-control'">
		              <option selected disabled value="dont">-Pilih-</option>

		              @foreach ( $pendidikan as $key => $value )
		                <option {{ ( isset($data_meta['pendidikan']) && $data_meta['pendidikan'] == $key ? 'selected ' : '' ) }} value='{{ $key }}'>{{ $value }}</option>
		              @endforeach

		            </select>
			    </p>
		</div>
		<div class="col-sm-6">
			Warga Negara:
			    <p>
			    	<select class="form-control kedua select-option" name="warga_negara" oninput="this.className = 'form-control'">
		              <option selected disabled value="dont">-Pilih-</option>

		              @foreach ( $warga_negara as $key => $value )
		                <option {{ ( isset($data_meta['warga_negara']) && $data_meta['warga_negara'] == $key ? 'selected ' : '' ) }} value='{{ $key }}'>{{ $value }}</option>
		              @endforeach
		              
		            </select>
			    </p>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-6">
			Agama:
			    <p>
			    	<select class="form-control kedua select-option" name="agama" oninput="this.className = 'form-control'">
		              <option selected disabled value="dont">-Pilih-</option>

		              @foreach ( $agama as $key => $value )
		                <option {{ ( isset($data_meta['agama']) && $data_meta['agama'] == $key ? 'selected ' : '' ) }} value='{{ $key }}'>{{ $value }}</option>
		              @endforeach
		              
		            </select>
			    </p>
		</div>
		<div class="col-sm-6">
			Pekerjaan:
				<p><input class="form-control kedua" placeholder="Pekerjaan..." oninput="this.className = 'form-control'" name="pekerjaan" value="{{ ( isset( $data_meta['pekerjaan'] ) ? $data_meta['pekerjaan'] : '' ) }}"></p>
		</div>
	</div>

	<div class="row">
		<div class="col">
			Keperluan:
				<p><input class="form-control kedua" placeholder="Keperluan..." oninput="this.className = 'form-control'" name="keperluan" value="{{ ( isset( $data_meta['keperluan'] ) ? $data_meta['keperluan'] : '' ) }}"></p>
		</div>
	</div>

</div>
<div class="tab formulir">
	<div class="row">
		<div class="col-sm-6">
			KTP:
				<p>
					@if( $status && $status != 8 )
					<a class="image-link" href="{{ ( $files_foto && isset( $files_foto['foto_ktp'] ) ? url('uploads/'.$jenis_form.'/'.$files_foto['foto_ktp']) : '' ) }}">
                      <img style="width:auto;height:200px;" class="rounded mx-auto d-block img-fluid" height="400px" src="{{ ( $files_foto && isset( $files_foto['foto_ktp'] ) ? url('uploads/'.$jenis_form.'/'.$files_foto['foto_ktp']) : '' ) }}">
                    </a>
					@else
					<input type="file" name="foto_ktp" class="dropify" data-allowed-file-extensions="jpg jpeg" data-default-file="{{ ( $files_foto && isset( $files_foto['foto_ktp'] ) ? url('uploads/'.$jenis_form.'/'.$files_foto['foto_ktp']) : '' ) }}" data-min-width="400" data-min-height="400">
					@endif
				</p>
				<input type="hidden" name="foto_control_ktp" value="{{ ( $files_foto && isset( $files_foto['foto_ktp'] ) ? $files_foto['foto_ktp'] : '' ) }}" />
		</div>
		<div class="col-sm-6">
			KK:
				<p>
					@if( $status && $status != 8 )
					<a class="image-link" href="{{ ( $files_foto && isset( $files_foto['foto_kk'] ) ? url('uploads/'.$jenis_form.'/'.$files_foto['foto_kk']) : '' ) }}">
                      <img style="width:auto;height:200px;" class="rounded mx-auto d-block img-fluid" height="400px" src="{{ ( $files_foto && isset( $files_foto['foto_kk'] ) ? url('uploads/'.$jenis_form.'/'.$files_foto['foto_kk']) : '' ) }}">
                    </a>
					@else
					<input type="file" name="foto_kk" class="dropify" data-allowed-file-extensions="jpg jpeg" data-default-file="{{ ( $files_foto && isset( $files_foto['foto_kk'] ) ? url('uploads/'.$jenis_form.'/'.$files_foto['foto_kk']) : '' ) }}" data-min-width="400" data-min-height="400"/>
					@endif
				</p>
               <input type="hidden" name="foto_control_kk" value="{{ ( $files_foto && isset( $files_foto['foto_kk'] ) ? $files_foto['foto_kk'] : '' ) }}" />
		</div>
	</div>
</div>
