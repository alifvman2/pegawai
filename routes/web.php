<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');

    Route::get('/AddProv', 'App\Http\Controllers\ProvinsiController@add_prov')->name('add_prov');
    Route::post('/StoreProv', 'App\Http\Controllers\ProvinsiController@store_prov')->name('store_prov');
    Route::get('/ActiveProv', 'App\Http\Controllers\ProvinsiController@active_prov')->name('active_prov');
    Route::get('/DeleteProv', 'App\Http\Controllers\ProvinsiController@del_prov')->name('del_prov');
    Route::get('/EditProv', 'App\Http\Controllers\ProvinsiController@edit_prov')->name('edit_prov');
    Route::post('/UpdateProv', 'App\Http\Controllers\ProvinsiController@update_prov')->name('update_prov');

    Route::get('/Addkec', 'App\Http\Controllers\KecamatanController@add_kec')->name('add_kec');
    Route::post('/Storekec', 'App\Http\Controllers\KecamatanController@store_kec')->name('store_kec');
    Route::get('/Activekec', 'App\Http\Controllers\KecamatanController@active_kec')->name('active_kec');
    Route::get('/Deletekec', 'App\Http\Controllers\KecamatanController@del_kec')->name('del_kec');
    Route::get('/Editkec', 'App\Http\Controllers\KecamatanController@edit_kec')->name('edit_kec');
    Route::post('/Updatekec', 'App\Http\Controllers\KecamatanController@update_kec')->name('update_kec');

    Route::get('/Addkel', 'App\Http\Controllers\KelurahanController@add_kel')->name('add_kel');
    Route::get('/GetKec', 'App\Http\Controllers\KelurahanController@get_kec')->name('get_kec');
    Route::post('/Storekel', 'App\Http\Controllers\KelurahanController@store_kel')->name('store_kel');
    Route::get('/Activekel', 'App\Http\Controllers\KelurahanController@active_kel')->name('active_kel');
    Route::get('/Deletekel', 'App\Http\Controllers\KelurahanController@del_kel')->name('del_kel');
    Route::get('/Editkel', 'App\Http\Controllers\KelurahanController@edit_kel')->name('edit_kel');
    Route::post('/Updatekel', 'App\Http\Controllers\KelurahanController@update_kel')->name('update_kel');

    Route::get('/AddPegawai', 'App\Http\Controllers\PegawaiController@add_peg')->name('add_peg');
    Route::get('/GetKel', 'App\Http\Controllers\PegawaiController@get_kel')->name('get_kel');
    Route::post('/StorePegawai', 'App\Http\Controllers\PegawaiController@store_peg')->name('store_peg');
    Route::get('/ActivePegawai', 'App\Http\Controllers\PegawaiController@active_peg')->name('active_peg');
    Route::get('/DeletePegawai', 'App\Http\Controllers\PegawaiController@del_peg')->name('del_peg');
    Route::get('/EditPegawai', 'App\Http\Controllers\PegawaiController@edit_peg')->name('edit_peg');
    Route::post('/UpdatePegawai', 'App\Http\Controllers\PegawaiController@update_peg')->name('update_peg');