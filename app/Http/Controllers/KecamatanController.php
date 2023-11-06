<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KecamatanController extends Controller
{

    public function add_kec(Request $request)
    {

        $data = DB::table('t_provinsi')
                ->get();

        return view('kec.add_kec')->with([
            'data'  => $data,
        ]);

    }

    public function store_kec(Request $request)
    {

        $data = [
            'kode'      => $request->kode,
            'name'      => $request->name,
            'id_prov'   => $request->provinsi,
        ];
        DB::table('t_kecamatan')->insert($data);

        return redirect()->route('index');

    }

    public function active_kec(Request $request)
    {

        $data = DB::table('t_kecamatan')
            ->where('id', $request->id)
            ->first();

        if ($data->active == 'active') {
            DB::table('t_kecamatan')
                ->where('id', $request->id)
                ->update([
                    'active' => null,
                ]);

        }else{
            DB::table('t_kecamatan')
                ->where('id', $request->id)
                ->update([
                    'active' => 'active',
                ]);


        }

    }

    public function del_kec(Request $request)
    {

        DB::table('t_kecamatan')->where('id', $request->id)->delete();

    }

    public function edit_kec(Request $request)
    {

        $provinsi = DB::table('t_provinsi')->get();

        $data = DB::table('t_kecamatan')
                ->where('id', $request->id)
                ->first();

        return view('kec.edit_kec')->with([
            'data'      => $data,
            'provinsi'  => $provinsi,
        ]);

    }

    public function update_kec(Request $request)
    {

        DB::table('t_kecamatan')
            ->where('id', $request->id)
            ->update([
                'kode'      => $request->kode,
                'name'      => $request->name,
                'id_prov'   => $request->provinsi,
            ]);

        return redirect()->route('index');

    }

}
