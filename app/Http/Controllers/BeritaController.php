<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeritaController extends Controller
{
	public function index()
	{
		// dd('test');
		return view('admin.berita.berita');
	}

	public function show_all()
	{
		return view('berita.show_all', [
			'data' => \App\Berita::orderBy('created_at', 'DESC')->get()
		]);
	}

	public function show($slug = '')
	{
		$berita = \App\Berita::where('slug', $slug)->first();
		$berita->update([
			'hits' => $berita->hits += 1
		]);
		return view('berita.index', [
			'berita' => $berita
		]);
	}

	public function create()
	{
		return view('admin.berita.berita_form');
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

		$slug = str_slug($input['judul'], '-');

		$berita = \App\Berita::where('slug', $slug)->get();
		if ($berita->count()) {
			$slug .= '-';
			$slug .= $berita->count() + 1;
		}

		$data = [
			'judul' => $input['judul'],
			'deskripsi' => $input['deskripsi'],
			'foto' => $foto,
			'slug' => $slug,
			'id_kategori' => $input['id_kategori'],
			'hits' => 0,
		];

		if ($input['created_at']) {
			$data['created_at'] = $input['created_at'];
		}

		\App\Berita::create($data);

		return redirect('admin/berita')->with('success', 'Berhasil Menambahkan Berita');
	}

	public function edit($id = '')
	{
		return view('admin.berita.berita_form', [
			'berita' => \App\Berita::find($id)
		]);
	}

	public function update($id = '', Request $request)
	{
		$this->validate($request, $this->rules());

		$input = $request->all();

		$data = [
			'judul' => $input['judul'],
			'deskripsi' => $input['deskripsi'],
			'id_kategori' => $input['id_kategori'],
		];

		if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
			$foto = \Carbon\Carbon::now()->format('Y-m-d-H-i-s') . ' ' . $input['judul'];
			$foto = str_slug($foto, '-');
			$foto .= '.' . $request->file('foto')->getClientOriginalExtension();
			$request->file('foto')->storeAs('', $foto);
			$data['foto'] = $foto;
		}

		if ($input['created_at']) {
			$data['created_at'] = $input['created_at'];
		}

		$berita = \App\Berita::find($id);
		$berita->update($data);
		return redirect('admin/berita')->with('success', 'Berhasil Mengubah Berita');
	}

	public function destroy($id)
	{
		$berita = \App\Berita::find($id);
		\Storage::delete($berita->foto);
		$berita->delete();
		return response()->json($berita);
	}

	public function rules()
	{
		return [
			'judul' => 'required|max:150',
			'deskripsi' => 'required',
			'foto' => 'mimes:jpeg,png|max:100000',
			'id_kategori' => 'required|exists:kategori',
			'created_at' => 'nullable|date'
		];
	}
}