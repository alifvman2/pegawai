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
    Route::get('/AddProv', 'App\Http\Controllers\HomeController@add_prov')->name('add_prov');
    Route::post('/StoreProv', 'App\Http\Controllers\HomeController@store_prov')->name('store_prov');
    Route::get('/ActiveProv', 'App\Http\Controllers\HomeController@active_prov')->name('active_prov');
    Route::get('/DeleteProv', 'App\Http\Controllers\HomeController@del_prov')->name('del_prov');
    Route::get('/EditProv', 'App\Http\Controllers\HomeController@edit_prov')->name('edit_prov');
    Route::post('/UpdateProv', 'App\Http\Controllers\HomeController@update_prov')->name('update_prov');

    Route::get('/Addkel', 'App\Http\Controllers\HomeController@add_kel')->name('add_kel');
    Route::post('/Storekel', 'App\Http\Controllers\HomeController@store_kel')->name('store_kel');
    Route::get('/Activekel', 'App\Http\Controllers\HomeController@active_kel')->name('active_kel');
    Route::get('/Deletekel', 'App\Http\Controllers\HomeController@del_kel')->name('del_kel');
    Route::get('/Editkel', 'App\Http\Controllers\HomeController@edit_kel')->name('edit_kel');
    Route::post('/Updatekel', 'App\Http\Controllers\HomeController@update_kel')->name('update_kel');