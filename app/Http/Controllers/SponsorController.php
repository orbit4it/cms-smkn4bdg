<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
    	return view('admin.sponsor.sponsor');
    }

    public function create()
    {
    	return view('admin.sponsor.sponsor_form');
    }

    public function store(Request $request)
    {
    	$this->validate($request, $this->rules());
    	$input = $request->all();

    	$foto = '';
    	if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
    		$foto = 'sponsor ' . $input['nama'];
    		$foto = str_slug($foto, '-');
    		$foto .=  '.' . $request->file('foto')->getClientOriginalExtension();
    		$request->file('foto')->storeAs('', $foto);
    	}

    	$data = [
    		'nama' => $input['nama'],
    		'foto' => $foto
    	];

    	\App\Sponsor::create($data);
    	return redirect('admin/sponsor')->with('success', 'Berhasil Menambah Sponsor');
    }

    public function edit($id='')
    {
    	return view('admin.sponsor.sponsor_form', [
    		'sponsor' => \App\Sponsor::find($id)
    	]);
    }

    public function update($id='', Request $request)
    {
    	$this->validate($request, $this->rules());
    	$input = $request->all();
    	$sponsor = \App\Sponsor::find($id);
    	$data = [
    		'nama' => $input['nama'],
    	];

    	if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
    		$foto = 'sponsor ' . $input['nama'];
    		$foto = str_slug($foto, '-');
    		$foto .=  '.' . $request->file('foto')->getClientOriginalExtension();
    		$request->file('foto')->storeAs('', $foto);
    		$data['foto'] = $foto;
    	}

    	$sponsor->update($input);
    	return redirect('admin/sponsor')->with('success', 'Berhasil Mengubah Sponsor');
    }

    public function delete($id='')
    {
    	$sponsor = \App\Sponsor::find($id);
        \Storage::delete($sponsor->foto);
        $sponsor->delete();
    	return response()->json($sponsor);
    }

    public function rules()
    {
    	return [
    		'nama' => 'required|max:150',
    		'foto' => 'mimes:jpeg,png|max:10000',
    	];
    }
}
