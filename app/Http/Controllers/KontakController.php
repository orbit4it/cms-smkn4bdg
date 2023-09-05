<?php

namespace App\Http\Controllers;



class KontakController extends Controller
{
    public function index()
    {
        // $kontak = \App\Kontak::first();

        // return view('kontak.index', [
        //     'kontak' => $kontak
        // ]);

        return view('kontak.index');
    }
}