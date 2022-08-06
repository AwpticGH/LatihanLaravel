<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Kontak as Kontak;
use App\Http\Controllers\Files as Files;

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

Route::resource('kontak', Kontak::class);
Route::resource('/file', Files::class);
Route::get('/', function () {
    return view('index');
});
Route::get('/halaman-kedua', function() {
    return view('halamandua');
});
