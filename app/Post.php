<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';

    public $incrementing = false;

    protected $fillable = [
        'id', 'judul', 'subjudul', 'foto',
    ];

    public static function get_post( $id = '', $foto = false )
    {
        if ( $id ) {
            $datas = Post::where('id', '=', $id)->first();
        }
        else {
            $datas = Post::orderBy('created_at','desc')->paginate(6);
        }

        if ( $foto == true ) {
        	$datas = $datas->foto;
        } 

        return $datas;
    }
}
