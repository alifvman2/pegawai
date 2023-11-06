<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ProvinsiController extends Controller
{

    public function add_prov(Request $request)
    {

        return view('prov.add_prov');

    }

    public function store_prov(Request $request)
    {

        $data = [
            'kode' => $request->kode,
            'name' => $request->name,
        ];
        DB::table('t_provinsi')->insert($data);

        return redirect()->route('index');

    }

    public function active_prov(Request $request)
    {

        $data = DB::table('t_provinsi')
            ->where('id', $request->id_prov)
            ->first();

        if ($data->active == 'active') {
            DB::table('t_provinsi')
                ->where('id', $request->id_prov)
                ->update([
                    'active' => null,
                ]);

        }else{
            DB::table('t_provinsi')
                ->where('id', $request->id_prov)
                ->update([
                    'active' => 'active',
                ]);


        }

    }

    public function del_prov(Request $request)
    {

        DB::table('t_provinsi')->where('id', $request->id_prov)->delete();

    }

    public function edit_prov(Request $request)
    {

        $data = DB::table('t_provinsi')
                ->where('id', $request->id)
                ->first();

        return view('prov.edit_prov')->with([
            'data' => $data,
        ]);

    }

    public function update_prov(Request $request)
    {

        DB::table('t_provinsi')
            ->where('id', $request->id)
            ->update([
                'kode'  => $request->kode,
                'name'  => $request->name,
            ]);

        return redirect()->route('index');

    }
}
