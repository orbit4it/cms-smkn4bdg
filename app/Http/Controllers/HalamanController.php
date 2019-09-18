<?php

namespace App\Http\Controllers;

use App\Halaman;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    public function index()
    {
        return view('admin.halaman.halaman');
    }

    public function show($slug = '')
    {
        $halaman = \App\Halaman::where('slug', $slug)->first();
        $halaman->update([
            'hits' => $halaman->hits += 1
        ]);
        return view('halaman.index', [
            'halaman' => $halaman
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
            $foto .= '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $foto);
            $data['foto'] = $foto;
        }
        $slug = str_replace('SMK Negeri 4 Bandung', '', $input['judul']);
        $slug = str_slug($slug, '-');

        $halaman = \App\Halaman::where('slug', $slug)->get();
        if ($halaman->count()) {
            $slug .= '-';
            $slug .= $halaman->count() + 1;
        }

        $data = [
            'judul' => $input['judul'],
            'deskripsi' => $input['deskripsi'],
            'foto' => $foto,
            'slug' => $slug,
            'hits' => 0
        ];

        \App\Halaman::create($data);

        return redirect('admin/halaman')->with('success', 'Berhasil Menambahkan Halaman');
    }

    public function edit($id = '')
    {
        return view('admin.halaman.halaman_form', [
            'halaman' => \App\Halaman::find($id)
        ]);
    }

    public function update($id = '', Request $request)
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
            $foto .= '.' . $request->file('foto')->getClientOriginalExtension();
            $request->file('foto')->storeAs('', $foto);
            $data['foto'] = $foto;
        }

        $halaman = \App\Halaman::find($id);
        $halaman->update($data);
        return redirect('admin/halaman')->with('success', 'Berhasil Mengubah Halaman');
    }

    public function destroy($id = '')
    {
        $halaman = \App\Halaman::find($id);
        \Storage::delete($halaman->foto);
        $halaman->delete();
        return response()->json($halaman);
    }

    public function rules()
    {
        return [
            'judul' => 'required|max:150',
            'deskripsi' => 'required',
            'foto' => 'mimes:jpeg,png|max:10000',
        ];
    }

    public function shortUrl(Halaman $page)
    {
        return redirect('info/' . $page->slug);
    }
}
