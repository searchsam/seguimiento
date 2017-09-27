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

Route::view('/', 'auth.acceso', ['page_title' => 'Acceso'])->name('acceso');
Route::any('/errata', 'AdminController@fecha')->name('errata');

Route::prefix('autenticacion')->group(function () {
    // Autenticacion
    Route::view('acceso', 'auth.acceso', ['page_title' => 'Acceso'])->name('acceso');
    Route::post('acceder', 'Auth\LoginController@acceder')->name('acceder');
    Route::post('salir', 'Auth\LoginController@salir')->name('salir');
    Route::view('registro', 'auth.registro', ['page_title' => 'Registro'])->name('registro')->middleware('guest');
    Route::post('registrar', 'Auth\RegisterController@register')->name('registrar');
    Route::get('validar_confirmacion/{token}/{user}', 'Auth\RegisterController@confirmation')->name('validar_confirmacion');
});

Route::prefix('tablero')->group(function () {
    // Loggin User
    Route::get('inicio', 'DashController@index')->name('inicio');

    Route::prefix('estudiante')->group(function () {
        Route::get('registrar_curriculum', 'EstudianteController@registrar')->name('registrar_curriculum');
        Route::get('perfil', 'EstudianteController@registrar')->name('perfil');
    });

    Route::prefix('empresa')->group(function () {
        Route::get('registrar_entidad', 'EmpresaController@registrar')->name('registrar_entidad');
    });
});

Route::prefix('usuario')->group(function () {
    // Usuario
});

Route::prefix('admin')->group(function () {
    // Usuario
});

Route::prefix('error')->group(function () {
    // Errores
    Route::view('registro_confirmacion', 'errors.status')->name('registro_confirmacion');
    Route::view('verify_token', 'errors.verifytoken')->name('verify_token');
    Route::view('token_error', 'errors.tokenerror')->name('token_error');
});