<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
    	return view('admin.berita.berita');
    }

    public function show_all()
    {
    	return view('berita.show_all');
    }

    public function show($slug='')
    {
    	return view('berita.index', [
    		'berita' => \App\Berita::where('slug', $slug)->first()
    	]);
    }

    public function create()
    {
    	return view('admin.berita.berita_form');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'judul' => 'required|max:255',
    		'deskripsi' => 'required',
    		'foto' => 'required|max:10000'
    	]);

    	$input = $request->all();

    	$foto = '';

    	if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
    		$foto = \Carbon\Carbon::now()->format('Y-m-d-H-i-s') . ' ' . $input['judul'] . '.' . $request->file('foto')->getClientOriginalExtension();
    		$foto = str_replace(' ', '-', $foto);
    		$request->file('foto')->storeAs('', $foto);
    	}

    	$data = [
    		'judul' => $input['judul'],
    		'deskripsi' => $input['deskripsi'],
    		'foto' => $foto,
    		'slug' => str_slug($input['judul'], '-'),
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
    		'judul' => 'required|max:255',
    		'deskripsi' => 'required',
    		'foto' => 'max:10000'
    	]);

    	$input = $request->all();

    	$data = [
    		'judul' => $input['judul'],
    		'deskripsi' => $input['deskripsi'],
    	];

    	if (@$input['foto']) {
    		if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
	    		$foto = \Carbon\Carbon::now()->format('Y-m-d-H-i-s') . ' ' . $input['judul'] . '.' . $request->file('foto')->getClientOriginalExtension();
	    		$foto = str_replace(' ', '-', $foto);
	    		$request->file('foto')->storeAs('', $foto);
	    		$data['foto'] = $foto;
	    	}
    	}

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
