<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Session;
use Config;

class AlbumController extends Controller
{
    public function index()
    {
		return view('admin.album.album');
    }

    public function show($slug='')
    {
        $album = \App\Album::where('slug', $slug)->first();
        $album->update([
            'hits' => $album->hits += 1
        ]);
        return view('album.index', [
            'album' => $album
        ]);
    }

    public function create()
    {
		return view('admin.album.album_form');
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

    	$slug = str_slug($input['judul'], '-');

        $album = \App\Album::where('slug', $slug)->get();
        if ($album->count()) {
            $slug .= '-';
            $slug .= $album->count() + 1;
        }

    	$data = [
    		'judul' => $input['judul'],
    		'deskripsi' => $input['deskripsi'],
    		'foto' => $foto,
    		'slug' => $slug,
    		'hits' => 0
    	];

        \Storage::makeDirectory($slug);

    	\App\Album::create($data);

    	return redirect('admin/album')->with('success', 'Berhasil Menambahkan Album');
    }

    public function edit($id='')
    {
    	return view('admin.album.album_form', [
    		'album' => \App\Album::find($id)
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

    	$album = \App\Album::find($id);
    	$album->update($data);
    	return redirect('admin/album')->with('success', 'Berhasil Mengubah Album');
    }

    public function delete($id='')
    {
        $album = \App\Album::find($id);
        \Storage::deleteDirectory($album->slug);
        $album->delete();
        \App\Galeri::where('id_album', $id)->delete();
        return response()->json($album);
    }

    public function galeri($id='')
    {
        Session::put('dir', ['uploads/aw']);
    	\Config::set('elfinder.dir', ['uploads/aw']);
    	return view('admin.album.galeri', [
    		'album' => \App\Album::find($id)
    	]);
    }

    public function store_galeri($id='', Request $request)
    {
        $input = $request->all();
        $url = \URL::asset('uploads');
        $foto = str_replace($url, '', $input['file']['url']); 
        if (!\App\Galeri::where('foto', $foto)->first()) {
            $data = [
                'id_album' => $id,
                'judul' => '',
                'deskripsi' => '',
                'foto' => $foto
            ];
            $galeri = \App\Galeri::create($data);
        }
        return response()->json(@$data ? $galeri : 0);
    }

    public function edit_galeri($id='', $id_galeri='')
    {
    	return view('admin.album.galeri_form', [
    		'album' => \App\Album::find($id),
    		'galeri' => \App\Galeri::find($id_galeri),
    	]);
    }

    public function update_selected_galeri($id='', Request $request)
    {
        $input = $request->all();
        $data_galeri = [];

        if (@$input['id_galeri']) {
            foreach ($input['id_galeri'] as $key => $value) {
                if ($input['opsi'] == 1) {
                    $judul = $input['judul'][$value];
                    $deskripsi = $input['deskripsi'][$value];
                    $data = [
                        'judul' => $judul ? $judul : '',
                        'deskripsi' => $deskripsi ? $deskripsi : '',
                    ];
                    $galeri = \App\Galeri::find($value);
                    $galeri->update($data);
                    $data_galeri[] = $galeri;
                } else {
                    $galeri = \App\Galeri::find($value);
                    $data_galeri[] = $galeri;
                    \Storage::delete($galeri->foto);
                    $galeri->delete();
                }
            }
        }

        return response()->json($data_galeri);
    }

    public function update_galeri($id='', $id_galeri='', Request $request)
    {
    	$input = $request->all();

        $judul = @$input['judul'] ? $input['judul'] : '';
        $deskripsi = @$input['deskripsi'] ? $input['deskripsi'] : '';

        $data = [
            'judul'     => $judul,
            'deskripsi' => $deskripsi
        ];

        $galeri = \App\Galeri::find($id_galeri);
        $galeri->update($data);

        return response()->json($input);
    }

    public function delete_galeri($id='', $id_galeri='')
    {
        $galeri = \App\Galeri::find($id_galeri);
        \Storage::delete($galeri->foto);
        $galeri->delete();

        return response()->json($galeri);
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
