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

Auth::routes();
Route::get('/', 'HomeController@index')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show/{regresi}', 'HomeController@show')->name('show');


//regresi route
Route::resource('/regresi', 'RegresiController');
Route::get('/regresi/{regresi}/delete', ['as'=> 'regresi.delete', 'uses'=> 'RegresiController@destroy']);

//regresi detail route
Route::resource('/detail', 'RegresiDetailController');
Route::get('/detail/{detail}/delete', ['as' => 'detail.delete', 'uses' => 'RegresiDetailController@destroy']);
Route::post('/detail/multi', ['as'=> 'detail.storemulti', 'uses'=>'RegresiDetailController@storemulti']);

// //alpha route
// Route::resource('/alpha', 'AlphaController');
// Route::get('/alpha/{alpha}/delete', ['as' => 'alpha.delete', 'uses' => 'AlphaController@destroy']);

// //tabel f route
// Route::resource('/tabelf', 'TabelFController');
// Route::get('/tabelf/{tabelf}/delete', ['as'=> 'tabelf.delete', 'uses'=>'TabelFController@destroy']);

//perhitungan route
Route::get('/perhitungan/{regresi}', ['as'=> 'perhitungan.show', 'uses'=>'PerhitunganController@show']);
Route::get('/perhitungan/table/{regresi}', ['as'=> 'perhitungan.showTable', 'uses'=>'PerhitunganController@showTable']);
Route::get('/perhitungan/{regresi}/exportdeskriptif', ['as'=>'perhitungan.export_deskriptif', 'uses'=>'PerhitunganController@export_deskriptif']);
Route::get('/perhitungan/{regresi}/exporttable', [
    'as'=>'perhitungan.export_table', 'uses'=>'PerhitunganController@export_table' 
]);

//analisis data
Route::get('/analisisdata', ['as' => 'analisisdata.index', 'uses'=>'AnalisisDataController@index']);
Route::get('/analisisdata/{regresi}', ['as' => 'analisisdata.show', 'uses'=>'AnalisisDataController@show']);

//Tutorial
Route::get('/tutorial', ['as' => 'tutorial.index',
'uses'=>'TutorialController@index']);

//Tentang Aplikasi
Route::get('/tentang', ['as'=> 'tentang.index',
'uses'=>'TentangController@index']);

//Google Auth

Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');