<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalenderController extends Controller
{
    public function index()
    {
    	return view('admin.kalender.kalender');
    }

    public function create()
    {
    	return view('admin.kalender.kalender_form');
    }

    public function store(Request $request)
    {
    	$this->validate($request, $this->rules());
    	$input = $request->all();
    	$data = [
    		'judul' => $input['judul'],
    		'start' => \Carbon\Carbon::parse($input['start']),
    		'end' => \Carbon\Carbon::parse($input['end']),
    	];
    	\App\Kalender::create($data);
    	return redirect('admin/kalender')->with('success', 'Berhasil Menambah Data');
    }

    public function edit($id)
    {
        return view('admin.kalender.kalender_form', [
            'kalender' => \App\Kalender::find($id)
        ]);
    }

    public function update($id='', Request $request)
    {
        $this->validate($request, $this->rules());
        $input = $request->all();
        $data = [
            'judul' => $input['judul'],
            'start' => \Carbon\Carbon::parse($input['start']),
            'end' => \Carbon\Carbon::parse($input['end']),
        ];
        $kalender = \App\Kalender::find($id);
        $kalender->update($data);
        return redirect('admin/kalender')->with('success', 'Berhasil Mengubah Data');
    }

    public function delete($id='')
    {
        $kalender = \App\Kalender::find($id);
        $kalender->delete();
        return response()->json($kalender);
    }

    public function rules()
    {
    	return [
    		'judul' => 'required|max:150',
    		'start' => 'date',
    		'end' => 'date|after:start'
    	];
    }

}
