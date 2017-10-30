<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
    	return view('admin.halaman.halaman');
    }

    public function show($id='')
    {
        return view('halaman.index', [
            'halaman' => \App\Halaman::where('slug', $id)->first()
        ]);
    }

    public function create()
    {
    	return view('admin.halaman.halaman_form');
    }

    public function store(Request $request)
    {
    	$this->validate($request, $this->rules());
    	$input = $request->all();
    	$foto = '';

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = \Carbon\Carbon::now()->format('Y-m-d-H-i-s') . ' ' . $input['judul'];
            $foto = str_slug($foto, '-');
            $foto .=  '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $foto);
            $data['foto'] = $foto;
        }

    	$data = [
    		'judul' => $input['judul'],
    		'deskripsi' => $input['deskripsi'],
    		'foto' => $foto,
    		'slug' => str_slug($input['judul'], '-'),
    		'hits' => 0
    	];

    	\App\Halaman::create($data);

    	return redirect('admin/halaman')->with('success', 'Berhasil Menambahkan Halaman');
    }

    public function edit($id='')
    {
    	return view('admin.halaman.halaman_form', [
    		'halaman' => \App\Halaman::find($id)
    	]);
    }

    public function update($id='', Request $request)
    {
    	$this->validate($request, $this->rules());

    	$input = $request->all();

    	$data = [
    		'judul' => $input['judul'],
    		'deskripsi' => $input['deskripsi'],
    	];

		if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = \Carbon\Carbon::now()->format('Y-m-d-H-i-s') . ' ' . $input['judul'];
            $foto = str_slug($foto, '-');
            $foto .=  '.' . $request->file('foto')->getClientOriginalExtension();
    		$request->file('foto')->storeAs('', $foto);
    		$data['foto'] = $foto;
    	}

    	$halaman = \App\Halaman::find($id);
    	$halaman->update($data);
    	return redirect('admin/halaman')->with('success', 'Berhasil Mengubah Halaman');
    }

    public function rules()
    {
    	return [
    		'judul' => 'required|max:150',
    		'deskripsi' => 'required',
    		'foto' => 'mimes:jpeg,png|max:10000',
    	];
    }
}
