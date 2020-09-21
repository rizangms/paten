<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Usermeta;
use App\Crypt; 

class GuestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
	}

    public function list_user( $id = '' )
    {
        if ( $id != '' ) {
            $id = Crypt::decrypt( $id );
            $datas = User::get_users( $id );
            $id = Crypt::encrypt( $id );
        } else {
            $datas = User::get_users( $id );
        }

    	return view('admin.user-list', [ 'datas' => $datas, 'id' => $id ]);
    }

    public function save_user( Request $request )
    {
    	$id = $request->id;
    	if ( $id ) {
            $id = Crypt::decrypt( $id );
	    	User::find( $id )
	    	->update([ 
	    		'username' => $request->username,
	    		'name' => $request->nama,
	    		'email' => $request->email,
	    	]);

	    	if ( $request->new_password != '' || $request->new_password_confirm != '' ) {
				if( strcmp($request->new_password_confirm, $request->new_password) == 0 ){
					User::find($id)->update([ 'password' => bcrypt($request->new_password) ]);
				}
			}
    	} else {
    		if ( strcmp($request->new_password_confirm, $request->new_password) == 0 ) {
	    		User::create([
					'name' => $request->nama,
					'email' => $request->email,
					'username' => $request->username,
					'password' => bcrypt($request->new_password),
				]);
    		}
    	}

    	return redirect('/users');
    }

    public function del_user( $id = '' )
    {
        $id = Crypt::decrypt( $id );
    	User::find( $id )->delete();

    	return redirect('/users');
    }
}
