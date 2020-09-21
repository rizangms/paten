<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = array();
        $datas = Setting::all();
        foreach ( $datas as $key => $value) {
            $data[strtolower( str_replace( " ", "_", $value->meta_name ))] = $value->meta_value;
        }
//        dd($data);
        return view('admin.pengaturan', [ 'data' => $data ]);
    }

    public function save(Request $request)
    {
        foreach ($request->except('_token') as $key=>$value)
        {
            Setting::where('meta_name', '=', str_replace('_', ' ', $key))
                ->update(['meta_value' => $value]);
        }
        return redirect('/pengaturan');
    }
}
