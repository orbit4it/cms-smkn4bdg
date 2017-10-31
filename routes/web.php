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

// Halaman
Route::get('/info/{id}', 'HalamanController@show');

// Berita
Route::get('/berita', 'BeritaController@show_all');
Route::get('/berita/{id}', 'BeritaController@show');

// Program Studi
Route::get('/program-studi/{id}', function($id='') {
	$view = 'studi.' . $id;
	if(view()->exists($view)){
	    return view($view)->render();
	}
	return view('home.404');
});

// Ekstrakurikuler
Route::get('/ekstrakurikuler/{id}', function($id='') {
	$view = 'ekskul.' . $id;
	if(view()->exists($view)){
	    return view($view)->render();
	}
	return view('home.404');
});

// Auth
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

// Admin
Route::middleware(['auth'])->group(function () {
	Route::get('/admin', 'AdminController@index');

	// Album & Galeri
	Route::get('/admin/album', 'AlbumController@index');
	Route::get('/admin/album/create', 'AlbumController@create');
	Route::post('/admin/album/store', 'AlbumController@store');
	Route::get('/admin/album/{id}', 'AlbumController@edit');
	Route::patch('/admin/album/{id}/update', 'AlbumController@update');
	Route::delete('/admin/album/{id}/delete', 'AlbumController@delete');
	Route::get('/admin/album/{id}/galeri', 'AlbumController@galeri');
	Route::post('/admin/album/{id}/store', 'AlbumController@store_galeri');
	Route::get('/admin/album/{id}/galeri/{id_galeri}', 'AlbumController@edit_galeri');
	Route::patch('/admin/album/{id}/galeri/update', 'AlbumController@update_selected_galeri');
	Route::patch('/admin/album/{id}/galeri/{id_galeri}/update', 'AlbumController@update_galeri');
	Route::delete('/admin/album/{id}/galeri/{id_galeri}/delete', 'AlbumController@delete_galeri');

	// Berita
	Route::get('/admin/berita', 'BeritaController@index');
	Route::get('/admin/berita/create', 'BeritaController@create');
	Route::post('/admin/berita/store', 'BeritaController@store');
	Route::get('/admin/berita/{id}', 'BeritaController@edit');
	Route::patch('/admin/berita/{id}/update', 'BeritaController@update');
	Route::delete('/admin/berita/{id}/delete', 'BeritaController@delete');

	// Halaman
	Route::get('/admin/halaman', 'HalamanController@index');
	Route::get('/admin/halaman/create', 'HalamanController@create');
	Route::post('/admin/halaman/store', 'HalamanController@store');
	Route::get('/admin/halaman/{id}', 'HalamanController@edit');
	Route::patch('/admin/halaman/{id}/update', 'HalamanController@update');
	Route::delete('/admin/halaman/{id}/delete', 'HalamanController@delete');

	// Sponsor
	Route::get('/admin/sponsor', 'SponsorController@index');
	Route::get('/admin/sponsor/create', 'SponsorController@create');
	Route::post('/admin/sponsor/store', 'SponsorController@store');
	Route::get('/admin/sponsor/{id}', 'SponsorController@edit');
	Route::patch('/admin/sponsor/{id}/update', 'SponsorController@update');
	Route::delete('/admin/sponsor/{id}/delete', 'SponsorController@delete');

	// Kalender
	Route::get('/admin/kalender', 'KalenderController@index');
	Route::get('/admin/kalender/create', 'KalenderController@create');
	Route::post('/admin/kalender/store', 'KalenderController@store');

	// Elfinder
	Route::get('/elfinder/set_dir', function() {
		// \Config::set('elfinder.dir', 'a');
        \Session::forget('dir');
        \Session::put('dir', 'a');
		return \Config::get('elfinder.dir');
	});

	Route::get('/elfinder/template/{param?}', function($param) {
        // Session::forget('dir');
        Session::put('dir', ['uploads/aw']);
        // $t = new \Barryvdh\Elfinder\ElfinderController(App::getInstance());
        // return $t->showPopup($param);
    });
    
    Route::get('/elfinder/filemanager/{any?}', function($param) {
        Session::forget('dir');
        Session::put('dir', ['uploads/aw']);
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