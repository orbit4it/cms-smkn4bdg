<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class KepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.kepala_sekolah.kepala_sekolah');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kepala_sekolah.kepala_sekolah_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $input = $request->all();

        $foto = '';

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = str_slug($input['nama'], '-');
            $foto .=  '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $foto);
        }

        if ($input['status'] == 1) {
            DB::table('kepala_sekolah')->update([
                'status' => 2
            ]);
        }

        \App\KepalaSekolah::create([
            'nama' => $input['nama'],
            'sambutan' => $input['sambutan'],
            'status' => $input['status'],
            'foto' => $foto,
        ]);

        return redirect(url('admin/kepala-sekolah'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KepalaSekolah  $kepalaSekolah
     * @return \Illuminate\Http\Response
     */
    public function show(KepalaSekolah $kepalaSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KepalaSekolah  $kepalaSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.kepala_sekolah.kepala_sekolah_form', [
            'kepalaSekolah' => \App\KepalaSekolah::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KepalaSekolah  $kepalaSekolah
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $this->validate($request, $this->rules());

        $input = $request->all();

        $foto = '';

        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = str_slug($input['nama'], '-');
            $foto .=  '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $foto);
        }

        if ($input['status'] == 1) {
            DB::table('kepala_sekolah')->update([
                'status' => 2
            ]);
        }

        $kepalaSekolah = \App\KepalaSekolah::find($id);

        $kepalaSekolah->update([
            'nama' => $input['nama'],
            'sambutan' => $input['sambutan'],
            'status' => $input['status'],
            'foto' => $foto ? $foto : $kepalaSekolah->foto,
        ]);

        return redirect(url('admin/kepala-sekolah'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KepalaSekolah  $kepalaSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kepalaSekolah = \App\KepalaSekolah::find($id);
        \Storage::delete($kepalaSekolah->foto);
        $kepalaSekolah->delete();
        return response()->json($kepalaSekolah);        
    }

    public function rules()
    {
        return [
            'nama' => 'required|max:150',
            'sambutan' => 'required',
            'foto' => 'mimes:jpeg,png|max:100000',
            'status' => 'required'
        ];
    }
}
