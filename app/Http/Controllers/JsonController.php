<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Permohonan;
use App\Permohonan_meta;
use App\User;
use App\Crypt;
use App\Variable;
use Carbon\Carbon;

class JsonController extends Controller
{
    public function __construct()
    {
    	/*
    		Hai... :)
    	*/
    }

    public function data_tables(Request $request)
    {
		$query = $request->query();
		if ( empty( $query ) || !isset( $query['get'] ) )
			return redirect('/home');
		
		$get = $query['get'];

		if ( isset( $query['data'] ) && $query['data'] )
			$id = $query['data'];
		else
			$id = '';

		$results = false;
		unset( $query['get'] );
		switch( $get ) {
			case 'jumlah':
				$pending = Permohonan::count_status( '9' );
				$sukses = Permohonan::count_status( '1' );
				$tolak = Permohonan::count_status( '2' );
				$semua = Permohonan::count_status();
				$results[] = array(
					'pending' => $pending,
					'sukses' => $sukses,
					'tolak' => $tolak,
					'semua' => $semua,
				);
				break;
			case 'permohonan':
				$get_data = Permohonan::get_status( $id );
				$i = 1;
            	foreach ($get_data as $key => $value) {	
            	    if( $value->status == 8 )
            	        continue;
            	        
					$results[] = array(
						'no' => $i,
						'id' => $value->id, 
						'nik' => $value->nik, 
						'nama' => $value->nama,
						'alamat' => $value->alamat,
						'jenis' => Variable::jenis_surat( $value->jenis ),
                        'status' => sprintf('<a href="%1$s" target="_blank" class="btn %2$s">%3$s</a>', ( $value->status == 1 ? url('/pdf/'.$value->id) : url('/permintaan?kode='.$value->id) ) , ( $value->status == 1 ? 'btn-success' : ( $value->status == 9 ? 'btn-warning' : 'btn-danger' ) ), Variable::status_proses( $value->status ) ),

					);
					$i++;
            	}
				break;
			case 'users':
				$get_data = User::get_users( $id );
				foreach ($get_data as $key => $value) {	
					$id_user = Crypt::encrypt( $value->id );
					$results[] = array(
						'id' => $id_user,
						'nama' => $value->name,
						'email' => $value->email, 
						'username' => $value->username,
						'aksi' => sprintf('<div class="btn-group btn-group-sm float-right pr-4" role="group"><a href="%1$s" class="btn btn-outline-success"><i class="ti-pencil"></i></a><a href="%3$s" class="btn btn-outline-danger" 
							onclick="del_user(this); return false;" data-id="%2$s"><i class="ti-trash"></i></a></div>', url("/users/edit/$id_user"), $id_user, url('/users/hapus') )
					);
            	}
            	break;
            case 'notify':
            	if ( $id == true ) {
            		Permohonan::where('notify', '=', 1)->update(['notify' => 0]);
            		$results = TRUE;
            	}
            	
            	$results = Permohonan::get_notify();
            	break;
            case 'notify_content':
            	$get_data = Permohonan::latest()->where('status', '!=', 8)->limit(3)->get();
            	$i = 1;
            	foreach ($get_data as $key => $value) {	
            	    if( $value->status == 8 )
            	        continue;
            	        
					$results[] = array(
						'notify' => ( $value->notify == 1 ? 'newmessage' : '' ),
						'alamat_link' =>  url('/permintaan?kode='.$value->id),
						'nama' => $value->nama,
						'jenis' => Variable::jenis_surat( $value->jenis ), 
						'tanggal' => $this->time_elapsed_string( $value->created_at ), 
						'alasan' => ( $value->alasan ? $value->alasan : '' ),
					);
					$i++;
            	}
            	break;
			default;
		}

		$results = array( 'data' => $results );
		echo json_encode( $results );
		exit;
    }

    private function time_elapsed_string($datetime, $full = false) {
	    $now = new DateTime;
	    $ago = new DateTime($datetime);
	    $diff = $now->diff($ago);

	    $diff->w = floor($diff->d / 7);
	    $diff->d -= $diff->w * 7;

	    $string = array(
	        'y' => 'tahun',
	        'm' => 'bulan',
	        'w' => 'minggu',
	        'd' => 'hari',
	        'h' => 'jam',
	        'i' => 'menit',
	        's' => 'detik',
	    );
	    foreach ($string as $k => &$v) {
	        if ($diff->$k) {
	            $v = $diff->$k . ' ' . $v;
	        } else {
	            unset($string[$k]);
	        }
	    }

	    if (!$full) $string = array_slice($string, 0, 1);
	    return $string ? implode(', ', $string) . ' yang lalu' : 'baru sekarang';
	}
}
