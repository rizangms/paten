<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permohonan;
use App\Permohonan_meta;
use App\Setting;
use App\Surat;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dasbor');
    }

    public function permintaan( Request $request )
    {
        if ( !$request->kode ) {
            return redirect('/home');
        } else {
            $cek = Surat::get_surat( $request->kode );
            if ( $cek )
                return redirect("/pdf/$request->kode");
        }

        $id = $request->kode;
        $datas = Permohonan::get_permintaan( $id );

        // dd( $id, $datas, $datas_meta);

        return view('admin.permintaan', [ 'datas' => $datas,  'id' => $id ]);
    }

    public function permintaan_save(Request $request)
    {

        $id_surat = Permohonan::find($request->id)->kode;
        // $id_surat = $request->id;
        dd($id_surat);
        $content = array();
        foreach ($request->except('_token') as $key => $value) {
            if ( $key == 'tipe' || $key == 'id' )
                continue;

            $content[$key] = $value;
        }

        $datas_meta = Permohonan_meta::get_permintaan( $id_surat );
        $data_meta = unserialize( $datas_meta->meta_value );

        $setting = array();
        $datas = Setting::all();
        foreach ( $datas as $key => $value) {
            $setting[strtolower( str_replace( " ", "_", $value->meta_name ))] = $value->meta_value;
        }

        Permohonan::where('id', $id_surat)
        ->update([
            'status' => 1
        ]);
        
        Surat::create([
            'id_surat' => $id_surat,
            'content' => serialize( array_merge( $setting, $data_meta, $content ) )
        ]);

        return redirect("/pdf/$id_surat/download");
    }

    public function permintaan_tolak(Request $request)
    {
        $id_surat = $request->id;

        Permohonan::where('id', $id_surat)
        ->update([
            'status' => 2,
            'alasan' => $request->alasan,
        ]);

        return redirect("/home");
    }
}
