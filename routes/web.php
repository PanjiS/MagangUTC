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
//     return view('home');
// });
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');

Route::get('/pengelola/pengeloladosen', 'PengelolaController@getdatarekap_dosen');
Route::get('/pengelola/pengelolamatkul', 'PengelolaController@getdatarekap_matkul');

Route::get('/prodi/sipilprodi', 'MahasiswaController@getdata');
Route::get('/prodi/pbiprodi', 'MahasiswaController@getdatapbi');
// Route::get('/prodi/ipksipilprodi', 'MahasiswaController@ipk');
// Route::get('/prodi/ipkpbiprodi', 'MahasiswaController@ipkpbi');
// Route::get('/prodi', 'MahasiswaController@prodi');

//cari
