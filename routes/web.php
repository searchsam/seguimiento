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

Route::any('/', 'Auth\LoginController@acceso')->name('acceso');
Route::any('/errata', 'AdminController@fecha')->name('errata');

Route::prefix('autenticacion')->group(function () {
    // Autenticacion
    Route::post('acceder', 'Auth\LoginController@acceder')->name('acceder');
    Route::post('salir', 'Auth\LoginController@salir')->name('salir');
    Route::view('registro', 'auth.registro')->name('registro')->middleware('guest');
    Route::post('registrar', 'Auth\LoginController@registrar')->name('registrar');
});

Route::prefix('tablero')->group(function () {
    // Admin
    Route::get('inicio', 'DashController@index')->name('inicio');
});

Route::prefix('usuario')->group(function () {
    // Usuario
});

Route::prefix('admin')->group(function () {
    // Usuario
});
