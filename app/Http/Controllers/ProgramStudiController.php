<?php

namespace App\Http\Controllers;

use App\Studi;

class ProgramStudiController extends Controller
{
    public function show($slug)
    {
        $studi = Studi::where('slug', $slug)->with(['mataPelajaran', 'pembelajaran'])->first();
        if (!$studi) {
            return view('home.404');
        }
        $punyaBerapaSemester = $studi->pembelajaran->groupBy('semester')->count();
        return view('studi.index', [
            'studi' => $studi,
            'punyaBerapaSemester' => $punyaBerapaSemester
        ]);
    }
}