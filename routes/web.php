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

Route::get('/', function () {
    return view('welcome');
});

    


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
// Route::get('/provinsi', [App\Http\Controllers\ProvinsiController::class, 'index'])->name('provinsi');

Route::get('tes', function(){
    return view('halo');
});

Route::get('test', function(){
    return view('layouts.master');
});

Route::group(['prefix' => 'admin', 'middleware'=>['auth']],
    function(){
        Route::get('/', function(){
            return view('layouts.master');
        });
});

// use App\Http\Controllers\ProvinsiController;
Route::resource('admin/provinsi', 'ProvinsiController');
Route::resource('admin/kota', 'KotaController');
Route::resource('admin/kecamatan', 'KecamatanController');
Route::resource('admin/kelurahan', 'KelurahanController');
Route::resource('admin/rw', 'RwController');
Route::resource('admin/tracking', 'TrackingController');