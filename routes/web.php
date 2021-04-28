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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('pengguna')->group(function () {

    Route::get('/senarai',['as'=>'/senarai/pengguna','uses'=>'Penggunacontroller@index']);
    Route::get('/tambah',['as'=>'/tambah/pengguna','uses'=>'Penggunacontroller@add']);
    Route::post('/store',['as'=>'/tambah/pengguna','uses'=>'Penggunacontroller@store']);
    Route::get('/edit/{id}',['as'=>'/maklumat','uses'=>'Penggunacontroller@edit']);
    Route::get('senarai/update/{id}',['as'=>'/kemaskini','uses'=>'Penggunacontroller@update
    ']);
});

Route::prefix('/failkes')->group(function () {

    Route::get('/senarai',['as'=>'/senarai/failkes','uses'=>'Failkescontroller@index']);
    Route::get('/tambah',['as'=>'/tambah/failkes','uses'=>'Failkescontroller@add']);
    Route::post('/store',['as'=>'/tambah/failkes','uses'=>'Failkescontroller@store']);

    
});

