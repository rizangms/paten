<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permohonan_meta extends Model
{
    protected $table = 'permohonan_meta';

    protected $fillable = [
        'id', 'id_permohonan', 'meta_name', 'meta_value'
    ];

    public function permohonan(){
        return $this->belongsTo(Permohonan::class);
    }

    public static function get_permintaan( $id = '', $key = '', $value = '' )
    {
        if ( !$id )
            return false;

        $datas = Permohonan_meta::select('id_permohonan', 'meta_value')->where('id_permohonan', '=', $id)->first();

        if ( $key ) {
            $datas = $datas->meta_value;
            $datas = unserialize( $datas );
            if ( $key == 'foto' && $value ) {
                $datas = ( isset( $datas['file_foto'][$key.'_'.$value] ) ? $datas['file_foto'][$key.'_'.$value] : '' ) ;
            } else if ( $key == 'data_kk' ) {
                $datas = ( isset( $datas['kk_anggota'] ) ? $datas['kk_anggota'] : '' ) ;
            }
        }

        return $datas;
    }
}
