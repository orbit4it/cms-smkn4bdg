<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
    	return view('admin.berita.index');
    }

    public function show_all()
    {
    	return view('berita.show_all');
    }

    public function show($id='')
    {
    	return view('berita.index', [
    		'berita' => \App\Berita::find($id)
    	]);
    }

    public function create()
    {
    	return view('admin.berita.berita_form');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'judul_berita' => 'required|max:255',
    		'isi_berita' => 'required',
    		'foto' => 'required|max:10000'
    	]);

    	$input = $request->all();

    	$foto = '';

    	if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
    		$foto = \Carbon\Carbon::now()->format('Y-m-d-H-i-s') . ' ' . $input['judul_berita'] . '.' . $request->file('foto')->getClientOriginalExtension();
    		$foto = str_replace(' ', '-', $foto);
    		$request->file('foto')->storeAs('', $foto);
    	}

    	$data = [
    		'judul_berita' => $input['judul_berita'],
    		'isi_berita' => $input['isi_berita'],
    		'foto' => $foto,
    	];

    	\App\Berita::create($data);

    	return redirect('admin/berita')->with('success', 'Berhasil Menambahkan Berita');
    }

    public function edit($id='')
    {
    	return view('admin.berita.berita_form', [
    		'berita' => \App\Berita::find($id)
    	]);
    }

    public function update($id='', Request $request)
    {
    	$this->validate($request, [
    		'judul_berita' => 'required|max:255',
    		'isi_berita' => 'required',
    		'foto' => 'mimes:png,jpg|max:10'
    	]);

    	$input = $request->all();

    	if (@$input['foto']) {
    		if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
	    		$foto = \Carbon\Carbon::now()->format('Y-m-d-H-i-s') . ' ' . $input['judul_berita'] . '.' . $request->file('foto')->getClientOriginalExtension();
	    		$foto = str_replace(' ', '-', $foto);
	    		$request->file('foto')->storeAs('', $foto);
	    	}
    	}

    	$data = [
    		'judul_berita' => $input['judul_berita'],
    		'isi_berita' => $input['isi_berita']
    	];

    	$berita = \App\Berita::find($id);
    	$berita->update($data);
    	return redirect('admin/berita')->with('success', 'Berhasil Mengubah Berita');
    }

    public function delete($id)
    {
    	\App\Berita::find($id)->delete();
    	return redirect('admin/berita')->with('success', 'Berhasil Menghapus Berita');
    }
}
