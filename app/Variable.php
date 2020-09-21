<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variable extends Model
{
    public static function index()
    {
        dd('Hai');
    }

    public static function jenis_surat( $key = '' )
    {
        $data = array(
            'A' => 'Pengantar SKCK',
            'B' => 'Surat Pengantar Pindah Tempat',
            'C' => 'Surat Keterangan Tidak Mampu',
            'D' => 'Surat Keterangan Domisili',
            'E' => 'Surat Keterangan penduduk',
            'F' => 'Surat Izin Keramaian',
        );

        if ( !isset($data[$key]) )
            return $data;

        return $data[$key];
    }

    public static function status_proses( $key = '' )
    {
        $data = array(
            '1' => 'Disetujui',
            '2' => 'Di Tolak',
            '8' => 'Perlu diLengkapi',
            '9' => 'Di proses',
        );

        if ( !isset($data[$key]) )
            return $data;

        return $data[$key];
    }

    public static function jenis_kelamin( $key = '' )
    {
        $data = array(
            '1' => 'Laki-laki', 
            '2' => 'Perempuan',
        );
    	
    	if ( !isset($data[$key]) )
			return $data;

        return $data[$key];
    }

    public static function status_hubungan( $key = '' )
    {
        $data = array(
            '1' => 'Belum Menikah', 
            '2' => 'Menikah'
        );

        if ( !isset($data[$key]) )
			return $data;

        return $data[$key];
    }

    public static function status_keluarga( $key = '' )
    {
        $data = array(
            '1' => 'Suami', 
            '2' => 'Istri',
            '3' => 'Anak'
        );

        if ( !isset($data[$key]) )
            return $data;

        return $data[$key];
    }

    public static function pendidikan( $key = '' )
    {
        $data = array(
            '1' => 'TK', 
            '2' => 'SD', 
            '3' => 'SMP', 
            '4' => 'SMA', 
            '5' => 'S1', 
            '6' => 'S2'
        );

        if ( !isset($data[$key]) )
			return $data;

        return $data[$key];
    }

    public static function warga_negara( $key = '' )
    {
        $data = array(
            '1' => 'WNI', 
            '2' => 'Asing'
        );

        if ( !isset($data[$key]) )
			return $data;

        return $data[$key];
    }

    public static function agama( $key = '' )
    {
        $data = array(
            '1' => 'Islam', 
            '2' => 'Kristen Protestan',
            '3' => 'Katolik',
            '4' => 'Hindu',
            '5' => 'Buddha',
            '6' => 'Kong Hu Cu',
        );

        if ( !isset($data[$key]) )
			return $data;

        return $data[$key];
    }
}
