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
                    ->select('t_kelurahan.*', 't_provinsi.name as provinsi', 't_kecamatan.name as kecamatan')
                    ->get();

        $pegawai = DB::table('t_pegawai')
                    ->join('t_kelurahan', 't_pegawai.id_kel', '=', 't_kelurahan.id')
                    ->join('t_kecamatan', 't_kelurahan.id_kec', '=', 't_kecamatan.id')
                    ->join('t_provinsi', 't_kecamatan.id_prov', '=', 't_provinsi.id')
                    ->select('t_pegawai.*', 't_provinsi.name as provinsi', 't_kecamatan.name as kecamatan', 't_kelurahan.name as kelurahan')
                    ->get();
                        
        return view('index')->with([
            'provinsi'  => $provinsi,
            'kec'       => $kec,
            'kel'       => $kel,
            'pegawai'   => $pegawai,
        ]);

    }

}
