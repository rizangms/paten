<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Usermeta extends Model
{
    protected $table = 'usermeta';
	
	protected $fillable = [
		'id_user', 'meta_key', 'meta_value'
	];
	
	public static function updates( $id_user = '', $datas = array() ) {
		if ( !$id_user || !is_array($datas) || !count($datas) )
			return false;
		
		foreach( $datas as $meta_key=>$meta_value ) {
			if ( $data = Usermeta::where('id_user', $id_user)->where('meta_key', $meta_key)->exists() ) {
				if ( $meta_value ) {
					Usermeta::where('id_user', $id_user)->where('meta_key', $meta_key)->update([
						'meta_value' => $meta_value
					]);
				} else {
					Usermeta::where('id_user', $id_user)->where('meta_key', $meta_key)->delete();
				}
			} else {
				if ( $meta_value ) {
					Usermeta::create([
						'id_user' => $id_user,
						'meta_key' => $meta_key,
						'meta_value' => $meta_value
					]);
				}
			}
		}
	}
	
	public static function meta_valueue( $id_user = '', $meta_key = '' ) {
		if ( !$id_user || !$meta_key )
			return false;
		
		$data = Usermeta::where('id_user', $id_user)->where('meta_key', $meta_key)->select('meta_value')->first();
		return ( $data ? $data->meta_value : false );
	}
	
	public static function meta_valueues( $id_user = '', $meta_key = '' ) {
		if ( !$id_user || !$meta_key )
			return false;
		
		$datas = Usermeta::where('id_user', $id_user)->where('meta_key', $meta_key)->select('meta_value')->get();
		if ( !count($datas) )
			return false;
		
		$results = false;
		foreach( $datas as $data ) {
			$results[] = $data->meta_value;
		}
		
		return ( 1 > count($results) ? $results : reset($results) );
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

}
