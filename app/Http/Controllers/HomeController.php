<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;


class HomeController extends Controller
{

    public function index()
    {

        $provinsi = DB::table('t_provinsi')
                    ->get();

        $kec = DB::table('t_kecamatan')
                    ->join('t_provinsi', 't_kecamatan.id_prov', '=', 't_provinsi.id')
                    ->select('t_kecamatan.*', 't_provinsi.name as provinsi')
                    ->get();

        $kel = DB::table('t_kelurahan')
                    ->join('t_kecamatan', 't_kelurahan.id_kec', '=', 't_kecamatan.id')
                    ->join('t_provinsi', 't_kecamatan.id_prov', '=', 't_provinsi.id')
                    ->select('t_kelurahan.*', 't_provinsi.name as provinsi', 't_kecamatan.name as kelurahan')
                    ->get();

        $pegawai = DB::table('t_pegawai')
                    ->join('t_kelurahan', 't_pegawai.id_kel', '=', 't_kelurahan.id')
                    ->join('t_kecamatan', 't_kelurahan.id_kec', '=', 't_kecamatan.id')
                    ->join('t_provinsi', 't_kecamatan.id_prov', '=', 't_provinsi.id')
                    ->select('t_pegawai.*', 't_provinsi.name as provinsi', 't_kecamatan.name as kelurahan', 't_kelurahan.name as kelurahan')
                    ->get();
                        
        return view('index')->with([
            'provinsi'  => $provinsi,
            'kec'       => $kec,
            'kel'       => $kel,
            'pegawai'   => $pegawai,
        ]);

    }

    // PROVINSI

    public function add_prov(Request $request)
    {

        return view('add_prov');

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

        return view('edit_prov')->with([
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

    // KELURAHAN

    public function add_kel(Request $request)
    {

        $data = DB::table('t_provinsi')
                ->get();

        return view('add_kel')->with([
            'data'  => $data,
        ]);

    }

    public function store_kel(Request $request)
    {

        $data = [
            'kode' => $request->kode,
            'name' => $request->name,
        ];
        DB::table('t_provinsi')->insert($data);

        return redirect()->route('index');

    }

    public function active_kel(Request $request)
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

    public function del_kel(Request $request)
    {

        DB::table('t_provinsi')->where('id', $request->id_prov)->delete();

    }

    public function edit_kel(Request $request)
    {

        $data = DB::table('t_provinsi')
                ->where('id', $request->id)
                ->first();

        return view('edit_prov')->with([
            'data' => $data,
        ]);

    }

    public function update_kel(Request $request)
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
