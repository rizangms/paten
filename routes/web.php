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

Route::get('/sid', function () {
	return view('sid');
});
Route::get('/sid/post', function () {
	return view('sid-post');
});

Auth::routes();

Route::get('/', 'LandingController@index');
Route::get('/artikel/{id}', 'LandingController@artikel');
Route::get('/ajukan-permohonan', 'LandingController@permohonan');
Route::post('/', 'LandingController@permohonan');
Route::post('/ajukan-permohonan', 'LandingController@permohonan_save');
Route::get('/ajukan-permohonan/{id}', 'LandingController@permohonan_detail');
Route::post('/kelengkapan-permohonan', 'LandingController@kelengkapan_save');
Route::post('/pengajuan', 'LandingController@pengajuan');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/permintaan', 'HomeController@permintaan');
Route::post('/permintaan', 'HomeController@permintaan_save');
Route::post('/tolak', 'HomeController@permintaan_tolak');

Route::get('/pengaturan', 'SettingController@index')->name('pengaturan');
Route::post('/pengaturan', 'SettingController@save');

Route::get('/users', 'UserController@list_user')->name('users');
Route::get('/users/edit/{id}', 'UserController@list_user');
Route::get('/users/del/{id}', 'UserController@del_user');
Route::post('/users/form', 'UserController@save_user');

Route::get('/json/data/', 'JsonController@data_tables');

Route::get('/pdf/{id}', 'PDFController@showPDF');
Route::get('/pdf/{id}/download', 'PDFController@downloadPDF');
Route::get('/pdf/{id}/show', 'PDFController@lihatPDF');

Route::get('/posts', 'PostController@show_post')->name('post');
Route::post('/posts', 'PostController@save_post');
Route::get('/posts/insert', 'PostController@insert_post');

Route::get('/posts/hapus/{id}', 'PostController@delete_post');

Route::group(['prefix' => 'posts'], function () {
    Route::get('lihat/{id}', 'PostController@show_post')->name('lihat');
    Route::get('edit/{id}', 'PostController@show_post')->name('edit');
});

// Route::group(['prefix' => 'user', 'middleware' => ['can:user']], function(){
// 	Route::get('/', 'UserController@index')->name('user.dasbor');
// 	Route::get('profil', 'UserController@profil')->name('user.profil');
// });

