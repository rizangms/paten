<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Permohonan;
use App\Permohonan_meta;
use App\Crypt;
use App\Post;
use Hash; 
use File;
use Auth;

class LandingController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->get();

        if ( !$posts ) {
            $posts = '';
        }
        return view('landing.welcome', [ 'class' => 'index', 'posts' => $posts ]);
    }

    public function artikel( $id = '' )
    {
        if( !$id )
            return redirect()->back();

        $post = Post::get_post( $id );

        return view('landing.artikel', [ 'post' => $post ]);
    }

    public function permohonan(Request $request)
    {
        $data = '';

        if ( $request->kode ) {
            $id = $request->kode;
            $data = Permohonan::find($id);
            $data_meta = Permohonan_meta::get_permintaan($id);
        }

        if( !$data ) {
            $id = '';
            $data_meta = '';
            if ( $request->cek ) {
                return redirect()->back()->with('notfound', true);
            }
        }

        return view('landing.permohonan', [ 'id' => $id, 'data' => $data, 'data_meta' => $data_meta ]);
        
    }

    public function show_form( $form ='' , $id ='' ){
        $data_meta = '';
        $status = '';
        $form = strtolower( $form );
        if ( $id ) {
            $status = Permohonan::find($id);
            $status = ( $status->status ? $status->status : '' );
            $data_meta = Permohonan_meta::get_permintaan($id);
        }

        return view('form.'.$form, [ 'idx' => $id, 'data_meta' => $data_meta, 'status' => $status ]);
    }

    public function pengajuan( Request $request ) {
        // dd($request->except('_token'));
        $id = $request->id;
        $jenis = $request->jenis_p;
        $lengkap = false;
        $lengkap_rate = array();

        // dd($nama_tk);

        if ( !$id ) {
            $digits = 5;
            $j = 1;
            for ($i=0; $i < $j ; $i++) { 

                $numb = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
                $id = $jenis.$numb;
                $cek = Permohonan::find($id);

                if ( $cek ) {
                    $j++;
                }
            }
        }

        $content = array();
        $kk_anggota = array();
        $foto = array();
        $foto_nama = array();

        for ($i=0; $i < count($request->nik_tk) ; $i++) { 
            $kk_anggota[$i]['nik'] = ( $request->nik_tk[$i] ? $request->nik_tk[$i] : '' );
            $kk_anggota[$i]['nama'] = ( $request->nama_tk[$i] ? $request->nama_tk[$i] : '' );
            $kk_anggota[$i]['jenis_kelamin'] = ( $request->jenis_kelamin_tk[$i] ? $request->jenis_kelamin_tk[$i] : '' );
            $kk_anggota[$i]['tempat_lahir'] = ( $request->tempat_lahir_tk[$i] ? $request->tempat_lahir_tk[$i] : '' );
            $kk_anggota[$i]['tanggal_lahir'] = ( $request->tanggal_lahir_tk[$i] ? $request->tanggal_lahir_tk[$i] : '' );
            $kk_anggota[$i]['status'] = ( $request->status_tk[$i] ? $request->status_tk[$i] : '' );
        }

        foreach ($request->except('_token') as $key => $value) {
            if ( $key == 'tipe' || $key == 'id' || $key == 'status' || strpos($key, '_tk') !== false || strpos($key, '_p') !== false ) {
                continue;
            } else if ( strpos($key, 'foto_') !== false ) {
                if ( strpos($key, 'foto_control_') !== false ) {
                    $nama = str_replace( 'foto_control_', '', $key );
                    $foto_nama[] = $nama;
                }
                $foto[$key] = $value;
                continue; 
            }
            $content[$key] = $value;
        }

        if ( $kk_anggota && !empty( array_filter( $kk_anggota[0] ) ) )
            $content['kk_anggota'] = $kk_anggota;
        
        $datas = $content;

        // dd( $foto['foto_control_'.$tes]);
        
        // dd( $id, $content, $foto_nama, $foto, $request->tipe );

        if ( $request->tipe == 'tambah' ) {
            $file_foto = array();
            foreach ($foto_nama as $key => $value) {
                if ( isset( $foto['foto_'.$value] ) != '' ) {
                    $file = $request->file('foto_'.$value);
                    $hasil = $this->insert_file( $id, $file, $value, $jenis );
                    // $hasil = $file->getClientOriginalName();
                    $file_foto['foto_'.$value] = $hasil;
                    $lengkap_rate[] = 'true';
                } else {
                    $lengkap_rate[] = 'false';
                }
            }

            if ( !empty( array_filter( $file_foto ) ) ) {
                $datas['file_foto'] = $file_foto;
            }

            if( in_array( "false", $lengkap_rate ) ){
                $lengkap = false;
            } else {
                $lengkap = true;
            }

            // dd( $datas );
            
            Permohonan::create([
                'id' => $id,
                'nama' => $request->nama_p,
                'nik' => $request->nik_p,
                'alamat' => $request->alamat_p,
                'no_hp' => $request->no_hp,
                'jenis' => $jenis,
                'status' => ( $lengkap == true ? '9' : '8' ),
                'notify' => ( $lengkap == true ? '1' : '0' ),
            ]);

            Permohonan_meta::create([
                'id_permohonan' => $id,
                'meta_name' => 'content',
                'meta_value' => serialize($datas),
            ]);

            if ( $lengkap == true ) {
                return redirect('/ajukan-permohonan?kode='.$id)->with( 'notif', 'Kode permohonan anda ' . $id )->with( 'notif2', 'Silahkan simpan kode anda untuk melihat status permohonan' );
            } else {
                return redirect('/ajukan-permohonan?kode='.$id)->with( 'notif', 'Kode permohonan anda ' . $id )->with( 'notif2', 'Formulir akan dikirimkan ke admin jika semua sudah lengkap');
            }

        } else if ( $request->tipe == 'edit' ) {
            $file_foto = array();
            foreach ($foto_nama as $key => $value) {
                $exists_foto = Permohonan_meta::get_permintaan( $id, 'foto', $value);
                if ( isset( $foto['foto_'.$value] ) != '' ) {
                    $file = $request->file('foto_'.$value);
                    $file_name = $file->getClientOriginalName();
                    $file_name_upload = $id . '_' . $value . '_' . $file_name;

                    if ( $file_name_upload != $exists_foto ) {
                        if ( $exists_foto != '' )
                            File::delete( public_path(). '/uploads/' . $jenis . '/' . $exists_foto );

                        $hasil = $this->insert_file( $id, $file, $value, $jenis );
                        $file_foto['foto_'.$value] = $hasil;
                    } 
                    $lengkap_rate[] = 'true';
                } else {
                    if ( $exists_foto != '' ) {
                        if ( $foto['foto_control_'.$value] != $exists_foto ) {
                            File::delete( public_path(). '/uploads/' . $jenis . '/' . $exists_foto );
                            $lengkap_rate[] = 'false';
                        } else {
                            $file_foto['foto_'.$value] = $exists_foto;
                            $lengkap_rate[] = 'true';
                        }
                    } else {
                        $lengkap_rate[] = 'false';
                    }
                }
            }

            if ( !empty( array_filter( $file_foto ) ) ) {
                $datas['file_foto'] = $file_foto;
            }

            if( in_array( "false", $lengkap_rate ) ){
                $lengkap = false;
            } else {
                $lengkap = true;
            }

            // dd( $datas );
            if ( $request->status == '2' ) {
                Permohonan::find( $id )->delete();
                
                Permohonan::create([
                    'id' => $id,
                    'nama' => $request->nama_p,
                    'nik' => $request->nik_p,
                    'alamat' => $request->alamat_p,
                    'no_hp' => $request->no_hp,
                    'jenis' => $jenis,
                    'status' => ( $lengkap == true ? '9' : '8' ),
                    'notify' => ( $lengkap == true ? '1' : '0' ),
                    'alasan' => 'revisi',
                ]);
            } else {
                Permohonan::where('id', $id)
                ->update([
                    'status' => ( $lengkap == true ? '9' : '8' ),
                    'notify' => ( $lengkap == true ? '1' : '0' ),
                ]);
            }

            Permohonan_meta::where('id_permohonan', $id)
            ->update([
                'meta_value' => serialize($datas)
            ]);

            if ( $lengkap == true ) {
                return redirect('/ajukan-permohonan?kode='.$id);
            } else {
                return redirect('/ajukan-permohonan?kode='.$id)->with( 'notif', 'Lengkapi formulir!' )->with( 'notif2', 'Formulir akan dikirimkan ke admin jika semua sudah lengkap');
            }
        }
    }

    //upload file
    private function insert_file( $id, $file, $value, $jenis ) {
        $file_name = $file->getClientOriginalName();
        $file_name_upload = $id . '_' . $value . '_' . $file_name;
        $file->move( 'uploads/' . $jenis . '/', $file_name_upload );
        // $set_height = 750;
        // $set_width = 750;
        // $image = Image::make( 'uploads/' . $jenis . '/' . $file_name_upload );
        // $img_width = $image->width();
        // $img_height = $image->height();
        // $width = ( $img_width >= $img_height ? $set_height : null );
        // $height = ( $img_width <= $img_height ? $set_width : null );
        // $image->resize($width, $height, function($constraint) {
        //     $constraint->aspectRatio();
        // });

        // if ( $width != $height )
        //     $image->resizeCanvas($set_width, $set_height, 'center', false, '#ffffff');

        // $image->save();

        return $file_name_upload;
    }
}
