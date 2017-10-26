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

// Home
Route::get('/', 'HomeController@index');

// Berita
Route::get( '/berita', 'BeritaController@show_all');
Route::get( '/berita/{id}', 'BeritaController@show');

// Auth
Auth::routes();

// Admin
Route::middleware(['auth'])->group(function () {
	Route::get('/admin', 'AdminController@index');

	// Album
	Route::get('/admin/album', 'AlbumController@index');
	Route::get('/admin/album/create', 'AlbumController@create');

	// Berita
	Route::get('/admin/berita', 'BeritaController@index');
	Route::get('/admin/berita/create', 'BeritaController@create');
	Route::post('/admin/berita/store', 'BeritaController@store');
	Route::get('/admin/berita/{id}', 'BeritaController@edit');
	Route::patch('/admin/berita/{id}/update', 'BeritaController@update');
	Route::delete('/admin/berita/{id}/delete', 'BeritaController@delete');

	Route::get('/elfinder/template/{param?}', function($param) {
        Session::forget('dir');
        Session::put('dir', ['uploads/format']);
        $t = new \Barryvdh\Elfinder\ElfinderController(App::getInstance());
        return $t->showPopup($param);
    });
    
    Route::get('/elfinder/filemanager/{any?}', function($param) {
        Session::forget('dir');
        Session::put('dir', ['uploads/info']);
        $t = new \Barryvdh\Elfinder\ElfinderController(App::getInstance());
        return $t->showPopup($param);
    });
    
    Route::get('/fix', function() {
        $pendaftar = \App\PesertaSkripsi::all();
        foreach($pendaftar as $row) {
            $row->nama_lengkap = strtoupper($row->nama_lengkap);
            $row->save();
        }
    });
});