<?php

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

use Illuminate\Http\Resources\Json\Resource;

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');

//Route::group(['middleware' => ['web']], function () {
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
//});

Route::resource('kelamin','KelaminController')->middleware(['auth','can:admin.viewAny']);
Route::resource('kota','KotaController')->middleware(['auth','can:admin.viewAny']);
Route::resource('agama','AgamaController')->middleware(['auth','can:admin.viewAny']);
Route::resource('pendidikan','PendidikanController')->middleware(['auth','can:admin.viewAny']);
Route::resource('pekerjaan','PekerjaanController')->middleware(['auth','can:admin.viewAny']);
Route::resource('role','RoleController')->middleware('auth');

Route::resource('siswa','SiswaController')->middleware(['auth']);
Route::get('siswa.export','SiswaController@exportpdf')->middleware(['auth'])->name('exportpdf');
Route::get('siswa.html','SiswaController@tes')->middleware(['auth']);

Route::resource('walimurid','WalimuridController')->middleware(['auth']);
Route::resource('guru','GuruController')->middleware(['auth']);
Route::resource('jadwal','JadwalController')->only('store','index','update','destroy')->middleware(['auth']);
Route::get('jadwal/fetch','JadwalController@fetch')->name('jadwal.fetch')->middleware(['auth']);
Route::resource('sarana','SaranaController')->middleware(['auth','can:admin']);
Route::resource('prasarana','PrasaranaController')->middleware(['auth','can:admin']);
