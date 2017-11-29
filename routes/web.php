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

Route::get('/calendar', function () {
	return view('home.kalender');
});

// Auth
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

// Admin
Route::middleware(['auth'])->group(function () {

	Route::prefix('admin')->group(function () {

		Route::get('/', 'AdminController@index');

		// Album & Galeri
		Route::prefix('album')->group(function () {
			Route::get('/', 'AlbumController@index');
			Route::get('/create', 'AlbumController@create');
			Route::post('/store', 'AlbumController@store');
			Route::get('/{id}', 'AlbumController@edit');
			Route::patch('/{id}/update', 'AlbumController@update');
			Route::delete('/{id}/delete', 'AlbumController@delete');
			Route::get('/{id}/galeri', 'AlbumController@galeri');
			Route::post('/{id}/store', 'AlbumController@store_galeri');
			Route::get('/{id}/galeri/{id_galeri}', 'AlbumController@edit_galeri');
			Route::patch('/{id}/galeri/update', 'AlbumController@update_selected_galeri');
			Route::patch('/{id}/galeri/{id_galeri}/update', 'AlbumController@update_galeri');
			Route::delete('/{id}/galeri/{id_galeri}/delete', 'AlbumController@delete_galeri');
		});

		// Berita
		Route::resource('berita', 'BeritaController');

		// Halaman
		Route::resource('halaman', 'HalamanController');

		// Sponsor
		Route::resource('sponsor', 'SponsorController');

		// Kalender
		Route::resource('kalender', 'KalenderController');

		// Kepala Sekolah
		Route::resource('kepala-sekolah', 'KepalaSekolahController');
	});

	// Elfinder
	Route::get('/elfinder/set_dir', function() {
		// \Config::set('elfinder.dir', 'a');
  //       \Session::forget('dir');
  //       \Session::put('dir', 'a');
		// return \Config::get('elfinder.dir');
	});

	Route::get('/elfinder/template/{param?}', function($param) {
        // Session::forget('dir');
        // Session::put('dir', ['uploads/aw']);
        // $t = new \Barryvdh\Elfinder\ElfinderController(App::getInstance());
        // return $t->showPopup($param);
    });
    
    Route::get('/elfinder/filemanager/{any?}', function($param) {
        // Session::forget('dir');
        // Session::put('dir', ['uploads/aw']);
        $t = new \Barryvdh\Elfinder\ElfinderController(App::getInstance());
        return $t->showPopup($param);
    });
    
    // Route::get('/fix', function() {
    //     $pendaftar = \App\PesertaSkripsi::all();
    //     foreach($pendaftar as $row) {
    //         $row->nama_lengkap = strtoupper($row->nama_lengkap);
    //         $row->save();
    //     }
    // });
});