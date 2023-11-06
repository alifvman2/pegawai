<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KelurahanController extends Controller
{

    public function add_kel(Request $request)
    {

        $data = DB::table('t_provinsi')
                ->get();

        return view('kel.add_kel')->with([
            'data'  => $data,
        ]);

    }

    public function get_kec(Request $request)
    {

        $data = DB::table('t_kecamatan')->where('id_prov', $request->id)->get();

        if ($data) {

            echo "<option selected disabled>Pilih Kecamatan</option>";
            foreach ($data as $key => $value) {
                echo "<option value='" . $value->id . "'>" . $value->name . "</option>";
            }
        } else {

            echo "<option selected disabled>Pilih Kecamatan</option>";
        }

    }

    public function store_kel(Request $request)
    {

        $data = [
            'kode'      => $request->kode,
            'name'      => $request->name,
            'id_prov'   => $request->provinsi,
            'id_kec'    => $request->kecamatan,
        ];
        DB::table('t_kelurahan')->insert($data);

        return redirect()->route('index');

    }

    public function active_kel(Request $request)
    {

        $data = DB::table('t_kelurahan')
            ->where('id', $request->id)
            ->first();

        if ($data->active == 'active') {
            DB::table('t_kelurahan')
                ->where('id', $request->id)
                ->update([
                    'active' => null,
                ]);

        }else{
            DB::table('t_kelurahan')
                ->where('id', $request->id)
                ->update([
                    'active' => 'active',
                ]);


        }

    }

    public function del_kel(Request $request)
    {

        DB::table('t_kelurahan')->where('id', $request->id)->delete();

    }

    public function edit_kel(Request $request)
    {

        $provinsi = DB::table('t_provinsi')->get();

        $kecamatan = DB::table('t_kecamatan')->get();

        $data = DB::table('t_kelurahan')
                ->where('id', $request->id)
                ->first();

        return view('kel.edit_kel')->with([
            'data'      => $data,
            'provinsi'  => $provinsi,
            'kecamatan' => $kecamatan,
        ]);

    }

    public function update_kel(Request $request)
    {

        DB::table('t_kelurahan')
            ->where('id', $request->id)
            ->update([
                'kode'      => $request->kode,
                'name'      => $request->name,
                'id_prov'   => $request->provinsi,
                'id_kec'    => $request->kecamatan,
            ]);

        return redirect()->route('index');

    }

}
