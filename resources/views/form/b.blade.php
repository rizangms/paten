@php
$data_meta = ( $data_meta ? unserialize( $data_meta->meta_value ) : '' );
$jenis_form = ( $idx ? substr( $idx, 0, 1 ) : '' );
$files_foto = ( $data_meta && isset( $data_meta['file_foto'] ) ? $data_meta['file_foto'] : '' );
$kk_anggota = ( $data_meta && isset( $data_meta['kk_anggota'] ) ? $data_meta['kk_anggota'] : '' );
$agama = App\Variable::agama();
$jenis_kelamin = App\Variable::jenis_kelamin();
$status_hubungan = App\Variable::status_hubungan();
$status_keluarga = App\Variable::status_keluarga();
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

</div>
<div class="tab formulir">

	<div class="strike">
    	<span>Keterangan Pindah</span>
  	</div>

  	<div class="row">
		<div class="col">
		Alamat Tujuan:
			<p><textarea class="form-control kedua" placeholder="Alamat tujuan..." oninput="this.className = 'form-control'" style="width: 100%" name="alamat_tujuan">{{ ( isset( $data_meta['alamat_tujuan'] ) ? $data_meta['alamat_tujuan'] : '' ) }}</textarea></p>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			Alasan Pindah:
				<p><input class="form-control kedua" placeholder="Alasan pindah..." oninput="this.className = 'form-control'" name="alasan_pindah" value="{{ ( isset( $data_meta['alasan_pindah'] ) ? $data_meta['alasan_pindah'] : '' ) }}"></p>
		</div>
		<div class="col-sm-6">
			Tanggal pindah:
				<p><input class="form-control kedua input_tanggalan" placeholder="Tanggal pindah..." onchange="this.className = 'form-control'" name="tanggal_pindah" value="{{ ( isset( $data_meta['tanggal_pindah'] ) ? $data_meta['tanggal_pindah'] : '' ) }}"></p>
		</div>
	</div>

	<fieldset class="scheduler-border">
        <legend class="scheduler-border">Anggota keluarga yang ikut pindah</legend>
        <div class="extraPersonTemplate">
          <hr class="batas_extra" style="border-top: 1px dashed">
        	<div class="row">
        		<div class="col-12 col-md-1 text-center align-self-center">
				<div class="row">
				    <div class="col-6 col-md-12 py-2 px-3 text-left" data-toggle="tooltip" title="No. Urut">
						<div class="nomor_urut btn btn-outline-light">
				            1
				        </div>
				    </div>
				    <div class="col-6 col-md-12  py-2 px-3 text-right hapus-data-kk" data-toggle="tooltip" title="Hapus">
				        <div class="btn btn-outline-light">
				            x
				        </div>
				    </div>
				</div>
				</div>
        		<div class="col-12 col-md-11">
        			<div class="row">
        				<div class="col-sm-6">
        					<input class="tk kedua" disabled placeholder="NIK..." name="nik_tk[]" >
        				</div>
        				<div class="col-sm-6">
        					<input class="tk kedua" disabled placeholder="Nama lengkap..." name="nama_tk[]" >
        				</div>
        			</div>
        			<div class="row mt-2">
        				<div class="col-sm-6">
        					<input class="tk kedua" disabled placeholder="Tempat lahir..." name="tempat_lahir_tk[]" >
        				</div>
        				<div class="col-sm-6">
        					<input class="tk kedua input_tanggalan" disabled placeholder="Tanggal pindah..." name="tanggal_lahir_tk[]" >
        				</div>
        			</div>
        			<div class="row mt-2">
        				<div class="col-sm-6">
        					<select class="tk kedua" name="jenis_kelamin_tk[]">
				              <option selected disabled value="dont">-Pilih-</option>
				              @foreach ( $jenis_kelamin as $key => $value )
				                <option value='{{ $key }}'>{{ $value }}</option>
				              @endforeach
				            </select>
        				</div>
        				<div class="col-sm-6">
        					<select class="tk kedua" name="status_tk[]">
				              <option selected disabled value="dont">-Pilih-</option>
				              @foreach ( $status_keluarga as $key => $value )
				                <option value='{{ $key }}'>{{ $value }}</option>
				              @endforeach
				            </select>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        @if( $kk_anggota )
        	@php( $num = 1 )
        	@foreach( $kk_anggota as $keys )
			    <div class="extraPerson" style="">
			      	<hr class="batas_extra" style="border-top: 1px dashed;">
			    	<div class="row">
			    		<div class="col-12 col-md-1 text-center align-self-center">
							<div class="row">
							    <div class="col-6 col-md-12 py-2 px-3 text-left" data-toggle="tooltip" title="" data-original-title="No. Urut">
									<div class="nomor_urut btn btn-outline-light">{{ $num }}</div>
							    </div>
							    <div class="col-6 col-md-12  py-2 px-3 text-right hapus-data-kk" data-toggle="tooltip" title="" data-original-title="Hapus">
							        <div class="btn btn-outline-light">
							            x
							        </div>
							    </div>
							</div>
						</div>
			    		<div class="col-12 col-md-11">
			    			<div class="row">
			    				<div class="col-sm-6">
			    					<input class="tk form-control kedua" placeholder="NIK..." name="nik_tk[]" value="{{ $keys['nik'] }}" onclick="this.className = 'form-control'">
			    				</div>
			    				<div class="col-sm-6">
			    					<input class="tk form-control kedua" placeholder="Nama lengkap..." name="nama_tk[]" value="{{ $keys['nama'] }}" onclick="this.className = 'form-control'">
			    				</div>
			    			</div>
			    			<div class="row mt-2">
			    				<div class="col-sm-6">
			    					<input class="tk form-control kedua" placeholder="Tempat lahir..." name="tempat_lahir_tk[]" value="{{ ( $keys['tempat']? $keys['tempat'] : $keys['tempat_lahir'] ) }}" onclick="this.className = 'form-control'">
			    				</div>
			    				<div class="col-sm-6">
			    					<input class="tk input_tanggalan form-control kedua" placeholder="Tanggal pindah..." name="tanggal_lahir_tk[]" value="{{ $keys['tanggal_lahir'] }}" onchange="this.className = 'form-control'">
			    				</div>
			    			</div>
			    			<div class="row mt-2">
			    				<div class="col-sm-6">
			    					<select class="tk form-control kedua select-option" name="jenis_kelamin_tk[]" onclick="this.className = 'form-control'">
						              <option selected disabled value="dont">-Pilih-</option>
						              @foreach ( $jenis_kelamin as $key => $value )
						                <option {{ ( isset( $keys['jenis_kelamin'] ) && $keys['jenis_kelamin'] == $key ? 'selected ' : '' ) }} value='{{ $key }}'>{{ $value }}</option>
						              @endforeach
						            </select>
			    				</div>
			    				<div class="col-sm-6">
			    					<select class="tk form-control kedua select-option" name="status_tk[]" onclick="this.className = 'form-control'">
						              <option selected disabled value="dont">-Pilih-</option>
						              @foreach ( $status_keluarga as $key => $value )
						                <option {{ ( isset( $keys['status'] ) && $keys['status'] == $key ? 'selected ' : '' ) }} value='{{ $key }}'>{{ $value }}</option>
						              @endforeach
						            </select>
			    				</div>
			    			</div>
			    		</div>
			    	</div>
			    </div>
        	@php( $num = $num + 1 )
        	@endforeach
        @endif

        <div id="container"></div>
        <div class="text-center mt-2"><a id="addRow" class="btn btn-outline-light">Tambah</a></div>
      </fieldset>

    <div class="row">
		<div class="col">
		keterangan:
			<p><textarea class="form-control kedua" placeholder="keterangan..." oninput="this.className = 'form-control'" style="width: 100%" name="keterangan">{{ ( isset( $data_meta['keterangan'] ) ? $data_meta['keterangan'] : '' ) }}</textarea></p>
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
