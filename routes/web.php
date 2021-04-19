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
Route::get('page-id/{page}', 'HalamanController@shortUrl');
Route::get('lkss2019', function() {
    return redirect('page-id/6');
});

Route::get('lkss2021', function() {
    return redirect('page-id/8');
});

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
Route::middleware(['web', 'auth'])->group(function () {

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

        Route::get('setting', 'SettingController@index')->name('setting.index');
        Route::patch('setting', 'SettingController@update')->name('setting.update');
	});

	// Elfinder
	Route::get('/elfinder/set_dir', function() {
	});

	Route::get('/elfinder/template/{param?}', function($param) {
    });
    
    Route::get('/elfinder/filemanager/{any?}', function($param) {
        $t = new \Barryvdh\Elfinder\ElfinderController(App::getInstance());
        return $t->showPopup($param);
    });

});