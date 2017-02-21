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

use Illuminate\Support\Facades\Auth;

use App\User;

Route::get('/', function () {
    return view('welcome');
});

/* RUTES DEL AUTH */
Auth::routes();

/* PORTADA HISTORIES */
Route::get('portada', [
    'uses' => 'HomeController@index',
    'as' => 'portada'
]);

/* USUARIS */
Route::group(['prefix' => 'usuaris', 'middleware' => ['auth']], function () {

    /* PDFs */
    Route::group(['prefix' => 'pdf'], function () {

        /* INDEX */
        Route::get('/', [
            'uses' => 'PdfController@index',
            'as' => 'usuaris.pdf',
        ]);

        /* COGNOMS ASCENDENTS */
        Route::get('/cog_asc', [
            'uses' => 'PdfController@cog_asc',
            'as' => 'cog_asc',
        ]);
        Route::get('/cog_asc_down', [
            'uses' => 'PdfController@cog_asc_down',
            'as' => 'cog_asc_down',
        ]);

        /* COGNOMS DESCENDENTS */
        Route::get('/cog_desc', [
            'uses' => 'PdfController@cog_desc',
            'as' => 'cog_desc',
        ]);
        Route::get('/cog_desc_down', [
            'uses' => 'PdfController@cog_desc_down',
            'as' => 'cog_desc_down',
        ]);

        /* DNI ASCENDENT */
        Route::get('/dni_asc', [
            'uses' => 'PdfController@dni_asc',
            'as' => 'dni_asc',
        ]);
        Route::get('/dni_asc_down', [
            'uses' => 'PdfController@dni_asc_down',
            'as' => 'dni_asc_down',
        ]);

        /* DNI DESCENDENT */
        Route::get('/dni_desc', [
            'uses' => 'PdfController@dni_desc',
            'as' => 'dni_desc',
        ]);
        Route::get('/dni_desc_down', [
            'uses' => 'PdfController@dni_desc_down',
            'as' => 'dni_desc_down',
        ]);

        /* POBLACIÓ ASCENDENT */
        Route::get('/pobl_asc', [
            'uses' => 'PdfController@pobl_asc',
            'as' => 'pobl_asc',
        ]);
        Route::get('/pobl_asc_down', [
            'uses' => 'PdfController@pobl_asc_down',
            'as' => 'pobl_asc_down',
        ]);

        /* POBLACIÓ DESCENDENT */
        Route::get('/pobl_desc', [
            'uses' => 'PdfController@pobl_desc',
            'as' => 'pobl_desc',
        ]);
        Route::get('/pobl_desc_down', [
            'uses' => 'PdfController@pobl_desc_down',
            'as' => 'pobl_desc_down',
        ]);
    });

    /* Usuaris */
    Route::resource('/', 'UsersController');

    Route::get('llistat', [
        'uses' => 'UsersController@llistat',
        'as' => 'usuaris.llistat'
    ]);

    Route::get('suggeriments', [
        'uses' => 'UsersController@enviarSuggeriments',
        'as' => 'usuaris.enviarSuggeriments'
    ]);

    Route::get('{id}/esborrar', [
        'uses' => 'UsersController@esborrar',
        'as' => 'usuaris.esborrar'
    ]);

    Route::get('{id}/editar', [
        'uses' => 'UsersController@editar',
        'as' => 'usuaris.editar'
    ]);

    Route::put('{id}/modificar', [
        'uses' => 'UsersController@modificar',
        'as' => 'usuaris.modificar'
    ]);

    Route::post('{id}/publicar', [
        'uses' => 'UsersController@publicar',
        'as' => 'usuaris.publicar'
    ]);

    Route::post('{id}/publicarSuggeriments', [
        'uses' => 'UsersController@publicarSuggeriments',
        'as' => 'usuaris.publicarSuggeriments'
    ]);

    Route::get('{id}', [
        'uses' => 'UsersController@perfil',
        'as' => 'usuaris.perfil'
    ]);

});

/* ADMINS */
Route::group(['prefix' => 'admins', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/', [
        'uses' => 'UsersController@llistatadmin',
        'as' => 'admin.llistat'
    ]);

    Route::get('taulerllistat', [
        'uses' => 'UsersController@taulerllistat',
        'as' => 'admin.taulerllistat'
    ]);

    Route::get('usuaris', [
        'uses' => 'UsersController@usuaris',
        'as' => 'admin.usuaris'
    ]);

    Route::get('suggeriments', [
        'uses' => 'UsersController@suggeriments',
        'as' => 'admin.suggeriments'
    ]);

    Route::get('tauler', [
        'uses' => 'UsersController@tauler',
        'as' => 'admin.tauler'
    ]);
    Route::get('historialpdf', [
        'uses' => 'UsersController@historialpdf',
        'as' => 'admin.historialpdf'
    ]);


    Route::get('{id}', [
        'uses' => 'UsersController@perfiladmin',
        'as' => 'admin.perfil'
    ]);

});

/* BUSCAR */

/*

Route::get('/pdf', function () {

    $users = App\User::orderBy('id','asc')->get(); // Retornem la vista ordenada per usuari ascendent.

    $pdf = PDF::loadView('pdf', ['users' => $users]);// Li passem la vista amb tots els usuaris
    return $pdf->stream('arxiu.pdf'); // Veiem el pdf en streaming
});*/