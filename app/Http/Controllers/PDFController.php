<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat;
use App\Setting; 
use App\Permohonan_meta;
use PDF;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	dd('hai');
    }

    public function showPDF( $id = '' )
    {
    	if ( !$id )
    	    return false;

        $datas = Surat::get_surat( $id );
        $data = unserialize($datas->content);
        $tipe = strtolower(substr($id, 0, 1));
        // $pdf = \PDF::loadView("pdf.$tipe", [ 'data' => $data ])->setPaper([0,0,609.449, 935.433], 'portrait');
        $pdf = PDF::loadView("pdf.$tipe", [ 'data' => $data ])->setPaper('a4', 'potrait');
		return $pdf->stream("$id.pdf");
    }

    public function downloadPDF( $id = '' )
    {
        if ( !$id )
            return false;

        $datas = Surat::get_surat( $id );
        $data = unserialize($datas->content);
        $tipe = strtolower(substr($id, 0, 1));
        $pdf = \PDF::loadView("pdf.$tipe", [ 'data' => $data ])->setPaper('a4', 'portrait');
        return $pdf->download("$id.pdf");
    }

    public function lihatPDF( $id = '', Request $request )
    {
        if ( !$id )
            return false;

        $datas_meta = Permohonan_meta::get_permintaan( $id );
        $data_meta = unserialize( $datas_meta->meta_value );
        
        $setting = array();
        $settings = Setting::all();
        foreach ( $settings as $key => $value) {
            $setting[strtolower( str_replace( " ", "_", $value->meta_name ))] = $value->meta_value;
        }
        
        $data = array_merge( $setting, $data_meta );
        $tipe = strtolower(substr($id, 0, 1));

        if ( $request->raw )
            return view("pdf.$tipe", [ 'data' => $data ]);

        $pdf = \PDF::loadView("pdf.$tipe", [ 'data' => $data ])
            ->setPaper('a4', 'portrait')
            // ->setOptions(['debugLayout' => true])
            ;

        return $pdf->stream("$id.pdf", array("Attachment" => false));
        exit(0);
    }
}
