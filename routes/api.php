<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinsiController;
use App\Http\Controllers\Api\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
Route::get('indonesia', [ApiController::class, 'indonesia']);
Route::get('provinsis', [ApiController::class, 'provinsi']);
Route::get('kota', [ApiController::class, 'kota']);
Route::get('kecamatan', [ApiController::class, 'kecamatan']);
Route::get('kelurahan', [ApiController::class, 'kelurahan']);
Route::get('rws', [ApiController::class, 'rw']);
Route::get('global', [ApiController::class, 'global']);

Route::get('positif', [ApiController::class, 'positif']);
Route::get('sembuh', [ApiController::class, 'sembuh']);
Route::get('meninggal', [ApiController::class, 'meninggal']);

Route::get('/provinsi', [ProvinsiController::class , 'index']);
Route::post('/provinsi/store', [ProvinsiController::class, 'store']);
Route::get('/provinsi/{id}', [ProvinsiController::class, 'show']);
Route::post('/provinsi/update/{id}', [ProvinsiController::class, 'update']);
Route::delete('/provinsi/{id?}', [ProvinsiController::class, 'destroy']);