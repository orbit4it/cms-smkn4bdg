<?php

namespace App\Http\Controllers;

use App\Kontak;
use illuminate\Http\Request;


class KontakController extends Controller
{
    public function show()
    {
        return view('kontak.index', [
            'kontak' => Kontak::first()
        ]);

    }

    public function index()
    {
        return view('admin.kontak.kontak', [
            'kontak' => Kontak::first()
        ]);
    }


    public function update(Request $request)
    {

        // Validate all request
        $this->validate($request, $this->rules());

        // Collect all data from request
        $data = $request->all();

        // Find first data from Kontak model
        $kontak = Kontak::find(1); // Kontak table just has one row
        $kontak->update($data); // Update all data from request

        // Redirect to route admin/kontak with success message
        return redirect('admin/kontak')->with('success', 'Data berhasil diupdate');
    }


    public function rules()
    {
        return [
            'email' => 'required|email',
            'telepon' => 'required',
            'alamat' => 'required',
            'facebook_link' => 'required',
            'twitter_link' => 'required',
            'instagram_link' => 'required',
            'youtube_link' => 'required',
            'tiktok_link' => 'required'
        ];
    }
}