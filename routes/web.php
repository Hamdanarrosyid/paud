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

Route::resource('kelamin','KelaminController')->middleware(['auth']);
Route::resource('kota','KotaController')->middleware(['auth']);
Route::resource('agama','AgamaController')->middleware(['auth']);
Route::resource('pendidikan','PendidikanController')->middleware(['auth']);
Route::resource('pekerjaan','PekerjaanController')->middleware(['auth']);
Route::resource('role','RoleController')->middleware('auth');

Route::resource('siswa','SiswaController')->middleware(['auth']);
Route::get('siswa.export','SiswaController@exportpdf')->middleware(['auth'])->name('exportpdf');
Route::get('siswa.html','SiswaController@tes')->middleware(['auth']);

Route::get('user/create','Auth\RegisterController@showRegistrationForm')->middleware(['auth'])->name('user.create');
Route::get('user','Auth\RegisterController@index')->middleware(['auth'])->name('user');
Route::get('user/{user}','Auth\RegisterController@show')->middleware(['auth'])->name('user.show');
Route::patch('user/{user}','Auth\RegisterController@update')->middleware(['auth'])->name('user.update');
Route::delete('user/{user}','Auth\RegisterController@destroy')->middleware(['auth'])->name('user.destroy');
Route::post('user', 'Auth\RegisterController@store')->middleware(['auth'])->name('registerme');

//Route::post('register', 'Auth\RegisterController@register')->name('register.post');

Route::resource('walimurid','WalimuridController')->middleware(['auth']);
Route::resource('guru','GuruController')->middleware(['auth']);
Route::resource('jadwal','JadwalController')->only('store','index','update','destroy')->middleware(['auth']);
Route::get('jadwal/fetch','JadwalController@fetch')->name('jadwal.fetch')->middleware(['auth']);
Route::resource('sarana','SaranaController')->middleware(['auth']);
Route::resource('prasarana','PrasaranaController')->middleware(['auth']);
