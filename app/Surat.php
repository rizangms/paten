<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    public $timestamps = false;

    protected $table = 'surat';

    protected $fillable = [
        'id', 'id_surat', 'content'
    ];

    public static function get_surat( $id = '' )
    {
        if ( !$id )
            return false;

        $datas = Surat::select('content')->where('id_surat', '=', $id)->first();

        return $datas;
    }
}
