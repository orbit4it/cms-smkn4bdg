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

    public function rules()
    {
    	return [
    		'judul' => 'required|max:150',
    		'start' => 'date',
    		'end' => 'date|after:start'
    	];
    }

}
