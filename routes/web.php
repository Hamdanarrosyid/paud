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
Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth','guru']);
//});

Route::resource('kelamin','KelaminController')->middleware(['auth','guru']);
Route::resource('kota','KotaController')->middleware(['auth','guru']);
Route::resource('agama','AgamaController')->middleware(['auth']);
Route::resource('pendidikan','PendidikanController')->middleware(['auth','guru']);
Route::resource('pekerjaan','PekerjaanController')->middleware(['auth','guru']);
Route::resource('tahunajaran','TahunajaranController')->middleware('auth','guru');
Route::resource('kelas','KelasController')->middleware('auth','guru');
Route::resource('mapel','MapelController')->middleware('auth','guru');
Route::resource('role','RoleController')->middleware('auth','guru');

Route::resource('siswa','SiswaController')->middleware(['auth','guru']);
Route::get('siswa.export','SiswaController@exportpdf')->middleware(['auth','guru'])->name('exportpdf');
Route::get('siswa.html','SiswaController@tes')->middleware(['auth','guru']);

Route::get('user/create','Auth\RegisterController@showRegistrationForm')->middleware(['auth','guru'])->name('user.create');
Route::get('user','Auth\RegisterController@index')->middleware(['auth','guru'])->name('user');
Route::get('user/{user}','Auth\RegisterController@show')->middleware(['auth','guru'])->name('user.show');
Route::patch('user/{user}','Auth\RegisterController@update')->middleware(['auth','guru'])->name('user.update');
Route::delete('user/{user}','Auth\RegisterController@destroy')->middleware(['auth','guru'])->name('user.destroy');
Route::post('user', 'Auth\RegisterController@store')->middleware(['auth','guru'])->name('registerme');

//Route::post('register', 'Auth\RegisterController@register')->name('register.post');

Route::resource('walimurid','WalimuridController')->middleware(['auth','guru']);
Route::resource('guru','GuruController')->middleware(['auth','guru'])->only(['destroy','index','show','create','store','update']);
Route::delete('guru/cdelete/{guru}','GuruController@cdelete')->middleware(['auth','guru'])->name('guru.cdelete');
Route::resource('jadwal','JadwalController')->only('store','index','update','destroy')->middleware(['auth','guru']);
Route::get('jadwal/fetch','JadwalController@fetch')->name('jadwal.fetch')->middleware(['auth','guru']);
Route::resource('sarana','SaranaController')->middleware(['auth','guru']);
Route::resource('prasarana','PrasaranaController')->middleware(['auth','guru']);
Route::get('datadiri','ProfileController@index')->name('profile.index')->middleware(['auth','notguru']);
Route::patch('datadiri/{guru}','ProfileController@update')->name('profile.update')->middleware(['auth','notguru']);
