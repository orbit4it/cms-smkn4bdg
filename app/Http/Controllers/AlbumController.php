<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
		return view('admin.album.album');
    }

    public function create()
    {
		return view('admin.album.album_form');
    }
}
