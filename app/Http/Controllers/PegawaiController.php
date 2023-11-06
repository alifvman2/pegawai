<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PegawaiController extends Controller
{

    public function add_peg(Request $request)
    {

        $data = DB::table('t_provinsi')
                ->get();

        return view('peg.add_peg')->with([
            'data'  => $data,
        ]);

    }

    public function get_kel(Request $request)
    {

        $data = DB::table('t_kelurahan')->where('id_kec', $request->id)->get();

        if ($data) {

            echo "<option selected disabled>Pilih Kelurahan</option>";
            foreach ($data as $key => $value) {
                echo "<option value='" . $value->id . "'>" . $value->name . "</option>";
            }
        } else {

            echo "<option selected disabled>Pilih Kelurahan</option>";
        }

    }

    public function store_peg(Request $request)
    {

        $data = [
            'name'          => $request->name,
            'tempat_lahir'  => $request->tempat_lahir,
            'tgl_lahir'     => $request->tgl_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama'         => $request->agama,
            'alamat'        => $request->alamat,
            'id_kel'        => $request->kelurahan,
        ];
        DB::table('t_pegawai')->insert($data);

        return redirect()->route('index');

    }

    public function del_peg(Request $request)
    {

        DB::table('t_pegawai')->where('id', $request->id)->delete();

    }

    public function edit_peg(Request $request)
    {

        $provinsi = DB::table('t_provinsi')->get();
        $kecamatan = DB::table('t_kecamatan')->get();
        $kelurahan = DB::table('t_kelurahan')->get();

        $data = DB::table('t_pegawai')
                ->join('t_kelurahan', 't_pegawai.id_kel', '=', 't_kelurahan.id')
                ->join('t_kecamatan', 't_kelurahan.id_kec', '=', 't_kecamatan.id')
                ->join('t_provinsi', 't_kecamatan.id_prov', '=', 't_provinsi.id')
                ->where('t_pegawai.id', $request->id)
                ->select('t_pegawai.*', 't_kelurahan.id as id_kel', 't_kecamatan.id as id_kec', 't_provinsi.id as id_prov')
                ->first();

        return view('peg.edit_peg')->with([
            'data'      => $data,
            'provinsi'  => $provinsi,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        ]);

    }

    public function update_peg(Request $request)
    {

        DB::table('t_pegawai')
            ->where('id', $request->id)
            ->update([
                'name'          => $request->name,
                'tempat_lahir'  => $request->tempat_lahir,
                'tgl_lahir'     => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama'         => $request->agama,
                'alamat'        => $request->alamat,
                'id_kel'        => $request->kelurahan,
            ]);

        return redirect()->route('index');

    }

}
