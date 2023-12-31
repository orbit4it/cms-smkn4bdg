<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index', [
            'data' => \App\Berita::orderBy('created_at', 'DESC')->get()->take(6),
            'sponsors' => \App\Sponsor::all(),
            'kepalaSekolah' => \App\KepalaSekolah::where('status', 1)->first(),
            'albums' => \App\Album::all()
        ]);
    }
}
