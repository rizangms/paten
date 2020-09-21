@extends('layouts.pdf')

@section('content')
    
        <tr>
            <td colspan="2">
                <center>
                    <h2 style="margin: 0 1px "><u>SURAT KETERANGAN TIDAK MAMPU</u></h2>
                    <p>Nomor : {{ ( isset($data['nomor_surat']) ? $data['nomor_surat'] : '  -  ' ) }}</p>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="p">Yang bertanda tangan di bawah ini Kepala Kecamatan {{ $data['kecamatan'] }}, Kabupaten {{ $data['kabupaten'] }}, Provinsi {{ $data['provinsi'] }}. menerangkan dengan sebenarnya bahwa :</p>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding: 0 57px">
                <table id="khusus" width="100%">
                    <tr>
                        <td width="5%">1.</td>
                        <td width="30%">Nama Lengkap</td>
                        <td width="3%">:</td>
                        <td width="auto"><b>{{ $data['nama'] }}</b></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>NIK / No KTP</td>
                        <td>:</td>
                        <td>{{ $data['nik'] }}</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $data['tempat_lahir'] }} / {{ $data['tanggal_lahir'] }}</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ App\Variable::jenis_kelamin( $data['jenis_kelamin'] ) }}</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Kewarganegaraan</td>
                        <td>:</td>
                        <td>{{ App\Variable::warga_negara( $data['warga_negara'] ) }}</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ App\Variable::agama( $data['agama'] ) }}</td>
                    </tr>                    
                    <tr>
                        <td>7.</td>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{ $data['pekerjaan'] }}</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Alamat/Tempat  Tinggal</td>
                        <td>:</td>
                        <td>{{ $data['alamat'] }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td colspan="2"></td></tr>
        <tr>
            <td colspan="2">
                <p class="p">
                    Bahwa yang tersebut namanya diatas, sepanjang pengetahuan dan penelitian kami hingga saat dikeluarkannya surat keterangan ini memang benar Keluarga yang KURANG MAMPU dan tidak memiliki penghasilan tetap.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <p>
                        <b><u>DAFTAR TANGGUNGAN KELUARGA</u></b>
                    </p>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table class="anggota_kk" width="100%">
                    <tr>
                        <th scope="col" align="center" width="5%">No</th>
                        <th scope="col" align="center" width="20%">NIK</th>
                        <th scope="col" align="center" width="28%">Nama</th>
                        <th scope="col" align="center" width="15%">Jenis Kelamin</th>
                        <th scope="col" align="center" width="22%">Tempat, <br>Tanggal Lahir</th>
                        <th scope="col" align="center" width="10%">Status</th>
                    </tr>
                    @if( $data['kk_anggota'] )
                    @php( $num = 1 )
                    @foreach( $data['kk_anggota'] as $keys )
                    <tr>
                        <td align="center">{{ $num }}</td>
                        <td align="center">{{ $keys['nik'] }}</td>
                        <td>{{ $keys['nama'] }}</td>
                        <td align="center">{{ App\Variable::jenis_kelamin( $keys['jenis_kelamin'] ) }}</td>
                        <td>{{ ( $data['tempat'] ? $data['tempat'] : $data['tempat_lahir'] ) }}, <br>{{ $keys['tanggal_lahir'] }}</td>
                        <td align="center">{{ App\Variable::status_keluarga( $keys['status'] ) }}</td>
                    </tr>
                    @php( $num = $num + 1 )
                    @endforeach  
                    <tr>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;</td>
                    </tr>  
                    @else
                    <tr>
                        <td colspan="5" align="center" style="padding: 10px 0">-</td>
                    </tr> 
                    @endif               
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="p">
                    Surat Keterangan ini dibuat untuk Keperluan : <b>{{ $data['keperluan'] }}</b>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="p">
                    Demikian surat keterangan ini dibuat dengan sesungguhnya untuk dipergunakan sebagaimana mestinya.
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <td width="60%">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td width="40%">
                            @php( \Carbon\Carbon::setLocale('id') )
                            <center>
                                <p>{{ $data['kecamatan'] }} , {{ ( isset($data['tanggal_buat_surat']) ? $data['tanggal_buat_surat'] : Carbon\Carbon::now()->setTimezone('Asia/Jakarta')->format('d F Y') ) }}<br>
                                    Kepala Kecamatan {{ $data['kecamatan'] }}</p><br><br>
                                <p><u>{{ $data['nama_camat'] }}</u><br>
                                    NIP: {{ $data['nip_camat'] }}</p>
                            </center>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

    </table>
@endsection