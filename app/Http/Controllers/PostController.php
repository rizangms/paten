<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Route;
use File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_post( $id = '' )
    {
    	$datas = Post::get_post( $id );
        // dd($datas);
        if ( $id != '' ){
            $aksi = Route::currentRouteName();
        	return view( 'admin.post-form', [ 'datas' => $datas, 'aksi' => $aksi ] );
        }

        return view( 'admin.post-list', [ 'datas' => $datas] );
    }

    public function insert_post( $id = '' )
    {


        return view( 'admin.post-form' );
    }

    public function save_post( Request $request )
    {
        $id = $request->id;

        if ( !$id ) {
            $digits = 5;
            $j = 1;
            for ($i=0; $i < $j ; $i++) { 

                $id = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                $cek = Post::find($id);

                if ( $cek ) {
                    $j++;
                }
            }
        }

        if( $request->tipe == 'tambah' ){
            $file = $request->file('foto_post');
            $file_name = $file->getClientOriginalName();
            $file_name_save = $id.' - '.$file_name;
            $file->move( 'uploads/posts/', $file_name_save );

            Post::create([
                'id' => $id,
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'foto' => $file_name_save,
            ]);
        } elseif ( $request->tipe == 'edit' ) {

            $exists_foto = post::get_post( $id, 'foto' );
            if ( $request->file('foto_post') != '' ) {
                $file = $request->file('foto_post');
                $file_name = $file->getClientOriginalName();
                $file_name_save = $id.' - '.$file_name;
                if ( $file_name_save != $exists_foto ) {
                    if ( $exists_foto != '' )
                        File::delete( public_path(). '/uploads/posts/'. $exists_foto );
                      
                    $file->move( 'uploads/posts/', $file_name_save );
                }
            } else {
                if ( $request->foto_post_control != $exists_foto ) {
                    File::delete( public_path(). '/uploads/posts/'. $exists_foto );
                    $file_name_save = '';
                } else {
                    $file_name_save = $request->foto_post_control;
                }
            }

            Post::where( 'id', $id )
            ->update([
                'judul' => $request->judul,
                'subjudul' => $request->subjudul,
                'foto' => $file_name_save,
            ]);
        }

        return redirect('/posts');
    }

    public function delete_post( $id = '' )
    {
        if ( $id ) {
            $exists_foto = post::get_post( $id, 'foto' );
            if ( $exists_foto != '' )
                File::delete( public_path(). '/uploads/posts/'. $exists_foto );

            $post = Post::find( $id );
            $post->delete();
        }

        return redirect('/posts');
    }
}
