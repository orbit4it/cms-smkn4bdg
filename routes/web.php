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

// Album
Route::get('/album/{id}', 'AlbumController@show');

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

	Route::prefix('admin')->group(function () {

		Route::get('/', 'AdminController@index');

		// Album & Galeri
		Route::get('/album', 'AlbumController@index');
		Route::get('/album/create', 'AlbumController@create');
		Route::post('/album/store', 'AlbumController@store');
		Route::get('/album/{id}', 'AlbumController@edit');
		Route::patch('/album/{id}/update', 'AlbumController@update');
		Route::delete('/album/{id}/delete', 'AlbumController@delete');
		Route::get('/album/{id}/galeri', 'AlbumController@galeri');
		Route::post('/album/{id}/store', 'AlbumController@store_galeri');
		Route::get('/album/{id}/galeri/{id_galeri}', 'AlbumController@edit_galeri');
		Route::patch('/album/{id}/galeri/update', 'AlbumController@update_selected_galeri');
		Route::patch('/album/{id}/galeri/{id_galeri}/update', 'AlbumController@update_galeri');
		Route::delete('/album/{id}/galeri/{id_galeri}/delete', 'AlbumController@delete_galeri');

		// Berita
		Route::get('/berita', 'BeritaController@index');
		Route::get('/berita/create', 'BeritaController@create');
		Route::post('/berita/store', 'BeritaController@store');
		Route::get('/berita/{id}', 'BeritaController@edit');
		Route::patch('/berita/{id}/update', 'BeritaController@update');
		Route::delete('/berita/{id}/delete', 'BeritaController@delete');

		// Halaman
		Route::get('/halaman', 'HalamanController@index');
		Route::get('/halaman/create', 'HalamanController@create');
		Route::post('/halaman/store', 'HalamanController@store');
		Route::get('/halaman/{id}', 'HalamanController@edit');
		Route::patch('/halaman/{id}/update', 'HalamanController@update');
		Route::delete('/halaman/{id}/delete', 'HalamanController@delete');

		// Sponsor
		Route::get('/sponsor', 'SponsorController@index');
		Route::get('/sponsor/create', 'SponsorController@create');
		Route::post('/sponsor/store', 'SponsorController@store');
		Route::get('/sponsor/{id}', 'SponsorController@edit');
		Route::patch('/sponsor/{id}/update', 'SponsorController@update');
		Route::delete('/sponsor/{id}/delete', 'SponsorController@delete');

		// Kalender
		Route::get('/kalender', 'KalenderController@index');
		Route::get('/kalender/create', 'KalenderController@create');
		Route::post('/kalender/store', 'KalenderController@store');
		Route::get('/kalender/{id}', 'KalenderController@edit');
		Route::patch('/kalender/{id}/update', 'KalenderController@update');
		Route::delete('/kalender/{id}/delete', 'KalenderController@delete');
	});

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