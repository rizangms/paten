<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    protected $table = 'permohonan';

    public $incrementing = false;

    protected $fillable = [
        'id', 'nama', 'nik', 'alamat', 'no_hp', 'jenis', 'status', 'notify', 'alasan',
    ];

    protected $hidden = ["created_at", "updated_at"];

    public static function count_status( $id = '' )
    {
        if ( $id )
            $datas = DB::table('permohonan')
        	->where('status', '=', $id)
        	->count();
        else
            $datas = DB::table('permohonan')
            ->where('status', '!=', 8)
            ->count();

        return $datas;
    }

    public static function get_status( $id = '' )
    {
        if ( $id )
            $datas = DB::table('permohonan')
            ->where('status', '=', $id)
            ->get();
        else
            $datas = DB::table('permohonan')
            ->orderBy('created_at','desc')
            ->get();

        return $datas;
    }

    public static function get_permintaan( $id = '' )
    {
        if ( !$id )
            return false;

        $datas = DB::table('permohonan')
            ->select('id', 'nama', 'nik', 'alamat', 'jenis', 'status')
            ->where('id', '=', $id)
            ->first();

        return $datas;
    }

    public static function get_notify()
    {
        $datas = DB::table('permohonan')
            ->where('notify', '=', 1)
            ->where('status', '!=', 8)
            ->count();

        return $datas;
    }
}
