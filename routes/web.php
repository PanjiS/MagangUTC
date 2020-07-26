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

Route::get('/', 'HomeController@home');
Route::get('/home', 'HomeController@home');

Route::get('/pengelola', 'HomeController@pengelola');
Route::get('/pengelolamatkul', 'HomeController@pengelolamatkul');

Route::get('/prodi', 'MahasiswaController@getdata');
Route::get('/pbiprodi', 'MahasiswaController@getdatapbi');
Route::get('/ipkprodi', 'MahasiswaController@ipk');
// Route::get('/prodi', 'MahasiswaController@prodi');