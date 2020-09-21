@extends('layouts.pdf')

@section('content')
            <tr>
            <td colspan="2">
                <center>
                    <h2 style="margin: 0 1px "><u>SURAT PENGANTAR PENDUDUK</u></h2>
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
                        <td width="auto">{{ $data['nama'] }}</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td>{{ $data['tempat_lahir'] }} / {{ $data['tanggal_lahir'] }}</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Kewarganegaraan</td>
                        <td>:</td>
                        <td>{{ App\Variable::warga_negara( $data['warga_negara'] ) }}</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Agama</td>
                        <td>:</td>
                        <td>{{ App\Variable::agama( $data['agama'] ) }}</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>{{ App\Variable::jenis_kelamin( $data['jenis_kelamin'] ) }}</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td>{{ $data['pekerjaan'] }}</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Alamat/Tempat Tinggal</td>
                        <td>:</td>
                        <td>{{ $data['alamat'] }}</td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td colspan="3">
                            Surat bukti diri
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>KTP</td>
                        <td>:</td>
                        <td>{{ $data['nik'] }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>KK</td>
                        <td>:</td>
                        <td>{{ $data['kk'] }}</td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Keperluan</td>
                        <td>:</td>
                        <td>{{ $data['keperluan'] }}</td>
                    </tr>
                </table>
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
                        <td width="40%">
                            <center>
                                <p>Pemegang Surat</p><br><br><br>
                                <p>{{ $data['nama'] }}</p>
                            </center>
                        </td>
                        <td width="20%">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
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