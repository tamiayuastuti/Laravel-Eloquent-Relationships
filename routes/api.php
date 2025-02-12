<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    //Middleware auth:sanctum memastikan bahwa hanya pengguna yang sudah login dengan token yang valid yang bisa mengakses route ini.
    //Route ini menangani request GET ke /user.
    //Parameter $request berisi data dari request API.
    //Mengembalikan data pengguna yang sedang login dalam format JSON.
    //Data ini diambil dari Sanctum Authentication yang menyimpan informasi pengguna yang sudah login.

});
