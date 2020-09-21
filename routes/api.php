<?php

use App\Http\Resources\Permohonan as PermohonanResources;
use App\Http\Resources\User as UserResources;
use App\Permohonan;
use App\User;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/permohonan', function (Request $request) {
    $data = Permohonan::all();
    return new PermohonanResources($data);
});
Route::get('/permohonan/{status}', function ($status) {
    // $status = $request->input('status');
    $data = Permohonan::where('status', $status)->get();
    return new PermohonanResources($data);
});

Route::get('/user', function (Request $request) {
    $data = User::all();
    return new UserResources($data);
});
// Route::get('/user/{id}', function(Request $request) {
    
//     $data = User::find(1);
//     return new UserResources($data);
// });