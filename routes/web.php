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

//Tampilan User
Route::get('/','App\Http\Controllers\ControllerHome@index');

//Login & Logout
Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::post('/login/check', 'App\Http\Controllers\LoginController@check');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout');


//Mid
Route::get('mid', 'App\Http\Controllers\Admin\MidController@index');
Route::get('/mid/tambah', 'App\Http\Controllers\Admin\MidController@tambah');
Route::post('/mid/prosest', 'App\Http\Controllers\Admin\MidController@prosest');
Route::get('/edit/{id}', 'App\Http\Controllers\Admin\MidController@edited');
Route::post('/mid/proses', 'App\Http\Controllers\Admin\MidController@update');
Route::get('/mid/dalete/{id}', 'App\Http\Controllers\Admin\MidController@dalete');

Route::group(['prefix' => '',  'namespace' => 'App\Http\Controllers\Admin'], function(){

    Route::group(['prefix' => 'admin'], function () {

        Route::get('/', 'DashboardController@index')->name('dasboard');

        //done
        Route::group(['prefix' => '/produk'], function () {

            Route::get('/', 'ProdukController@index')->name('produk');
            Route::get('/data', 'ProdukController@data')->name('produk.data');
            Route::post('/store', 'ProdukController@store')->name('produk.store');
            Route::get('/edit/{id}', 'ProdukController@edit')->name('produk.edit');
            Route::post('/update', 'ProdukController@update')->name('produk.update');
            Route::get('hapus/{id}', 'ProdukController@destroy')->name('produk.delete');
            Route::post('/cetak', 'ProdukController@cetakpdf')->name('produk.cetak');
        });

        //done
        Route::group(['prefix' => '/katagori'], function () {

            Route::get('/', 'KatagoriController@index')->name('katagori');
            Route::get('/data', 'KatagoriController@data')->name('katagori.data');
            Route::post('/store', 'KatagoriController@store')->name('katagori.store');
            Route::get('/edit/{id}', 'KatagoriController@edit')->name('katagori.edit');
            Route::post('/update', 'KatagoriController@update')->name('katagori.update');
            Route::get('/hapus/{id}', 'KatagoriController@destroy')->name('katagori.delete');
        });

        //-
        Route::group(['prefix' => '/berita'], function () {

            Route::get('/', 'BeritaController@index')->name('berita');
            Route::get('/data', 'BeritaController@data')->name('berita.data');
            Route::post('/store', 'BeritaController@store')->name('berita.store');
            Route::get('/edit/{id}', 'BeritaController@edit')->name('berita.edit');
            Route::post('/update', 'BeritaController@update')->name('berita.update');
            Route::get('/hapus/{id}', 'BeritaController@destroy')->name('berita.delete');
        });
        //-
        Route::group(['prefix' => '/user'], function () {

            Route::get('/', 'UserController@index')->name('user');
            Route::get('/data', 'UserController@data')->name('user.data');
            Route::post('/store', 'UserController@store')->name('user.store');
            Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
            Route::post('/update', 'UserController@update')->name('user.update');
            Route::get('/hapus/{id}', 'UserController@destroy')->name('user.delete');
        });
        //-
        Route::group(['prefix' => '/tanah'], function () {

            Route::get('/', 'TanahController@index')->name('tanah');
            Route::get('/data', 'TanahController@data')->name('tanah.data');
            Route::post('/store', 'TanahController@store')->name('tanah.store');
            Route::get('/edit/{id}', 'TanahController@edit')->name('tanah.edit');
            Route::post('/update', 'TanahController@update')->name('tanah.update');
            Route::get('/hapus/{id}', 'TanahController@destroy')->name('tanah.delete');
        });

    });

});